<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;

class RelationsController extends Controller
{
 ##########################################
####################################
public function categories()
{
    $categories = category::all();
    return view('categories', compact('categories'));
}

public function products($category_id){
    $category = category::find($category_id);

    $products = $category-> products;
    return view('index',compact('products'));

}
###################################
##############################
##############################
}
