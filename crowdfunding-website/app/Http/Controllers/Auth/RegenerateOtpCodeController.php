<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Mail;
use App\mail\RegeneratedOtpCodeMail;

class RegenerateOtpCodeController extends Controller
{   

    public function get_otp_code(){
        $otp_code=otp_codes::where(
            ['user_id'=> $this->id],
            ['otp' => $this->otp]
        );
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        $user->generate_otp_code();

        $data[] = $user;

        Mail::to($user)->send(new RegeneratedOtpCodeMail($user));

        return response()->json([
            'response_code'=> '00',
            'response_message' => 'otp berhasil di buat, cek email',
            'data' => $data,
        ]);
    }
}
