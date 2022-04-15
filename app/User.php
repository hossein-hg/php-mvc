<?php

namespace App;

use System\Database\ORM\Model;

class User extends Model
{

    protected $table = "users";
    protected $fillable = ['first_name','last_name','email','avatar','password','status','is_active','verify_token','user_type','remember_token','remember_token_expire'];
    protected $casts = [];

    public function roles(){
        return $this->belongsToMany('\App\Role', 'user_role', 'id', 'user_id', 'role_id', 'id');
    }


}