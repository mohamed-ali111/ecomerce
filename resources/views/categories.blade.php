
@extends('Layouts.app')
@section('content')
@include('includes.navbar')


<div>
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
<!-- <==================> -->
<!-- <==================> -->
<!-- section4 -->
<!-- <==================> -->
<div class="container mt-5">
  <div class="row">
    <div class="col-md-12 document">
      <p>AKIRA COLLECTIONS </p>
      <h2>CATEGORIES PRODUCTS </h2>
      <p> Nullam gravida, dolor ac ultrices lobortis, mi dolor justo.</p>
    </div>
    

  
     @if(isset($categories) &&  $categories -> count() > 0 )
      @foreach($categories as $category)
     
      <div class="col-md-4">
 
      <div class="card section10">
        <div class="" style="overflow:hidden;"> 

            <img src="{{asset('images/category/'. $category->cate_image)}}" class="card-img-top" alt="..." style="height: 270px;">

        </div>

      <div class="beforebutton">
        <div class="beforebutton2">
 
      <a href="{{route('categories.products', $category -> id)}}" class="btn "> {{$category->title_en}}</a>
</div>
     </div>
        </div>
      </div>
       @endforeach
       @endif

</div>
</div>


<!-- <=====================> -->
<!-- <====================>  -->





<!-- <==================> -->
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


<!-- ////////////////////////////////  -->
</div>
@include('includes.footer')
    @endsection