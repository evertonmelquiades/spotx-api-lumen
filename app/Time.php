<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Time extends Model implements
    AuthenticatableContract,
    AuthorizableContract
{
    use Authenticatable, Authorizable;
    
    protected $fillable = ['name', 'description', 'password'];
    
    protected $hidden = ['password', 'updated_at', 'created_at'];

    public function membros(){
        return $this->hasMany(Membro::class);
    }
}






?>