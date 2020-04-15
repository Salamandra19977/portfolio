<?php

namespace App\Http\Controllers\Dashboard\Api\Comments;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        if( Auth::user() && Auth::user()->role_id == 1) {
            $comments = Comment::with('user')->paginate(8);
            return response()->json($comments, 200);
        }
        return response()->json("error",401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( Auth::user() && Auth::user()->role_id == 1){
            $comment =Comment::findOrfail($id);
            $comment->delete();
            $comments = Comment::with('user')->paginate(8);

            return response()->json($comments,200);
        }

        return response()->json("error",401);
    }
}
