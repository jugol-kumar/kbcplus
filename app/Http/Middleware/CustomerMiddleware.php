<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()){
            return redirect()->route('front.index');
        }

        if(Auth::user()->role->slug == 'user'){
            return $next($request);
        }else{
//            abort(404);
            return redirect()->route('front.index');
        }


    }
}
