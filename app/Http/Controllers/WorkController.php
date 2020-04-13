<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Image;
use App\Models\View;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Work::paginate(9);
        return view('home.work', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('userprofile.works.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('images'))
        {
            $work = Work::create([
                'name' => $request['name'],
                'description' => $request['description'],
                'user_id' => Auth::id(),
                'status_id' => 1
            ]);
            $files = $request->file('images');
            foreach ($files as $file){
                $data = [];
                $data['name'] = $file->getClientOriginalName();
                $data['size'] = $file->getSize();
                $data['extension'] = $file->extension();
                $data['patch'] = $file->store('/images', 'public');
                $data['patch_cover'] = $file->store('/covers', 'public');
                $data['work_id'] = $work->id;
                $this->resizeImage($data['patch_cover']);
                Image::add($data);
            }
            return redirect()->route('userprofile');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $work = Work::where("id", $id)->first();
        return view('userprofile.works.show', compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $work = Work::where("id", $id)->first();
        return view('userprofile.works.edit', compact('work'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $work = Work::where("id", $id)->first();
        if($work->user_id == Auth::id()){
            $work->update([
                'name' => $request['name'],
                'description' => $request['description'],
                'user_id' => Auth::id(),
                'status_id' => 1
            ]);
            if ($request->hasFile('images'))
            {
                $files = $request->file('images');
                foreach ($files as $file){
                    $data = [];
                    $data['name'] = $file->getClientOriginalName();
                    $data['size'] = $file->getSize();
                    $data['extension'] = $file->extension();
                    $data['patch'] = $file->store('/images', 'public');
                    $data['patch_cover'] = $file->store('/covers', 'public');
                    $data['work_id'] = $work->id;
                    $this->resizeImage($data['patch_cover']);

                    Image::add($data);
                }
            }
            return redirect()->route('userprofile');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $work = Work::where("id", $id)->first();
        if($work->user_id == Auth::id()) {
            $images = $work->images;
            foreach ($images as $image) {
                Storage::disk('public')->delete($image->patch);
                Storage::disk('public')->delete($image->patch_cover);
            }
            $work->delete();
        }
        return redirect()->route('userprofile');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function assessment(Request $request)
    {
        $work_id = $request['work_id'];
        $assessmentRequest = $request['assessment'];
        $user = Auth::user();
        $work = Work::find($work_id);
        $assessment = $user->assessments->where('work_id', $work_id)->first();
        if($work) {
            if($assessment)
            {
                if($assessment->assessment != $assessmentRequest){
                    $assessment->update([
                        'assessment' => $assessmentRequest,
                        'work_id' => $work_id,
                        'user_id' => $user->id
                    ]);
                    return $this->countAssessment($work);
                }
                else
                {
                    $assessment->delete();
                    return $this->countAssessment($work);
                }
            }
            else
            {
                $data = [];
                $data['assessment'] = $assessmentRequest;
                $data['work_id'] = $work_id;
                $data['user_id'] = $user->id;
                Assessment::add($data);

                return $this->countAssessment($work);
            }
        }

        return $request;
    }

    public function countAssessment($work)
    {
        $countLike = $work->assessments->where("assessment","=","1")->count('id');
        $countDisLike = $work->assessments->where("assessment","=","0")->count('id');

        return [
            "countLike" => $countLike,
            "countDisLike" => $countDisLike
        ];
    }

    public function resizeImage($patch)
    {
        $img = \Intervention\Image\Facades\Image::make("storage/".$patch);
        $img->resize(640,480)->save();
    }

}
