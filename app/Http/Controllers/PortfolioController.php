<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class PortfolioController extends Controller
{
    public function index()
    {
        $user = User::get()->first();
        dd($user->works);
    }
}
