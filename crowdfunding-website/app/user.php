<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\UsesUuid;
use App\roles;
use App\otp_codes;
use Carbon\Carbon;


class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use UsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'no_hp', 'password', 'role_id',
    ];

    // /**
    //  * The attributes that should be hidden for arrays.
    //  *
    //  * @var array
    //  */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsTo('App\roles');
    }

    public function otp_codes(){
        return $this->hasOne('App\otp_codes');
    }

    public function isAdmin(){
        if($this->role_id === $this->get_role_admin()){
            return true;
        }
        return false;
    }

    public function generate_otp_code(){
        do {
            $random = mt_rand(100000, 999999);
            $check = otp_codes::where('otp', $random)->first();
        } while ($check);
    
        $now = Carbon::now();
    
        //creaete otp
        $otp_code = otp_codes::updateOrCreate(
            ['user_id'=> $this->id],
            ['otp' => $random, 'valid_until' => $now->addMinute(5)]
        );
    }

    public function get_role_admin(){
        $role = roles::where('name', 'admin')->first();
        return $role->id;
    }

    public function get_role_user(){
        $role = roles::where('name', 'user')->first();
        return $role->id;
    }

    public static function boot(){
        parent::boot();

        static::creating(function($model){
            $model->role_id = $model->get_role_user();
        });

        static::created(function($model){
            $model->generate_otp_code();
        });
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
