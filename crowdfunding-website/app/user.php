<?php

namespace App;


use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\UsesUuid;
use App\roles;


class User extends Authenticatable
{
    use Notifiable;
    use UsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'role_id',
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
        return $this->belongsTo('App\otp_codes');
    }

    public function isAdmin(){
        if($this->role_id === $this->get_role_admin()){
            return true;
        }
        return false;
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
    }
}
