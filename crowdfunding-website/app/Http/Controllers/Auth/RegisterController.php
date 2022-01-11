<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users,email|email',
            'username' => 'required|unique:users,username|alpha_num|min:3|max:25',
            'name' => 'required',
            'password' => 'required|confirmed|min:6'
        ]);

        // $data_request = $request ->all();
        // $user = User::create($data_request);

        $user = User::create([
            'email' => request('email'),
            'username' => request('username'),
            'name' => request('name'),
            'password' => bcrypt(request('password')),
        ]);


        $data['user'] = $user;

        return response()->json([
            'response_code' => '00',
            'response_message' => 'berhasil mendaftar',
            'data' => $data
        ]);
    }
}
