<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'text'=>'required',
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Comment::create($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::where("id", $id)->first();
        if($comment->user_id == Auth::id()) {
            $comment->delete();
        }

        return back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'text'=>'required',
        ]);
        $comment = Comment::where("id", $id)->first();
        if($comment->user_id == Auth::id()){
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $comment->update($data);
        }

        return back();

    }
}
