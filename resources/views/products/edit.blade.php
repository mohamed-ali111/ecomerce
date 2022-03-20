@extends('Layouts.app')
@section('content')
    @include('includes.navbar')

    <h4 class="editp">Edit your product</h4>
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

        <form enctype="multipart/form-data" method="post" action="{{route('products.update')}}" >
            @csrf


            <input type="hidden" value="{{$edit->id}}" name="product_id">


            <div class="form-group">
                <label >product_image</label>
                <input type="file" class="form-control" name="product_image">
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


            <div class="form-group">
                <label >price</label>
                <input value="{{$edit->price}}" type="number" class="form-control" name="price" min="0">
            </div>


            <div class="form-group">
                <label >quantity</label>
                <input value="{{$edit->quantity}}" type="number" class="form-control" name="quantity" min="0">
            </div>



            <div class="form-group">
            <label >parent</label>

              <br>


                <select class="form-control" name="category_id">
                    <option readonly>---choose--</option>
                    <!-- <option  value="0">main category</option> -->
                    @if($products->count() > 0)
                        @foreach($products as $product)

                            <option
                                @if($edit->category_id == $product->category_id)
                                    selected
                                @else

                                @endif
                                value="{{$product->category_id}}"> {{$product->category_id}}</option>
                        @endforeach
                    @else
                        <option disabled readonly>there is not category here</option>
                    @endif

                </select>

            </div>



            <input type="submit" class="btn btn-primary" value="save products">
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
                        <img src="{{asset('images/product/'. $edit->product_image)}}">
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
