<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class TestController extends Controller
{
    // public function __construct(){
    //     $this->middleware('dateMiddleware');
    // }

    public function test(){
        return 'berhasil masuk';
    }

    public function test1(){
        return 'berhasil';
    }

    public function admin(){
        dd(Auth::user());
        return 'admin berhasil masuk';
    }
}
