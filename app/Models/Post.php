<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['title','content','slug','user_id'];
    public function categories(){
        return $this->belongsToMany('App\Models\Category')->withTimestamps();
    }
}
