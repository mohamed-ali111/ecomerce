
@extends('Layouts.app')
@section('content')
@include('includes.navbar')



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
    <div class="main1">
              <h5>Women bestseller list</h5>
              <br/>
              <h1>New collection <br/>         - New design</h1>
              <button type="button" class="btn btn-danger">Danger</button>
          </div>
    </div>
    <div class="carousel-item">
    <img src="{{asset('images/imagall/anivio1-slider3.png')}}" class="d-block w-100" alt="...">
    <div class="main1">
    <h5>Women bestseller list</h5>
              <br/>
              <h1>New collection <br/>         - New design</h1>
              <button type="button" class="btn btn-danger">Danger</button>
          </div>
    </div>
    <div class="carousel-item">
    <img src="{{asset('images/imagall/anivio1-slider1 (2).png')}}" class="d-block w-100" alt="...">
    <div class="main1">
    <h5>Women bestseller list</h5>
              <br/>
              <h1>New collection <br/>         - New design</h1>
              <button type="button" class="btn btn-danger">Danger</button>
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
<div class="container">
  <div class="row">
    <div class="col-md-12">
    <div class="document">
      <p>AKIRA COLLECTIONS </p>
      <h2>CATEGORIES PRODUCTS </h2>
      <p> Nullam gravida, dolor ac ultrices lobortis, mi dolor justo.</p>
    </div>
    </div>
    

  
     @if(isset($categories) &&  $categories -> count() > 0 )
      @foreach($categories as $category)
      <div>
      <div class="col-md-4">
 
      <div class="card section10">
        <div class="" style="overflow:hidden;">
            <img src="{{asset('images/category/'. $category->cate_image)}}" class="card-img-top" alt="...">
        </div>

      <div class="beforebutton">
 
      <button type="button" class="btn btn-outline-">{{$category->title_en}}</button>
     </div>
        </div>

        </div>
      </div>
@endforeach
       @endif



<!-- ///////////////////// -->
<!-- <div class="col-md-4">
      <div class="card section10">
        <div class="" style="overflow:hidden;">
            <img src="/images/imagall/demo2-WOMEN.jpg" class="card-img-top" alt="...">
        </div>

      <div class="beforebutton">
 
      <button type="button" class="btn btn-outline-">MEN</button>
     </div>
        </div>
      </div> -->
<!-- //////////////////////// -->
<!-- <div class="col-md-4">
      <div class="card section10">
        <div class="" style="overflow:hidden;">
            <img src="/images/imagall/demo2-ACCESSORIES.jpg" class="card-img-top" alt="...">
        </div>

      <div class="beforebutton">
 
      <button type="button" class="btn btn-outline-">MEN</button>
     </div>
      

        </div>       

      </div>

          <a href="{{route('index.category')}}" class="btn btn-success btn-lg btn-block">show all categories</a>


   


  </div>
</div> -->
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



<!-- 
<form class="form mt-5 text-center" action="/search">
@csrf
    <div class="form-group" style="display:inline-block;">
        <input type="text" name="query" class="" styel="width:500px;">
    </div>
    <button type="submit" class="btn btn-primary"  href="{{route('search')}}" >search</button>
</form>


    @if($categories->count() > 0)
   <div class="container fluid products">
     <div class="row">
         @foreach($categories as $category)
         <div class="col-md-3">
            <div class="card">
            <img  src="{{asset('images/category/'. $category->cate_image)}}">

            <div class="overlay">
                <div class="text">
                  <i class="fas fa-shopping-cart"></i>
                  <i class="fas fa-search"></i>
                  <i class="fas fa-compress-alt"></i>
                  <i class="fas fa-heart"></i>
                </div> 
            </div>



            <div class="card-body">
      <div class="text-center insideproduct">
      <h5 class="card-title"> {{$category->title_en}}</h5>
      
      <p class="card-text"> {{$category->description_en}}</p>
      <i class="far fa-star" style="color:gold;"></i>
      <i class="far fa-star" style="color:gold;"></i>
      <i class="far fa-star" style="color:gold;"></i>
      <i class="far fa-star" style="color:gold;"></i>
      <i class="far fa-star" style="color:gold;"></i>
      <h5 class="card-text"><small class="" style="color:red;font-size:16px;">${{$category->price}}.00</small></h5>
    </div>
  </div>


  <p class="btn-holder">
  <a  href="{{route('add-cart', [$category->id])}}"  class="btn btn-success btn-block" >Add To Cart</a>
  </p>



</div>
     </div>
     @endforeach

    

 </div>
 <div class="m-auto">
 {{$categories->links()}}
</div>
</div>
    @endif
 -->



<!-- 
 <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">des</th>
    </tr>
  </thead>
  <tbody>

  @if(isset($categories) &&  $categories -> count() > 0 )
  @foreach($categories as $category)
    <tr>
      <th scope="row">{{$category->id}}</th>
      <td>{{$category->title_en}}</td>
      <td>{{$category->description_en}}</td>

      <td><a href="{{route('categories.products', $category -> id)}}" class="btn btn-success">عرض الاطباء</a></td>
    </tr>
 @endforeach
 @endif
  </tbody>
</table> -->
</div>
</div>
    @endsection


































    /////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////
    <!-- navbar  -->
    <nav class="navbar navbar-expand-lg ">
  <div class="container-fluid" style="height: 40px;font-size: 18px">
    <a class="navbar-brand" href="dashbord">Dashbord</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<!-- <==================================> -->
<!-- <==================================> -->
<!-- <==================================> -->

<!-- <==================================> -->
   <!-- <===================> -->
  <!-- shopping cart  -->
    
  
  
        <!-- شرح الكود ده اذا كان موجود هاتلي التوتال ملقتهوش حط الصفر  -->
<!-- <============================> -->

<!-- <==================================> -->
<!-- <==================================> -->
<!-- <==================================> -->

<!-- <====================================> -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">




          <li class="nav-item">
              <a class="nav-link" href="{{route('write')}}">Write</a>
          </li>

        <li class="nav-item">
          <a class="nav-link" href="{{route('aboutus')}}">Aboutus</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{route('contactus')}}">Contactus</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{route('index.post')}}">Blogs</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{route('index.category')}}">Category</a>
        </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                  Language
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #6cbac4;">
                  <ul>
                      @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                          <li  style="color: white">
                              <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                  {{ $properties['native'] }}
                              </a>
                          </li>
                      @endforeach
                  </ul>
              </div>
          </li>

      </ul>



<div class="navbar-text">
        <li class="nav-item dropdown color-white ml-auto">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </div>
                                 @include('sweetalert::alert')
                            </li>

                            <!-- ####################################################################### -->
                            <!-- ############################################################## -->
                            
<!-- /////////////////////////////////// -->
<!-- /////////////////////////////////////// -->

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12 main-section">
            <div class="dropdown">
                <button type="button" class="btn btn-info" data-toggle="dropdown">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                </button>
                <div class="dropdown-menu">
                    <div class="row total-header-section">
                        <div class="col-lg-6 col-sm-6 col-6">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </div>
                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                        <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                        </div>
                    </div>
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            <div class="row cart-detail">
                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                    <img src="{{asset('images/product/'. $details['image'])}}" />
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                    <p>{{ $details['name'] }}</p>
                                    <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ///////////////////////////////////////// -->
<!-- ///////////////////////////////////// --></div>
                            <!-- ####################################################################  -->
                            <!-- #######################################################################  -->


    </div>
  </div>
</nav>
