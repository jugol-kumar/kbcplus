<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserauthController extends Controller
{
    public function userRegistration(){
        return view('frontend.auth.auth');
    }



}
