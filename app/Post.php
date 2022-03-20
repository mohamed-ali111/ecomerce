<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // write colom names in $fillable in models 
    protected $fillable =[
        'title_en','title_ar','description_en','description_ar','post_image'
    ];




    public function comments(){
        return $this->hasMany(Comment::Class);
    }
}
