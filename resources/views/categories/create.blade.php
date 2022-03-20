@extends('Layouts.app')
@section('content')
    @include('includes.navbar')

<h4 class="editp">create new category</h4>
    <div class="container" >
{{--        errors code--}}
{{--        @if ($errors->any())--}}
{{--            <div class="alert alert-danger">--}}
{{--                <ul>--}}
{{--                    @foreach ($errors->all() as $error)--}}
{{--                        <li>{{ $error }}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        @endif--}}

        {{--    end errors code--}}
        <form enctype="multipart/form-data" method="post" action="{{route('categories.store')}}" class="container1" style="margin: auto;margin-bottom: 50px">
            @csrf
{{--            //السطر ده لازم تحطه في اي فوووورم//--}}

            <div class="form-group">
                <label >cate_image</label>
                <input type="file" class="form-control" name="cate_image">
{{--                @error('cate_image')--}}
{{--                <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                @enderror--}}
            </div>

            <div class="form-group">
                <label >title_en</label>
                <input type="text" class="form-control" name="title_en">

                @error('title_en')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label >title_ar</label>
                <input type="text" class="form-control" name="title_ar">
                @error('title_ar')
                <div class="alert alert-danger" style="transition: all 9s ease-in-out 0s;">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label >description_en</label>
                <textarea class="form-control" name="description_en" class="form-control" ></textarea>
                @error('description_en')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="exampleInputPassword1">description_ar</label>
                <textarea class="form-control" name="description_ar" class="form-control" ></textarea>


                @error('description_ar')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>



    

            <input type="submit" class="btn btn-primary save" value="save">
        </form>

    </div>


@endsection
