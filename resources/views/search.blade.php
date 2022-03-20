
@extends('Layouts.app')
@section('content')
@include('includes.navbar')

<div class="section3">

@if($products->count() > 0)

   <div class="container  products mt-5">
     <div class="row">
     @foreach($products as $product)
         <div class="col-lg-3 col-md-6">
            <div class="card">
            <img  src="{{asset('images/product/'. $product->product_image)}}" style="height:240px;">
           <!-- <======================> -->
            <div class="overlay">
                <div class="text">
            <a href="{{route('add-cart', [$product->id])}}" >  <i class="fas fa-shopping-cart"></i></a>  
                  <i class="fas fa-search"></i>
                  <i class="fas fa-compress-alt"></i>
                  <i class="fas fa-heart"></i>
                </div> 
            </div>
            <!-- <=====================> -->
     <div class="card-body">
      <div class="text-center insideproduct">
      <h5 class="card-title"> {{$product->title_en}}</h5>
      
      <p class="card-text"> {{$product->description_en}}</p>
      <i class="far fa-star" style="color:gold;"></i>
      <i class="far fa-star" style="color:gold;"></i>
      <i class="far fa-star" style="color:gold;"></i>
      <i class="far fa-star" style="color:gold;"></i>
      <i class="far fa-star" style="color:gold;"></i>
      <h5 class="card-text"><small class="" style="color:red;font-size:16px;">${{$product->price}}.00</small></h5>
    </div>
  </div>
  <!-- <=======================================> -->
  <!-- <=======================================> -->
  <!-- <p class="btn-holder">
  <a  href="{{route('add-cart', [$product->id])}}"  class="btn btn-success btn-block" >Add To Cart</a>
  </p> -->
  <!-- <=======================================> -->
  <!-- <=======================================> -->

</div>
     </div>
     @endforeach
     @else

     <div class="alert alert-danger m-1">
        there is no data......
    </div>
    @endif
    </div>

 </div>
 <div class="m-auto">
</div>
</div>


@include('includes.footer')
    @endsection