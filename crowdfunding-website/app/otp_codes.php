<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class otp_codes extends Model
{
    protected $fillable = ['otp'];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function($model){


            if (empty($model->{$model->getKeyName()})){
                $model->{$model->getKeyName()}=Str::uuid();
            }
        });

    public function User(){
        return $this->hasOne('App\User');
        }
}
