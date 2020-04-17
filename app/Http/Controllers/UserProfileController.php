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

    public function index()
    {
        $works = Work::where('user_id','=',Auth::id())->orderBy('created_at','desc')->paginate(9);

        return view('userprofile.index', compact('works'));
    }

    public function show($id)
    {

        $works = Work::where('user_id','=', $id)->orderBy('created_at','desc')->with('user')->paginate(9);

        if(count($works) == 0){
            abort('404');
        }

        return view('userprofile.index', compact('works'));
    }
}
