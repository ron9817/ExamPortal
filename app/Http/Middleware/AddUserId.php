<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class AddUserId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( Auth::check() ){
            $request->request->add(['user_id'=>Auth::user()->ID]);
            $request->request->add(['user_name'=>Auth::user()->NAME]);
        }
        return $next($request);
    }
}
