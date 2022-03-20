



@extends('Layouts.app')
@section('content')
@include('includes.navbar')

<div class="container-fluid ">
    <div class="row">
       <div class="col-md-12">
           <div class="postsec1 text-center pt-3">
           <h1> Contact us</h1>
           <p><a href="{{route('index.category')}}">home </a>/ contactus</p>
        </div>
       </div>
    </div>
</div>

            <div>

                <div id="map">
                    <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed"
                         style=" width: 100%; height: 500px; frameborder: 0;  border:0;"  allowfullscreen></iframe>
                </div>




                <div class="container mt-2 mb-5">
                    <div class="row">



                        <div class="aboutus1111 col-lg-6 col-md-12 mt-3 mb-5">
                            <h4>Send Us An Email</h4>
                            <div class="formm-content">
                            @if ($errors->any())
                    <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

                                <form enctype="multipart/form-data" method="post" action="{{route('contacts.store')}}">
                                @csrf

                                
                                <div class="form-row">

                                <div class="form-group col-md-6">
                                            <input type="text" class="form-control" id="number" placeholder="number"name="phone"/>
                                        </div>
          
                                        <div class="form-group col-md-6">
                                            <input type="email" class="form-control" id="email" placeholder="Email"name="email"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Subject" name="subject" />
                                    </div>
                                    <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Enter your message" name="message"  rows="4" ></textarea>
                                    <input type="checkbox"></input>   Enim quis fugiat consequat elit minim nisi eu occaecat occaecat deserunt aliquip nisi ex deserunt.
                                    <br /> <br />
                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                </form>




                            </div>
                    </div>



                       <div class="aboutus999 col-lg-6 col-md-12  mt-3 mb-5">
                       <h4>Get it in touch</h4>

                           <div class="aboutus888 col-md-3">
                               
                           <h5>LOCATION</h5>
                                <p>887 Myrtle Dr. </p>
                                <p>Bronx, NY 16544</p>
                                <p>Bronx, NY 16544</p>
                           </div>

                           <div class="aboutus888 col-md-3">
                           <h5>CONTACT US</h5>
                                <p>Phone : + 1 800 755 60 20</p>
                                <p>Email :contacts@company.com</p>
                           </div>
<br>
                           <div class="aboutus888 col-md-3">
                           <h5>OUR HOURS</h5>
                                <p>MON-FRI 09:00 - 19:00</p>
                                <p>SAT-SUN 10:00 - 14:00</p>
                           </div>

                           <div class="aboutus888 col-md-3">
                           <h5>FOLLOW US</h5>
                               <div class="contactusicons">
                                   <a href="#">
                               <i class="fab fa-facebook-f"></i>
                                   </a>

                                   <a href="#">
                               <i class="fab fa-twitter-square"></i>
                               </a>

                               <a href="#">
                               <i class="fab fa-google-plus-g"></i>
                               </a>

                               <a href="#">
                               <i class="fab fa-youtube"></i>
                               </a>

                               </div>


                           </div>


                       </div>
                        

                        



                    </div>
                </div>  <!-- //end of first container -->


                <!-- ########################################################  -->
<!-- ######################################################## -->
<!-- ########################################################  -->
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
<!-- ######################################################## -->
<!-- ########################################################  -->
<!-- ######################################################## -->
<!-- ########################################################  -->
      
     
                                 
            </div>
          
 
            @include('includes.footer')


@endsection