<?php

namespace App\Http\Controllers\Dashboard\Api\Works;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user() && Auth::user()->role_id == 1){
            $works = Work::with('user')->paginate(5);

            return response()->json($works,200);
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
        if(Auth::user() && Auth::user()->role_id == 1){
            $work =Work::findOrfail($id);
            $work->delete();
            $works = Work::with('user')->paginate(5);

            return response()->json($works,200);
        }

        return response()->json("error",401);
    }
}
