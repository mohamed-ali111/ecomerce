@extends('Layouts.app')
@section('content')
    @include('includes.navbar')



    <div style="margin-top: 70px">
        <h4 class="editp">welcome to this page that show post details</h4>


        <div class="card1">
            <h6>OVERALL PROGRESS </h6>
            <div  class="card-header1">
                <h3> id\{{$post->id}}</h3>
                

            </div>
            <div class="row">
                <div class="card-body col-md-6">
                    <h3 class="card-title">Ar</h3>
                    <p class="card-text">{{$post->description_ar}}
                    </p>
                </div>

                <div class="card-body col-md-6">
                    <h3 class="card-title">En</h3>
                    <p class="card-text"> {{$post->description_en}}
                    </p>
                </div>
            </div>
            <div class="card-body1 col-md-12">
                <img src="{{asset('images/post/'. $post->post_image)}}">
                <div class="end1">
                    <h3> {{$post->title_en}}</h3>
                    <p>{{$post->title_ar}}</p>

                </div>

            </div>
            <div class="pt-2" >
                        {{$post->created_at}}

            </div>

        </div>


    </div>


@endsection
