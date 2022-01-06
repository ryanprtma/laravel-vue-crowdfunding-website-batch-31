<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class TestController extends Controller
{
    public function __construct(){
        $this->middleware('dateMiddleware');
    }

    public function test(){
            return 'berhasil masuk';
        }
}
