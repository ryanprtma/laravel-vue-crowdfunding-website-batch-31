<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(){
        $data['user']= auth()->user();

        return response()->json([
            'response_code' => '00',
            'response_message' => 'profile berhaasil ditampilkan',
            'data' =>$data 
        ]);
    }
}
