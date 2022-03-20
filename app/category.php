<?php

namespace App;
use App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable =[
        'title_en','title_ar','description_en','description_ar','created_at','updated_at','cate_image'
    ];

    public function products(){
        return $this->hasMany(Product::Class);
    }
}
