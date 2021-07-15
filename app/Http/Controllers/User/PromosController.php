<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PromosController extends Controller
{
    public function promosIndex(){
        return view('user.pormos.index');
    }
}
