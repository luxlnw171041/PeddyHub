<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $allowed_list = array_slice(func_get_args(), 2);  
        if (Auth::check()) {
            $status = Auth::user()->profile->role;
            //IF $status OF USER IS IN ALLOWED LIST
            if (in_array($status, $allowed_list,True)){
                return  $next($request);
            }
        } 
        return redirect('/home');

    }
}
