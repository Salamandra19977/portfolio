<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Role;

class CheckRole
{

    /**
     * Проверка входящего запроса на роль.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if(Auth::user() && $user->role_id == 1){
            return $next($request);
        }else{
            return redirect()->route('login');
        }

    }

}