<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class,'id_user','id');
    }

    public function post(){
        return $this->hasMany(Post::class,'id_post','id');
    }
}
