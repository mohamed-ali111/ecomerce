@extends('Layouts.app')
@section('content')
    @include('includes.navbar')



    <div style="margin-top: 70px">
        <h4 class="editp">welcome to this page that show product details</h4>


        {{--    for testing--}}
        <div class="card1">
            <h6>OVERALL PROGRESS </h6>
            <div  class="card-header1">
                <h3> id\{{$product->id}}</h3>
                <h4> {{$product->price}}$</h4>
                <h4> {{$product->category_id}}</h4>


            </div>
            <div class="row">
                <div class="card-body col-md-6">
                    <h3 class="card-title">Ar</h3>
                    <p class="card-text">{{$product->description_ar}}
                    </p>
                </div>

                <div class="card-body col-md-6">
                    <h3 class="card-title">En</h3>
                    <p class="card-text"> {{$product->description_en}}
                    </p>
                </div>
            </div>
            <div class="card-body1 col-md-12">
                <img src="{{asset('images/product/'. $product->product_image)}}">
                <div class="end1">
                    <h3> {{$product->title_en}}</h3>
                    <p>{{$product->title_ar}}</p>

                </div>

            </div>
            <div class="pt-2" >
                        {{$product->created_at}}

            </div>

        </div>


    </div>


@endsection
