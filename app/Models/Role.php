<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function user(){
        return $this->belongsToMany(User::class,'role_users','role_id','user_id')->withTimestamps();
    }
}
