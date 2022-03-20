<?php

namespace App\Models;
use App\category;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'title_en','title_ar','description_en','description_ar','category_id','price','category_id','quantity','product_image'
    ];


    public function category(){
        return $this->belongsTo(category::Class);
    }
}
