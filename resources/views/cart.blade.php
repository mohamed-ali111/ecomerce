@extends('layouts.app')
@section('content')
<div class="container">
        <h1 class="text-center">Cart Page</h1>
        <div class="row table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="20%">Image</th>
                    <th width="20%">Name</th>
                    <th width="20%">Price</th>
                    <th width="20%">Quantity</th>
                    <th width="20%">Sub Total</th>
                </tr>
                </thead>
                <tbody>
                @php $total = 0; @endphp
                @if(session('cart'))
                    @foreach(session('cart') as $id => $product)
                        @php
                            $sub_total = $product['price'] * $product['quantity'];
                            $total += $sub_total;
                        @endphp
                        <tr>
                            <td>
                                <img   src="{{asset('images/product/'. $product['image'])}}"  alt="{{$product['name']}}"  class="img-fluid"  style="width:150px; height:150px;"  >
                                <span>{{$product['name']}}</span>
                            </td>
                            <td>{{$product['title_en']}}</td>

                            <td>${{$product['price']}}</td>
                            <td>
                                <form action="{{route('change_qty', $id)}}" class="d-flex">
                                    <button type="submit"  value="down"  name="change_to"  class="btn btn-danger">
                                        @if($product['quantity'] === 1) x @else - @endif
                                    </button>
                                    <input  type="number" value="{{$product['quantity']}}" disabled>
                                    <button type="submit" value="up"  name="change_to" class="btn btn-success">
                                        +
                                    </button>
                                </form>
                            </td>
                            <td>${{$sub_total}}</td>
                            <td>
                                <a href="{{route('remove', [$id])}}" class="btn btn-danger btn-sm">X</a>
                            </td>
                        </tr>   

                    @endforeach
                @endif
                </tbody>
                <!-- #######################  -->
                <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
            <a href="{{ url('write') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
            <a href="{{url('checkout' , [$total])}}" class="btn btn-primary">charge</a>
            <!-- <a href="{{ url('cart.charge') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Checkout</a> -->

            </td>
        </tr>
    </tfoot>
                <!-- #########################  -->
         
            </table>
        </div>
    </div>
    @include('includes.footer')
@endsection