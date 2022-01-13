<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;

class RegeneratedOtpCodeMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $user_otp;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user_otp)
    {
        $this->user_otp = $user_otp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('example@example.com')
                    ->view('send_email_regenerated_otp_code')
                    ->with([
                        'otp_code' => $this->user_otp->otp_codes->otp,
                    ]);
    }
}
