<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function edit()
    {
        $user = Auth::user();
        return view('userprofile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:100'],
            'sex' => ['required']
        ]);
        $user = User::where("id", Auth::id())->first();
            $user->update([
                'name' => $request['name'],
                'email' => $user->email,
                'city' => $request['city'],
                'sex' => $request['sex'],
                'role_id' => 3,
                'password' => $user->password
            ]);

        return redirect()->route('userprofile');
    }
}
