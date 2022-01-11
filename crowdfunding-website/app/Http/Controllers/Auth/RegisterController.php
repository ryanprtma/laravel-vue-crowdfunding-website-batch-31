<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\Auth\RegisterRequest;
use App\Events\UserRegisteredEvent;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegisterRequest $request)
    {
        $data=[];
        // $data_request = $request ->all();
        // $user = User::create($data_request);

        $user = User::create([
            'email' => request('email'),
            'no_hp' => request('no_hp'),
            'username' => request('username'),
            'name' => request('name'),
            'password' => bcrypt(request('password')),
        ]);


        $data['user'] = $user;

        event(new UserRegisteredEvent($user));


        return response()->json([
            'response_code' => '00',
            'response_message' => 'berhasil mendaftar',
            'data' => $data
        ]);
    }
}
