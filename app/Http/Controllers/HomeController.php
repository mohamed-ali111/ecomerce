<?php

namespace App\Http\Controllers;
use App\category;
use App\Models\Product;
use App\Comment;
use App\Post;
use App\Contact;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{



    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }




    public function index()
    {
        //$categories = category::all(); //select all rows

        $categories = DB::table('categories')->select('id' , 'title_'.app()->getLocale() ." AS title"
        ,'description_'.app()->getLocale() ." AS description" , 'created_at','cate_image')->get();

       // $products = Product::all();
        //اي حاجه انت عاوزها تظهر هتظهر داخل السليكت
        $products = DB::table('products')->select('id' , 'title_'.app()->getLocale() ." AS title"
        ,'description_'.app()->getLocale()." AS description" , "price" , "quantity" , "created_at" , "product_image")->paginate(3);
        ////////////////////////////
        // post row 
        $posts = DB::table('posts')->select('id' , 'title_'.app()->getLocale() ." AS title"
        ,'description_'.app()->getLocale()." AS description" , "created_at" , "post_image")->paginate(3);

        /////////////comment
        $comments = DB::table('comments')->select('id' , 'username'
       ,'email' ,'comment', "created_at" , 'updated_at')->get();

           
        
        $contacts = DB::table('contacts')->select('id', "email" , "phone" , "message" )->get();
    
    


        return view('dashbord' , ['categories' => $categories ,
        'products' =>$products ,'posts'=> $posts ,'comments'=> $comments ,'contacts' => $contacts  ]);
    }

    public function show()
    {
        return "show modell";
    }

}
