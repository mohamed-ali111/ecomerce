@extends('Layouts.app')
@section('content')
    @include('includes.navbar')

    <h4 class="editp">create new blog</h4>
    <div class="container ">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form enctype="multipart/form-data" method="post" action="{{route('posts.save')}}" class="container1" style="margin: auto;margin-bottom: 50px">
            @csrf

            <div class="form-group">
                <label >blog_image</label>
                <input type="file" class="form-control" name="post_image">
            </div>

            <div class="form-group">
                <label >title_en</label>
                <input type="text" class="form-control" name="title_en">
            </div>

            <div class="form-group">
                <label >title_ar</label>
                <input type="text" class="form-control" name="title_ar">
            </div>


            <div class="form-group">
                <label >description_en</label>
                <textarea  name="description_en" class="form-control" ></textarea>
            </div>


            <div class="form-group">
                <label >description_ar</label>
                <textarea  name="description_ar" class="form-control" ></textarea>
            </div>



            <input type="submit" class="btn btn-primary" value="save">
        </form>
    </div>


@endsection
