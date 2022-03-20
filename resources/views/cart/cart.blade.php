@extends('layouts.app')
@section('content')
<div class="container">
        <h1 class="text-center">Cart Page</h1>
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="50%">post</th>
                    <th width="10%">Price</th>
                    <th width="8%">Quantity</th>
                    <th width="22%">Sub Total</th>
                    <th width="10%"></th>
                </tr>
                </thead>
                <tbody>
                @php $total = 0; @endphp
                @if(session('cart'))
                    @foreach(session('cart') as $id => $post)
                        @php
                            $sub_total = $post['price'] * $post['quantity'];
                            $total += $sub_total;
                        @endphp
                        <tr>
                            <td>
                                <img   src="{{asset('images/post/'. $post['image'])}}"  alt="{{$post['name']}}"  class="img-fluid"   width="150" height="150px" >
                                <span>{{$post['name']}}</span>
                            </td>
                            <td>{{$post['title_en']}}</td>

                            <td>${{$post['price']}}</td>
                            <td>
                                <form action="{{route('change_qty', $id)}}" class="d-flex">
                                    <button type="submit"  value="down"  name="change_to"  class="btn btn-danger">
                                        @if($post['quantity'] === 1) x @else - @endif
                                    </button>
                                    <input  type="number" value="{{$post['quantity']}}" disabled>
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
                <td colspan="5" class="text-right">
                <a href="{{ url('write') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                <button class="btn btn-success">Checkout</button>
            </td>
            </table>
        </div>
    </div>
@endsection