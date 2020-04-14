<?php

namespace App;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable

{
    use AuthenticableTrait;
    
    protected $fillable = ['name', 'nick', 'username', 'password', 'number'];
    
    protected $hidden = ['password', 'updated_at', 'created_at'];


    public function time()
   {
       return $this->hasMany('App\Tme','user_id');
   }

}






?>