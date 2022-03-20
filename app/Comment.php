<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Blog;
class Comment extends Model
{
    protected $fillable =[
        'username','email','comment','post_id'
    ];

    public function post(){
        return $this->belongsTo(Post::Class);
    }

}
