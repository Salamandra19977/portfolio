<?php

namespace App\Http\Controllers\Dashboard\Api\Images;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if(Auth::user()->role_id == 1) {
            $images = Image::all();

            return response()->json($images, 200);
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
        if(Auth::user()->role_id == 1){
            $image = Image::findOrfail($id);
            $image->delete();
            $images = Image::all();
            return response()->json($images,200);
        }

        return response()->json("error",401);
    }
}
