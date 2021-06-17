<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class VendorMiddleware
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
            return redirect('login');
        }
        


        $user = Auth::user();
        if(Auth::user()->role->slug == 'vendor'){
            return $next($request);
        }else{
            abort(404);
        }
        
       
        
    }
}
