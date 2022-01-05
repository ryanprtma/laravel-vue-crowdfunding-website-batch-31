<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $table='user';
    protected $fillable = [
        'username', 'email', 'name', 'role_id',
    ];
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
    }

    public function roles()
    {
        return $this->belongsTo('App\roles');
    }
}
