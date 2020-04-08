<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\File\UploadRequest;
use Illuminate\Support\Facades\Auth;
use Storage;

class UserProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::where('id','=',Auth::id())->get()->first();
        return view('userprofile.index', compact('user'));
    }

    public function upload(Request $request)
    {
        dd($request->all());
    }
}
