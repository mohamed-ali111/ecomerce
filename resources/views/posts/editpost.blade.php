@extends('Layouts.app')
@section('content')
    @include('includes.navbar')

    <h4 class="editp">Edit your blog</h4>
    <div class="container">
        <div class="row">
            <div class="container1 col-md-6">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form enctype="multipart/form-data" method="post" action="{{route('posts.update')}}" >
            @csrf


            <input type="hidden" value="{{$edit->id}}" name="post_id">


            <div class="form-group">
                <label >blog_image</label>
                <input type="file" class="form-control" name="post_image">
            </div>

            <div class="form-group">
                <label >title_en</label>
                <input value="{{$edit->title_en}}" type="text" class="form-control" name="title_en">
            </div>

            <div class="form-group">
                <label >title_ar</label>
                <input value="{{$edit->title_ar}}" type="text" class="form-control" name="title_ar">
            </div>


            <div class="form-group">
                <label >description_en</label>
                <textarea  name="description_en" class="form-control" >{{$edit->description_en}}</textarea>
            </div>


            <div class="form-group">
                <label >description_ar</label>
                <textarea  name="description_ar" class="form-control" >{{$edit->description_ar}}</textarea>
            </div>


       

            <input type="submit" class="btn btn-primary" value="save posts">
        </form>

            @if (session('success'))
                <div class="alert alert-info">
                    {{ session('success') }}
                </div>
            @endif
    </div>
            <div class="col-md-6 secondpart">
                <div class="image">
                         @if(!empty(($edit->product_image)))
                        <img src="{{asset('images/product/'. $edit->blog_image)}}">
                @else
                             <span style="text-align: center">No image</span>
                @endif
                </div>
                <br>
                <label>image kind</label>

            </div>
        </div>
    </div>

@endsection
