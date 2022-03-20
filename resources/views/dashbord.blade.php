@extends('layouts.app')

@section('content')
@include('includes.navbar')


<h2 class="text-center bg-primary p-1 text-white">{{__('lang.DASHBORD')}} {{app()->getLocale()}}</h2>

<div class="main">
<div class="container-fluid">
          <div class="row" style="margin-top: 80px">



              <div class="col-md-6 mt-5 mb-2">
              <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                 <h5 class="">{{__('lang.CATEGORIES')}}<span class="badge badge-primary m-1">{{$categories->count()}}</span></h5>
                  <a href="{{route('categories.create')}}" class="btn btn-success">add new category</a>
                  </div>
               <div class="card-body">
                <div class="table-responsive">
             <table class="table table table-light table-hover table-striped table-bordered text-center">

            <thead>
          <tr>
      <th scope="col">#</th>
              <th scope="col">images</th>

              <th scope="col">{{__('lang.TITLE')}}</th>
      <th scope="col">{{__('lang.DESCRIPTION')}}</th>
      <th scope="col">{{__('lang.CREATED_AT')}}</th>
      <th scope="col">Controlles</th>

          </tr>
  </thead>
  <tbody>

  @if($categories->count() > 0 )
  @foreach($categories as $category)
           <tr>
      <th scope="row">{{$category->id}}</th>

               <td>
               @if(!empty($category->cate_image))
                   <img style="height: 70px;width: 70px" src="{{asset('images/category/'. $category->cate_image)}}">
               @else
                   <span>No image</span>
               @endif</td>
      <td>{{$category->title}}</td>
      <td>{{$category->description}}</td>

      <td>{{$category->created_at}} </td>

               <td>
                   <a class="btn btn-sm btn-success" href="{{route('categories.show', $category->id)}}">
                       <i class="fas fa-eye"></i>
                   </a>
               </td>


               <td>
                   <a class="btn btn-sm btn-info" href="{{route('categories.edit', $category->id)}}">
                       <i class="fas fa-pencil"></i>
                   </a>
               </td>

               
               <td>
                                    <!-- delete form  -->

                       <form method="POST" action="{{ route('categories.delete', $category->id) }}">
                       @csrf
<!-- {{--                       @method('delete')--}} -->
                       <input type="hidden" value="{{$category->id}}" name="category_id">
                       <button class="btn btn-sm btn-warning" type="submit">   <i class="fas fa-trash"></i>
                       </button>
                   </form>
               </td>
    </tr>
    @endforeach
   
    @else
    <div class="alert alert-danger m-1">
        there is no data......
    </div>
    

    @endif
  </tbody>
</table>

            </div>
                </div>
                </div>
              </div>
              <!-- <=============product table====================> -->
<!-- {{--          ===================product table==============================> -->--}} -->
              <!-- <=============product table=======================> -->
              <div class="col-md-6">
              <div class="card mt-5 mb-2">

                  <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="">{{__('lang.PRODUCTS')}}<span  class="badge badge-primary m-1">{{$products->count()}}</span></h5>
                  <a href="{{route('products.createp')}}" class="btn btn-success">add new product</a>
                  </div>

                  <div class="card-body">
                      <div class="table-responsive">
                 <table class="table table table-light table-hover table-striped table-bordered text-center">
            <thead>
          <tr>
      <th scope="col">#</th>
        <th scope="col">images</th>
       <th scope="col">{{__('lang.TITLE')}}</th>
      <th scope="col">{{__('lang.DESCRIPTION')}}</th>
      <th scope="col">{{__('lang.PRICE')}}</th>
      <th scope="col">{{__('lang.QUANTITY')}}</th>
      <th scope="col">{{__('lang.CREATED_AT')}}</th>
      <th scope="col">Controlles</th>

          </tr>
  </thead>
  <tbody>

  @if($products->count() > 0)
  @foreach($products as $product)
           <tr>
      <th scope="row">{{$product->id}}</th>

               <td>
                   @if(!empty($product->product_image))
                       <img style="width: 70px;height: 70px" src="{{asset('images/product/'. $product->product_image)}}">

                   @else
                       <span>No image</span>
                  @endif
               </td>
      <td>{{$product->title}}</td>
      <td>{{$product->description}}</td>
      <td>{{$product->price}} </td>
      <td>{{$product->quantity}} </td>
      <td>{{$product->created_at}} </td>


               <td>
                   <a class="btn btn-sm btn-success" href="{{route('products.show', $product->id)}}">
                       <i class="fas fa-eye"></i>
                   </a>
               </td>


               <td>
                   <a class="btn btn-sm btn-info" href="{{route('products.edit', $product->id)}}">
                       <i class="fas fa-pencil"></i>
                   </a>
               </td>


               <td>
                   <a class="btn btn-sm btn-danger" href="{{route('products.delete', $product->id)}}">
                       <i class="fas fa-trash"></i>
                   </a>
               </td>



    </tr>
    @endforeach
    @else
    <div class="alert alert-danger m-1">
        there is no data......
    </div>
    @endif
  </tbody>
</table>  
<div class="bg-red">
  {{$products->links()}}
</div>

                      </div>
              </div>
             </div>
          </div>
          <!-- ///////////////////////////////////////////////////////////////////////// -->
          <!-- /////////////////////////////////////////////////////////////////////////// -->
              <!-- <=============post table====================> -->

         
              <div class="col-md-6">
              <div class="card mt-5 mb-2">

                  <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="">{{__('lang.POSTS')}}<span  class="badge badge-primary m-1">{{$posts->count()}}</span></h5>
                  <a href="{{route('posts.createpost')}}" class="btn btn-success">add new post in post</a>
                  </div>

                  <div class="card-body">
                      <div class="table-responsive">
                 <table class="table table table-light table-hover table-striped table-bordered text-center">
                 <thead>
                     <tr>
                      <th scope="col">#</th>
                      <th scope="col">images</th>
                      <th scope="col">{{__('lang.TITLE')}}</th>
                      <th scope="col">{{__('lang.DESCRIPTION')}}</th>
                      <th scope="col">{{__('lang.CREATED_AT')}}</th>
                      <th scope="col">Controlles</th>

               </tr>
                    </thead>
                       <tbody>

                       @if($posts->count() > 0)
                       @foreach($posts as $post)
                    <tr>
                       <th scope="row">{{$post->id}}</th>

                       <td>
                      @if(!empty($post->post_image))
                          <img style="width: 70px;height: 70px" src="{{asset('images/post/'. $post->post_image)}}">

                      @else
                          <span>No image</span>
                      @endif
                      </td>
                      <td>{{$post->title}}</td>
                      <td>{{$post->description}}</td>
                      <td>{{$post->created_at}} </td>


                      <td>
                       <a class="btn btn-sm btn-success" href="{{route('posts.showpost', $post->id)}}">
                       <i class="fas fa-eye"></i>
                       </a>
                      </td>


                      <td>
                       <a class="btn btn-sm btn-info" href="{{route('posts.edit', $post->id)}}">
                       <i class="fas fa-pencil"></i>
                       </a>
                      </td>


                      <td>
                        <a class="btn btn-sm btn-danger" href="{{route('posts.delete', $post->id)}}">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>



                </tr>
             @endforeach
               @else
           <div class="alert alert-danger m-1">
              there is no data......
          </div>
             @endif
            </tbody>
             </table>
             <div class="bg-red">
              {{$posts->links()}}
             </div>
               </div>
              </div>
             </div>
          </div>
          <!-- ////////////////////////////////////////////////////////////////////////// -->
          <!-- ////////////////////////////////////////////////////////////////////////////// -->
            <!-- ///////////////////////////////////////////////////////////////////////// -->
          <!-- /////////////////////////////////////////////////////////////////////////// -->
              <!-- <=============contact table====================> -->

         
              <div class="col-md-6">
              <div class="card mt-5 mb-2">

                  <div class="card-header d-flex justify-content-between align-items-center">
                  <h5 class="">{{__('lang.USERS')}}<span  class="badge badge-primary m-1">{{$contacts->count()}}</span></h5>
                  </div>

                  <div class="card-body">
                      <div class="table-responsive">
                 <table class="table table table-light table-hover table-striped table-bordered text-center">
                 <thead>
                     <tr>
                      <th scope="col">#</th>
                      <th scope="col">email</th>
                      <th scope="col">message</th>
                      <th scope="col">phone</th>
                      <th scope="col">Controlles</th>

               </tr>
                    </thead>
                       <tbody>

                       @if($contacts->count() > 0)
                       @foreach($contacts as $contact)
                    <tr>
                       <th scope="row">{{$contact->id}}</th>

               
                      <td>{{$contact->email}}</td>
                      <td>{{$contact->message}}</td>
                      <td>{{$contact->phone}} </td>


                      <td>
                       <a class="btn btn-sm btn-success" href="#">
                       <i class="fas fa-eye"></i>
                       </a>
                      </td>


                      <td>
                       <a class="btn btn-sm btn-info" href="#">
                       <i class="fas fa-pencil"></i>
                       </a>
                      </td>


                      <td>
                        <a class="btn btn-sm btn-danger" href="#">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>



                </tr>
             @endforeach
               @else
           <div class="alert alert-danger m-1">
              there is no data......
          </div>
             @endif
            </tbody>
             </table>
               </div>
              </div>
             </div>
          </div>
          <!-- ////////////////////////////////////////////////////////////////////////// -->
          <!-- ////////////////////////////////////////////////////////////////////////////// -->
   
       
          <!-- /////////////////////// -->
          <!-- /////////////////// -->
      </div>
    </div>
   </div>

   @include('includes.footer')
@endsection
