@extends('Layouts.app')
@section('content')
    @include('includes.navbar')



    <div style="margin-top: 70px">
  <h4 class="editp">welcome to this page that show your details</h4>



{{--    for testing--}}
    <div class="card1">
            <h6>OVERALL PROGRESS </h6>
            <div  class="card-header1">
                <h3> id\{{$category->id}}</h3>
                <p>124/200</p>

        </div>
        <div class="row">
        <div class="card-body col-md-6">
            <h3 class="card-title">Ar</h3>
            <p class="card-text">{{$category->description_ar}}
            </p>
        </div>

        <div class="card-body col-md-6">
            <h3 class="card-title">En</h3>
            <p class="card-text"> {{$category->description_en}}
            </p>
        </div>
    </div>
        <div class="card-body1 col-md-12">
            <img src="{{asset('images/category/'. $category->cate_image)}}">
            <div class="end1">
                <h3> {{$category->title_en}}</h3>
                <p>{{$category->title_ar}}</p>

            </div>

        </div>

    </div>


    </div>



@endsection
