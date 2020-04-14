<?php

namespace App\Http\Controllers\Dashboard\Api\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if(Auth::user()->role_id == 1) {
            $users = User::with('role')->get();

            return response()->json($users, 200);
        }

        return response()->json("error",401);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(Auth::user()->role_id == 1){
            $user = User::where("id", $request['id'])->first();
            $password = $request['password'];
            if($password == null) {
                $password = $user->password;
            }
            else {
                $password = bcrypt($password);
            }
            $user->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'city' => $request['city'],
                'sex' => $request['sex'],
                'role_id' => $request['role_id'],
                'password' => $password
            ]);

            $users = User::with('role')->get();

            return response()->json($users,200);
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
        //
    }
}
