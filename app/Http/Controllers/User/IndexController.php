<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return  view('user.index');
    }

        public function userLogout(Request $request){
            Auth::logout();
//        $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('front.index')->with('msg', 'Logout Successfully Done...');
        }

}
