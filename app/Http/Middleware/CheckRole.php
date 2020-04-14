<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

class CheckRole
{

    /**
     * Проверка входящего запроса на роль.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        $user = Auth::user();
        $rolesArray = explode(';', $roles);
        if(in_array($user->role->name, $rolesArray)){
            return $next($request);
        }else{
            return redirect()->route('login');
        }

    }

}