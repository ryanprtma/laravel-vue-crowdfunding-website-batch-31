<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = ['title'];
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
}
