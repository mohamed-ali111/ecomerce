
@extends('Layouts.app')
@section('content')
@include('includes.navbar')










<header>


      <!-- <=============product table=======================> -->
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="{{asset('images/imagall/anivio1-slider1.png')}}" class="d-block w-100" alt="...">
    <div class="animate__animated animate__backInLeft main1" >
    <h5>Women bestseller list</h5>
            
              <h1>New collection <br/> <span style="margin-left:71px;">- New design</span> </h1>
              <a href="#" class="elementor-button elementor-slide-button elementor-size-md">Shop Now</a>
       </div>
    </div>
    <div class="carousel-item">
    <img src="{{asset('images/imagall/anivio1-slider3.png')}}" class="d-block w-100" alt="...">
    <div class="animate__animated animate__backInLeft main1" >
    <h5>Women bestseller list</h5>
            
              <h1>New collection <br/> <span style="margin-left:71px;">- New design</span> </h1>
              <a href="#" class="elementor-button elementor-slide-button elementor-size-md">Shop Now</a>
       </div>
    </div>
    <div class="carousel-item">
    <img src="{{asset('images/imagall/anivio1-slider1 (2).png')}}" class="d-block w-100" alt="...">
    <div class="animate__animated animate__backInLeft main1" >
    <h5>Women bestseller list</h5>
            
              <h1>New collection <br/> <span style="margin-left:71px;">- New design</span> </h1>
              <a href="#" class="elementor-button elementor-slide-button elementor-size-md">Shop Now</a>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
</div>

<!-- <===============================>  -->
<!-- section2  -->

<div class="container mt-5 mb-5">
  <div class="row">
    <div class="col-lg-3 col-md-6">
    <div class="card" >
<div class="icon text-center">
<i class="fas fa-car"></i>
</div>
<hr>
  <div class="card-bodysec2">
    <h5>Free Shipping from $100</h5>
    <p class="card-text">Lorem ipsum dolor sit amet.</p>
  </div>
</div>

    </div>

    <div class="col-lg-3 col-md-6">
    <div class="card" >
<div class="icon text-center">
<i class="fas fa-money-bill-wave"></i>
</div>
<hr>
  <div class="card-bodysec2">
    <h5>Money back guaranteed</h5>
    <p class="card-text">Lorem ipsum dolor sit amet.</p>
  </div>
</div>

    </div>


    <div class="col-lg-3 col-md-6">
    <div class="card" >
<div class="icon text-center">
<i class="fas fa-lock"></i>
</div>
<hr>
  <div class="card-bodysec2">
    <h5>Secure Payment</h5>
    <p class="card-text">Lorem ipsum dolor sit amet.</p>
  </div>
</div>

    </div>



  <div class="col-lg-3 col-md-6">
    <div class="card" >
<div class="icon text-center">
<i class="fas fa-check-circle"></i>
</div>
<hr>
  <div class="card-bodysec2">
    <h5>100% authenticity guaranteed</h5>
    <p class="card-text">Lorem ipsum dolor sit amet.</p>
  </div>
</div>

    </div>


  </div>
</div>

<!-- <=================> -->
<div class="redcolom mb-3">
  <hr>
</div>
<!-- <================> -->
<!-- section3 -->

<div class="container ">
  <div class="row">
    <div class="col-md-12 section3">


<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <!-- <==========================================> -->
    <!-- <==========================================> -->
    <form class="form mt-3 mb-3 text-center" action="/search">
         @csrf
         <div style="width:100%;">
    <div class="form-group formsearch" style="display:inline-block;width:500px;">
        <input type="text"  class="form-control" name="query"  styel="">
      </div>   
      <button style="display:inline-block;" type="submit" class="btn btn-primary"  href="{{route('search')}}" >search</button> 

</div>
</form>
    <!-- <==========================================> -->

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
      <h5 class="card-title"> {{$product->title}}</h5>
      
      <p class="card-text"> {{$product->description}}</p>
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


     <!-- =======================  -->
  </div>
<div>
{{$products->links()}}

</div>
</div>


    </div>
  </div>
</div>


<!-- ######################################################  -->
<!-- <==================> -->
<!-- last section  -->
<div class="lastsection">
  <div class="insidelastsection">
  <h1>Sign Up for Our Email List</h1>
  <h4>Sign up for our email list and get 10% off your first order!.</h4>
  <br>
  <div class="insidelastsection2">
  <!-- <form class="d-flex input-group w-auto"> -->
           <input type="email"  class="form-control rounded"   placeholder="Your email address"  aria-label="Search" aria-describedby="search-addon" style="height: 43px;"/>
           <button>
           <span class="d-flex">
               <i class="fas fa-paper-plane"></i>
            </span>
          </button>
          <!-- </form> -->

</div>
</div>
</div>


<!-- <=====================> -->
<!-- <====================>  -->
<!-- <==================> -->
<!-- <==================> -->




    
</header>




<!-- =====================================  -->
<!-- =====================================  -->
 <!-- <div class="container">
     <div class="row">
         <div class="col-md-3">
         <div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="..." alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
</div>
         </div>
     </div>
 </div> -->



 @include('includes.footer')
@endsection
