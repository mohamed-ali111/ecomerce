<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class TestController extends Controller
{
  public function aboutus(){
      return view('aboutus\aboutus');
  }

 



public function write(){
  $categories = DB::table('categories')->select('id' , 'title_'.app()->getLocale() ." AS title"
  ,'description_'.app()->getLocale() ." AS description" , 'created_at','cate_image')->get();

   // $products = Product::all();
   //اي حاجه انت عاوزها تظهر هتظهر داخل السليكت
   $products = DB::table('products')->select('id' , 'title_'.app()->getLocale() ." AS title"
   ,'description_'.app()->getLocale()." AS description" , "price" , "quantity" , "created_at" , "product_image")->paginate(8);

   return view('write' , ['categories' => $categories ,
   'products' =>$products ]);
}



}
