<?php

namespace App\Http\Middleware;
use Auth;

use Closure;

class Authormiddleware
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
        //return $next($request);
		if (Auth::check() && Auth::user()->role->id == 2)
      
          {
     
            return $next($request);
        
          }
     else {
            
            return redirect()->back();
          }
    }
}
