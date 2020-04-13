<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\File\UploadRequest;
use Illuminate\Support\Facades\Auth;
use Storage;

class UserProfileController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $works = Work::where('user_id','=',Auth::id())->orderBy('created_at','desc')->paginate(9);
        return view('userprofile.index', compact('works'));
    }

    public function show($id)
    {
        $works = Work::where('user_id','=', $id)->orderBy('created_at','desc')->paginate(9);
        return view('userprofile.index', compact('works'));
    }

    public function upload(Request $request)
    {
        dd($request->all());
    }
}
