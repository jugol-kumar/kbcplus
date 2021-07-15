<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VerifyController extends Controller
{

    public function getVerify(){
        return view('user.verificatoin.verify');
    }

    public function postVerify(Request $request){
        if($user = User::where('code', $request->code)->first()){
            $user->active = 1;
            $user->code = null;
            $user->save();
            return redirect()->route('user.dashboard')->withMessage('Registration Successfully Done..');
        }else{
            return  redirect()->route('front.index')->withMessage('Verification Code Is Invalid.. Please Try Again.');
        }
    }



}
