<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function GetUsers(){
        //$users = DB::table('users')->get();
        $users = DB::table('users')
            ->where('role_id','=','1')
            ->get();
        dd($users);
    }

}
