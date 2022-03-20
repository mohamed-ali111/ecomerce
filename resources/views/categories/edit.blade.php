@extends('Layouts.app')
@section('content')
    @include('includes.navbar')

    <h4 class="editp">create new category</h4>
    <div class="container" >
        <div class="row">
            <div class="container1 col-md-6">


        <form enctype="multipart/form-data" method="post" action="{{route('categories.update')}}">
            @csrf
            <input type="hidden" value="{{$edit->id}}" name="category_id">
            {{--            //السطر ده لازم تحطه في اي فوووورم//--}}

            <div class="form-group">
                <label >cate_image</label>
                <input type="file" class="form-control" name="cate_image">
                @error('cate_image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label >title_en</label>
                <input value="{{$edit->title_en}}" type="text" class="form-control" name="title_en">

                @error('title_en')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label >title_ar</label>
                <input value="{{$edit->title_ar}}"  type="text" class="form-control" name="title_ar">
                @error('title_ar')
                <div class="alert alert-danger" style="transition: all 9s ease-in-out 0s;">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label >description_en</label>
                <textarea   class="form-control" name="description_en" class="form-control" >{{$edit->description_en}}</textarea>
                @error('description_en')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="exampleInputPassword1">description_ar</label>
                <textarea  class="form-control" name="description_ar" class="form-control" >{{$edit->description_ar}}</textarea>


                @error('description_ar')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <input type="submit" class="btn btn-primary save" value="save">
        </form>




    </div>
            <div class="col-md-6 secondpart">
                <div class="image">
                    @if(!empty(($edit->cate_image)))
                        <img src="{{asset('images/category/'. $edit->cate_image)}}">
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
