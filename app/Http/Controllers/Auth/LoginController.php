<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/app/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->role->slug == 'admin') {
                return redirect()->route('app.home');
            }elseif(auth()->user()->role->slug == 'vendor'){
                return redirect()->route('vendor.dashboard');
            }elseif(auth()->user()->role->slug == 'user'){
                return redirect()->route('user.dashboard')->with('msg', auth()->user()->name.' Login Successfully Done');
            }
        }else{
            return redirect()->route('front.index')
                ->with('error','Email-Address And Password Not Matched With Our Record...');
        }

    }


    protected function loggedOut(Request $request) {
        return redirect('/admin/login');
    }
}
