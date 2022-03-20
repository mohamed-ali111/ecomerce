
@extends('Layouts.app')
@section('content')
@include('includes.navbar')

  <!-- ######################################################  -->
<!-- ######################################################  -->
<!-- ######################################################  -->
<!-- ######################################################  -->
<!-- ######################################################  -->
<!-- <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">description</th>
      <th scope="col">الاجراءات</th>
    </tr>
  </thead>
  <tbody>

  @if(isset($products) &&  $products->count() > 0 )
  @foreach($products as $product)
    <tr>
      <th scope="row">{{$product->id}}</th>
      <td>{{$product->title_en}}</td>
      <td>{{$product->description_en}}</td>
      <td>{{$product->description_ar}}</td>
    </tr>
    <a  href="{{route('add-cart', [$product->id])}}"  class="btn btn-success btn-block" >Add To Cart</a>

 @endforeach
 @endif

  </tbody>
</table> -->
<!-- ###################################################################################################### -->
<!-- ###################################################################################################### -->

<div>
<div class="postsec1 text-center pt-4">
           <h1>ALL Shop</h1>
           <p><a href="http://127.0.0.1:8000/en/categories">home </a>/ allShop</p>
        </div>
</div>
<!-- ###################################################################################################### -->
<!-- ###################################################################################################### -->
<!-- ###################################################################################################### -->
<div class="section3 mt-5">
@if($products->count() > 0)
   <div class="container  products">
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
 </div>
</div>
    @endif
    </div>

     <!-- =======================  -->
  

<!-- ######################################################  -->
<!-- ######################################################  -->
<!-- ######################################################  -->
<!-- ######################################################  -->
   
@include('includes.footer')
    @endsection