<nav class="navbar navbar-expand-lg navbar-light ">
  <a class="navbar-brand ml-5" href="dashbord">  <img src="{{asset('images/imagall/anivio1-logo-b.png')}}" class="mb-3" alt="..."></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav m-auto"> 
        
    
    
    <li class="nav-item">
          <a class="nav-link" href="{{route('index.category')}}">Home</a>
        </li>


    <li class="nav-item">
              <a class="nav-link" href="{{route('write')}}">All product</a>
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

       
 
   
      <!-- ################################  -->
      <!-- language  -->
      <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                  Language
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #f4f1ea;">
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
      <!-- ################################# -->
    </ul>
      <!-- ########################################## -->
      <!-- /////////////////////////////////// -->
      <!-- <div class="container"> -->
          <!-- <div class="row"> -->
    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto d-block">
                        <!-- Authentication Links -->
                  
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
                            </li>                              
                               @include('sweetalert::alert')


                    </ul>
<!-- </div> -->
<!-- </div> -->    <form class="form-inline my-2 my-lg-0" style="display: block;">

<!-- /////////////////////////////////////// -->
                  <!-- car code -->
<div class="row responsivecare">

        <div class="col-lg-12 col-sm-12 col-12 main-section">
            <div class="dropdown">
                <button type="button" class="btn " data-toggle="dropdown">
                    <i class="fa fa-shopping-cart" style="font-size: 18px;" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                </button>
                <div class="dropdown-menu cartdrobdown">
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
                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block" style="background-color: #f4f1ea;">View all</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ///////////////////////////////////////// -->
<!-- ///////////////////////////////////// -->
      <!-- ##########################################  -->
    </form>
  </div>
</nav>