<?php

namespace App;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    use UsesUuid;

    protected $fillable = ['name'];
    protected $primaryKey = 'id';
    

    
    // public function user()
    // {
    //     return $this->hasMany('App\user');
    // }
    
    public function User()
    {
        return $this->hasMany('App\Users');
    } 
    
}
