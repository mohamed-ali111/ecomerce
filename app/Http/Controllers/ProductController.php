<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\category;

use Cartalyst\Stripe\Laravel\Facades\Stripe;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{






    ###################################################
    ################################################
 
    ################################################
    ###################################################
    #####################################################
    #########################
    /////show crud
    public function show($product_id){
        //there category_id as a paramater from home category
        $product = Product::findOrfail($product_id); //find category or fail
        // return name of page of show ,key and value الي شايله الداتا فووق
        return view ('products.show',['product'=>$product]);

    }

         //////////////////product delete with one way
        public function delete($product_id){
            $product = Product::findOrfail($product_id);


            if(File::exists(public_path('images/product/' . $product->product_image))){
                File::delete(public_path('images/product/' . $product->product_image));
            }else{
                dd('File does not exists.');
            }

            $product->delete();
        return redirect()->route('dashbord')->with('toast_info','product has been deleted');


    }
     //create crude
     public function createp(){
        $products = Product::all();
        $categories = category::all();
        return view('products.createp', ['products'=>$products,'categories'=>$categories]);
        //احنا بعتنا الكي والقيمه عشان نستقبلها هناك

    }


    public function save(Request $request){

       $imageNew = '';
       if($request->hasFile('product_image')){
           $img = $request->product_image;
           $imageNew= time().'.'.rand(0,1000).'.'.$img->extension();
           $img->move(public_path('images/product') , $imageNew);

       }

        $validated = $request->validate([
            'title_en' => 'required|max:255|min:2',
            'title_ar' => 'required|max:255|min:2',
            'description_en' => 'required|max:255|min:2',
            'description_ar' => 'required|max:255|min:2',
            'price' => 'required|max:255|min:1',
            'category_id' => 'required',

            'quantity' => 'required|max:255|min:1',
//            'product_image' => 'sometimes|image|mimes:jpg,png,jpeg,gif',

        ],[
            'title_en.required'=>'you should filll',
        ]);

        $new = Product::create([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' =>$request->category_id,
            'product_image' => $imageNew

        ]);
        return redirect()->route('dashbord')->with('info','product has been created');
    }


         public function edit($id){

             $products = Product::all();
             $edit = Product::findOrfail($id);

             return view ('products.edit',['products' => $products , 'edit' => $edit ]);
         }


         public function update (Request $request){
               $product_id = $request->product_id;
               $update = Product::findorfail($product_id);
               //make update for image
               if($request->hasFile('product_image')) {
                   //if you make update for file of image delete the old
                   if (File::exists(public_path('images/product/' . $update->product_image))) {
                       File::delete(public_path('images/product/' . $update->product_image));
                   } else {
                       dd('File does not exists.');
                   }

                   //and add the modern image
                       $img = $request->product_image;
                       $imageNew= time().'.'.rand(0,1000).'.'.$img->extension();
                       $img->move(public_path('images/product') , $imageNew);



                   $update->update([
                       'title_en' => $request->title_en,
                       'title_ar' => $request->title_ar,
                       'description_en' => $request->description_en,
                       'description_ar' => $request->description_ar,
                       'price' => $request->price,
                       'quantity' => $request->quantity,
                       'category_id' =>$request->category_id,

                       'product_image' => $imageNew
                   ]);
               }
        $update->update([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'price' => $request->price,
            'category_id' =>$request->category_id,

            'quantity' => $request->quantity,
        ]);

             return redirect()->route('dashbord' , $product_id)->with('info','product has been updated');

         }















// <===========================================>
// <===========================================>
// <===========================================>

// <===========================================>

public function index()
{
    $products = Product::paginate(8);
    return view('write', compact('products'));
}
// ,=========================>
public function cart()
{
    return view('cart');
}


public function addToCart(Product $product)
{
    

    $cart = session()->get('cart');
    if (!$cart) {
        $cart = [$product->id => $this->sessionData($product)];
        return $this->setSessionAndReturnResponse($cart);
    }
    if (isset($cart[$product->id])) {
        $cart[$product->id]['quantity']++;
        return $this->setSessionAndReturnResponse($cart);
    }
    $cart[$product->id] = $this->sessionData($product);
    return $this->setSessionAndReturnResponse($cart);

}

public function changeQty(Request $request, Product $product)
{
    $cart = session()->get('cart');
    if ($request->change_to === 'down') {
        if (isset($cart[$product->id])) {
            if ($cart[$product->id]['quantity'] > 1) {
                $cart[$product->id]['quantity']--;
                return $this->setSessionAndReturnResponse($cart);
            } else {
                return $this->removeFromCart($product->id);
            }
        }
    } else {
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
            return $this->setSessionAndReturnResponse($cart);
        }
    }

    return back();
}

public function removeFromCart($id)
{
    $cart = session()->get('cart');

    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }
    return redirect()->back()->with('success', "Removed from Cart");

}





















protected function sessionData(Product $product)
{
    
    return [
        'title_en' => $product->title_en,
        'name' => $product->name,

        'quantity' => 1,
        'price' => $product->price,
        'image' => $product->product_image
    ];
}

protected function setSessionAndReturnResponse($cart)
{
    session()->put('cart', $cart);
    // return redirect()->route('cart')->with('success', "Added to Cart");
    return redirect()->back()->with('success', 'Product added to cart successfully!');

}






///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// check out 
public function checkout($amount){
    return view('checkout',compact('amount'));
}

public function charge(Request $request){
   // dd($request->stripeToken);
   $charge = Stripe::charges()->create([
       'currency' => 'USD',
       'source' =>$request->stripeToken,
       'amount' =>$request->amount,
       'description' =>'Test from Laravel new app'
   ]);
   $chargeId = $charge['id'];

   if ($chargeId) {
       session()->forget('cart');
       return redirect()->route('write')->with('success', "payment was done. Thanks");

   }else{
       return redirect()->back();
   }
}







##################################################
###############################################

public function search(Request $req ){
    // return $req->input();
  $data = Product::where('description_en', 'like' , '%' .$req->input('query').'%')->get();
  return view('search' , ['products'=>$data]);
}

}



