<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Blog extends Model
{
    protected $fillable =[
        'title_en','title_ar','description_en','description_ar','blog_image',
    ];

    //relationships
    // public function comments(){
    //     return $this->hasMany(Comment::class);
    // }
}
