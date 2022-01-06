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
        return 'berhasil masuk sebagai quest';
    }

    public function test1(){
        return 'berhasil';
    }

    public function admin(){
        return 'anda berhasil masuk sebagai admin';
    }
}
