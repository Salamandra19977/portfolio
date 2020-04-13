<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [];
        $data["new_woks"] = Work::orderBy('created_at','desc')->limit(3)->get();
        $data["comented_works"] = Work::withCount('comments')->orderBy('comments_count','desc')->limit(3)->get();
        $data["views_works"] = Work::withCount('views')->orderBy('views_count','desc')->limit(3)->get();

        return view('home.index', compact('data'));
    }
}
