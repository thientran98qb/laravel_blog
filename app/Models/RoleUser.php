<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleUser extends Model
{
    use SoftDeletes;
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
