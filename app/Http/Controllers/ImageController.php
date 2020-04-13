<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function destroy($id)
    {
        $image = Image::where("id", $id)->first();
        if($image->work->user->id == Auth::id()) {
            Storage::disk('public')->delete($image->patch);
            Storage::disk('public')->delete($image->patch_cover);
            $image->delete();
        }
        return redirect()->back();
    }
}
