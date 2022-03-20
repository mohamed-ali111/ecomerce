@extends('Layouts.app')
@section('content')
@include('includes.navbar')


<div class="container-fluid mb-5">
    <div class="row">
       <div class="col-md-12">
           <div class="postsec1 text-center pt-3">
           <h1>ALL Post</h1>
           <p><a href="{{route('index.category')}}">home </a>/ allpost</p>
        </div>
       </div>
    </div>
</div>

<!-- #########################################################  -->
<!-- #####################################################  -->
@if($posts->count() > 0)
   <div class="container postssec2 mt-5">
     <div class="row">
         @foreach($posts as $post)
         <div class="col-lg-4 col-md-6 mb-3">
            <div class="card">

            <div class="" style="overflow:hidden;">
            <img src="{{asset('images/post/'. $post->post_image)}}" style="height:240px;width: 510px;">
            </div>
            <!-- <======================> -->
            <span class="post-date">
            <span>29</span>
            <span>Jul</span>
        </span>
            <!-- <=====================> -->
            <div class="card-body" style="padding:1.25rem 0px 0px 0px;">
               <h5 class="card-title"> {{$post->title_en}}</h5>
               <p class="card-text"> {{$post->description_en}}</p>
                  <a href="{{route('posts.readmore', $post->id)}}" class="btn " style="margin-top:-5px">Read more ></a>
               </div>
 


</div>
     </div>
     @endforeach
 </div>
 {{$posts->links()}}

</div>
    @endif
<!-- last section  -->
<!-- ######################################################## -->
<!-- ########################################################  -->
<!-- ######################################################## -->
<!-- ########################################################  -->
<div class="container-fluid lastsection">
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
<!-- <====================>  -->
@include('includes.footer')
@endsection
