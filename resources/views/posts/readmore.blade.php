@extends('Layouts.app')
@section('content')
    @include('includes.navbar')



    <div class="container postereadmore">
        <div class="row">
            <div class="col-lg-9 col-md-12 ">
                <div class="readmorese1">
                <h1>{{$post->title_en}}</h1>
                <p>Axon Vip - {{$post->created_at}} - {{$post->comments->count()}}-Comments - <a href="{{route('write')}}">Home </a>
            </p>
                </div>
                <div class="bigimg">
                <img src="{{asset('images/post/'. $post->post_image)}}">
                </div>
                <div class="mt-4">

                 <p>
                 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                 </p>
                 <!-- <br/> -->
                 <p>
                 It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                </p> 
                <!-- <br/> -->
                <p>
                 Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of 'de Finibus Bonorum et Malorum' (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, 'Lorem ipsum dolor sit amet..', comes from a line in section 1.10.32.
                </p>
                 <!-- <br/> -->
                 <p>
                 The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from 'de Finibus Bonorum et Malorum' by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                
                </p>
                 <!-- <br/> -->
                </div>
                <hr/>
                <div class="icons text-center">
              <a href="#">  <i style="background-color:blue;" class="fab fa-facebook"></i></a>
              <a href="#">   <i style="background-color:#1da1f2;" class="fab fa-twitter"></i></a>
              <a href="#"> <i style="background-color:#bd081c;" class="fab fa-pinterest"></i></a>
              <a href="#"><i style="background-color:#0a66c2;" class="fab fa-linkedin"></i></a> 
              <a href="#"> <i style="background-color:#0088cc;" class="fab fa-telegram"></i></a>
                </div>

                <div>
                    <h5>leave a comment</h5>

<!-- ============================================================ -->
<!-- ============================================================ -->
<!-- ============================================================ -->
<!-- ============================================================ -->
<!-- comment showen in dashboard  -->


@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

<!-- ////////////////////////// -->
<!-- /////////////////////////// -->
    @if($post->comments->count() > 0)
      <div class="col-md-12 commentss" style="display:block;">
        @foreach ($post->comments as $comment)
         <!-- <div class="col-md-9"> -->
           
        <div class="undercomments1">
        <img  alt="" src="https://akira-elementor.axonvip.com/demo4/modules/smartblog/images/avatar/avatar_author_default.jpg" class="avatar" width="74" height="74">
        </div>
        
         <div class="undercomments2">

        <div><span style="font-size:25px;font-weight: 700;">{{ $comment->username}}</span>  <span>says:</span> </div>
        <div>{{ $comment->comment}}</div>

      </div>

      <!-- </div> -->

               
                 <br>
                      <td>
                        <a  style="color:#9b0d0d;;font-size:17px;" href="{{route('comments.delete', $comment->id)}}">
                          <!-- <i class="fas fa-trash"></i> -->Delete 
                        </a>
                      </td> 
 <!-- <div >
                   <p>{{$comment->created_at}}</p>
                </div> -->
                
                 
 
        @endforeach
     
      </div>
  @endif
   <br>
  
<!-- ======================================================== -->
<!-- ======================================================== -->
<!-- ======================================================== -->
<!-- ======================================================== -->
<!-- ======================================================== -->
  <!-- databaise  -->

     <form enctype="multipart/form-data" method="post" action ="/posts/{{$post->id}}/store">
            @csrf

  <div class="form-row">
   
    <div class="form-group col-md-6">
      <label for="inputPassword4">Name</label>
      <input type="text" class="form-control" id="inputPassword4" name="username">
    </div>

    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" name="email">
    </div>
  </div>


  <div class="form-outline mb-4">  
  <label class="form-label" for="form4Example3">Message</label>

    <textarea class="form-control" id="form4Example3" rows="7" placeholder="enter your message" name="comment">
    </textarea>
  </div>


  <button type="submit" class="btn btn-primary">Add comment</button>
</form>

                </div>
            </div>

              
            <div class="col-lg-3 col-md-12 readmoresec2">
            <!-- <h1>{{$post->title_en}}</h1> -->
                <!-- <p>{{$post->description_en}}</p> -->
                <div class="readmoresec22">
                <img style="height:400px;" src="/images/imagall/descond.jpg" class="card-img-top" alt="...">
                <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis, voluptas!</p>

                </div>
           
           
            <!-- <p class="btn-holder">
            </p> -->
            <!-- #################################  -->
            <hr>
            <div class="readmoresec3">
              <div class="readmoresec33">
              <img  src="/images/post\1642210198.123.jpg" class="card-img-top" alt="...">
              </div>
              <div class="readmoresec333">
                <p>Lorem, ipsum dolor.</p>
                <h5>Lorem, ipsum dolor.</h5>
              </div>
            </div>

            <hr>
            <div class="readmoresec3">
              <div class="readmoresec33">
              <img  src="/images/post\1642210816.404.jpg" class="card-img-top" alt="...">
              </div>
              <div class="readmoresec333">
                <p>Lorem, ipsum dolor.</p>
                <h5>Lorem, ipsum dolor.</h5>
              </div>

            </div>

            <hr>
            <div class="readmoresec3">
              <div class="readmoresec33">
              <img  src="/images/post/1642210745.338.jpg" class="card-img-top" alt="...">
              </div>
              <div class="readmoresec333">
                <p>Lorem, ipsum dolor.</p>
                <h5>Lorem, ipsum dolor.</h5>
              </div>

            </div>

            <hr>
            <div class="readmoresec3">
              <div class="readmoresec33">
              <img  src="/images/post\1642210255.619.jpg" class="card-img-top" alt="...">
              </div>
              <div class="readmoresec333">
                <p>Lorem, ipsum dolor.</p>
                <h5>Lorem, ipsum dolor.</h5>
              </div>

            </div>
            <!-- #################################  -->
            <!-- ////////////////////////// -->
<!-- /////////////////////////// -->
<hr>
     
    @if($post->comments->count() > 0)
    <h3>latest message</h3>
      <div class="col-md-12 commentss" style="display:block;">
        @foreach ($post->comments as $comment)
         <!-- <div class="col-md-9"> -->
           
        <div class="undercomments1">
        <i style="font-size: 30px;" class="far fa-comment-dots"></i>
        </div>
        
         <div class="undercomments2">

        <div><span style="font-size:25px;">{{ $comment->username}}</span> <i>ON</i> <span>{{ $comment->comment}}</span> </div>

      </div>              
      
        @endforeach
     
      </div>
  @endif
             <!-- #################################  -->
            <!-- #################################  -->
            <hr>
            <div class="readmoresec3">
              <div class="readmoresec33">
              <img  src="/images/post/1642210688.60.jpg" class="card-img-top" alt="...">
              </div>
              <div class="readmoresec333">
                <p>Lorem, ipsum dolor.</p>
                <h5>Lorem, ipsum dolor.</h5>
              </div>
            </div>

            <hr>
            <div class="readmoresec3">
              <div class="readmoresec33">
              <img  src="/images/post\1642210489.613.jpg" class="card-img-top" alt="...">
              </div>
              <div class="readmoresec333">
                <p>Lorem, ipsum dolor.</p>
                <h5>Lorem, ipsum dolor.</h5>
              </div>

            </div>

            <hr>
            <div class="readmoresec3">
              <div class="readmoresec33">
              <img  src="/images/post\1642210619.984.jpg" class="card-img-top" alt="...">
              </div>
              <div class="readmoresec333">
                <p>Lorem, ipsum dolor.</p>
                <h5>Lorem, ipsum dolor.</h5>
              </div>

            </div>

            <hr>
            <div class="readmoresec3">
              <div class="readmoresec33">
              <img  src="/images/post\1642210540.125.jpg" class="card-img-top" alt="...">
              </div>
              <div class="readmoresec333">
                <p>Lorem, ipsum dolor.</p>
                <h5>Lorem, ipsum dolor.</h5>
              </div>

            </div>

            <!-- #################################  -->
               
            <p class="btn-holder">
            <a  href="{{route('index.post')}}"  class="btn  btn-block" style="background-color:#e3c37a;color:black;" >Go to main blog</a>
            </p>



  <!-- /////////////////////// -->
  
  <!-- //////////////////////// -->
              </div>
        </div>
    </div>

<!-- #######################################  -->
<!-- <///////////////////////////////////  -->

<!-- small modal -->





            
@include('includes.footer')

@endsection
