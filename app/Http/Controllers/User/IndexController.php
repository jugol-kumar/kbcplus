<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nexmo\Laravel\Facade\Nexmo;

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
//        try {
//
//            $basic  = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
//            $client = new \Nexmo\Client($basic);
//
//            $code = rand(1111,9999);
//            $receiverNumber = "+8801723717933";
//            $message = "Welcome to our project. your code is --". $code;
//
//
//            $message = $client->message()->send([
//                'to' => $receiverNumber,
//                'from' => '+8801927295989',
//                'text' => $message
//            ]);
//
//            dd('SMS Sent Successfully.');
//
//        } catch (Exception $e) {
//            dd("Error: ". $e->getMessage());
//        }
        return  view('user.index');
    }


        public function userLogout(Request $request){
            Auth::logout();
//        $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('front.index')->with('msg', 'Logout Successfully Done...');
        }

}
