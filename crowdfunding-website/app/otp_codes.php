<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class otp_codes extends Model
{
    protected $fillable = ['otp', 'user_id', 'valid_until'];

    public function User(){
        return $this->hasOne('App\User');
    }
}
