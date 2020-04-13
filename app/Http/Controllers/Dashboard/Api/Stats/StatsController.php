<?php

namespace App\Http\Controllers\Dashboard\Api\Stats;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Work;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StatsController extends Controller
{
    public function index()
    {
        $data['auth_user'] = Auth::user();
        $data['count_users'] = User::get()->count('id');
        $data['count_works'] = Work::get()->count('id');
        $data['count_comments'] = Comment::get()->count('id');
        $data['count_images'] = Image::get()->count('id');
        $data["new_woks"] = Work::orderBy('created_at','desc')->limit(3)->get();
        return response()->json($data,200);

    }
}
