<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;
    protected $table = 'posts';
    protected $guarded = [];
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id_user','id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'post_tags','post_id','tag_id');
    }

    public function comment(){
        return $this->belongsTo(Comment::class, 'id_post', 'id');
    }
}
