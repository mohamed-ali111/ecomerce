<?php

namespace App;



class Cart 
{
    public $items=[];
    public $totalQTY;
    public $totalprice;

    public function __construct($cart = null){
        if($cart){
            // if cart exsest يعني لو انا ضفت منتج يجبلي دووول
            $this->items = $cart->items;
            $this->totalQTY = $cart->totalQTY;
            $this->totalprice = $cart->totalprice;

        }else{
            // لو انا مظهرتش 
            $this->items = [];
            $this->totalQTY=0;
            $this->totalprice=0;
        }


    }

        
  public function add($product){
      
    $item = [
       'title'=> $product->title,
    //    'description'=> $product->description,  after you can check it
       'price'=>$product->price,
       'quantity'=> 0,
       'product_image'=>$product->product_image,
    ];
    if(!array_key_exists($product->id,$this->items)){
        $this->items[$product->id] = $item;
        $this->totalQTY += 1;
        $this->totalprice +=$product->price;
    }else{
        $this->totalQTY +=1;
        $this->totalprice += $product->price;
    }
    $this ->items[$product->id]['quantity'] +=1;
    //شرح المسبق لو الاف لو الملف فاضي ضيف المنتج عادي زي ما مكتوب اما لوبتضيف نفس المنتج ذود بس الكميه والسعر
} 









    }

