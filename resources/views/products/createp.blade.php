@extends('Layouts.app')
@section('content')
    @include('includes.navbar')

    <h4 class="editp">create new product</h4>
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

        <form enctype="multipart/form-data" method="post" action="{{route('products.save')}}" class="container1" style="margin: auto;margin-bottom: 50px">
            @csrf

            <div class="form-group">
                <label >product_image</label>
                <input type="file" class="form-control" name="product_image">
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


            <div class="form-group">
                <label >price</label>
                <input type="number" class="form-control" name="price" min="0">
            </div>


            <div class="form-group">
                <label >quantity</label>
                <input type="number" class="form-control" name="quantity" min="0">
            </div>



            
            <div class="form-group">
                <label >category_id</label>
                <br>
                <select class="form-control" name="category_id">
                    <option readonly>---choose--</option>
                    <!-- <option  value="0">main category</option> -->
                    @if($categories->count() > 0)
                        @foreach($categories as $category)
                    <option  value="{{$category->id}}"> {{$category->title_en}}</option>
                        @endforeach
                    @else
                        <option disabled readonly>there is not category here</option>
                        @endif

                </select>
            </div>


            <input type="submit" class="btn btn-primary" value="save">
        </form>
    </div>


@endsection
