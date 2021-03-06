<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class AdminMiddleware
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
        if (!Auth::check()){
            return  "please Login First";
//            return redirect('admin/login');
        }



        $user = Auth::user();
        if(Auth::user()->role->slug == 'admin'){
            return $next($request);
        }else{
//            abort(404);
            return redirect()->route('front.index');
        }



    }
}
