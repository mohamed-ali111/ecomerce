@extends('Layouts.app')
@section('content')
    @include('includes.navbar')

    <h4 class="editp">create new comment</h4>
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

        <form enctype="multipart/form-data" method="post" action="{{route('comments.save')}}" class="container1" style="margin: auto;margin-bottom: 50px">
            @csrf

      

            <div class="form-group">
                <label >username</label>
                <input type="text" class="form-control" name="username">
            </div>

            <div class="form-group">
                <label >email</label>
                <input type="text" class="form-control" name="email">
            </div>


            <div class="form-group">
                <label >comment</label>
                <textarea  name="comment" class="form-control" ></textarea>
            </div>





            <input type="submit" class="btn btn-primary" value="save comments">
        </form>
    </div>


@endsection
