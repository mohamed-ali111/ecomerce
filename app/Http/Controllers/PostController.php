<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
   
    //خلي بالك عشان لو هتعرض الداتا في اي صفحه لاز الكود ده يكون مووجود 
    public function index(){
        $posts = Post::paginate(6);
        return view('post', compact('posts'));
    }



    /////show crud
    public function show($post_id){

        $post = Post::findOrfail($post_id); 
        // 'comments'=>Comment:: where ('Post_id' , '=' , $Post->id)->get()
        return view ('posts.showpost',['post'=>$post]);

    }
    public function readmore($post_id){

        $post = Post::findOrfail($post_id); 
        return view ('posts.readmore',['post'=>$post]);

    }

         //////////////////product delete with one way
        public function delete($post_id){
            $post = Post::findOrfail($post_id);


            if(File::exists(public_path('images/post/' . $post->post_image))){
                File::delete(public_path('images/post/' . $post->post_image));
            }else{
                dd('File does not exists.');
            }


            $post->delete();
           return redirect()->route('dashbord')->with('toast_info','Post has been deleted');


    }
     //create crude
    public function createPost(){
        $posts = Post::all();
        return view('posts.createpost');
       

        }


    public function save(Request $request){

       $imagepost = '';
       if($request->hasFile('post_image')){
           $img = $request->post_image;
           $imagepost= time().'.'.rand(0,1000).'.'.$img->extension();
           $img->move(public_path('images/post') , $imagepost);

       }

        $validated = $request->validate([
            'title_en' => 'required|max:255|min:2',
            'title_ar' => 'required|max:255|min:2',
            'description_en' => 'required|max:255|min:2',
            'description_ar' => 'required|max:255|min:2',
            
//            'product_image' => 'sometimes|image|mimes:jpg,png,jpeg,gif',

        ]);

        $new = Post::create([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            
            'post_image' =>$imagepost

        ]);
        return redirect()->route('dashbord')->with('info','Post has been created');
    }


         public function edit($id){

             $post = Post::all();
             $edit = Post::findOrfail($id);

             return view ('posts.editpost',['post' => $post , 'edit' => $edit ]);
         }



         public function update (Request $request){
               $post_id = $request->post_id;
               $update = Post::findorfail($post_id);
               //make update for image
               if($request->hasFile('post_image')) {
                   //if you make update for file of image delete the old
                   if (File::exists(public_path('images/post/' . $update->post_image))) {
                       File::delete(public_path('images/post/' . $update->post_image));
                   } else {
                       dd('File does not exists.');
                   }

                   //and add the modern image
                       $img = $request->post_image;
                       $imagepost= time().'.'.rand(0,1000).'.'.$img->extension();
                       $img->move(public_path('images/post') , $imagepost);



                   $update->update([
                       'title_en' => $request->title_en,
                       'title_ar' => $request->title_ar,
                       'description_en' => $request->description_en,
                       'description_ar' => $request->description_ar,
                
                       'post_image' => $imagepost
                   ]);
               }
        $update->update([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            
        ]);

             return redirect()->route('dashbord', $post_id)->with('info','Post has been updated');

         }














///////////////////////////////////
/////////////////////////////////
/////////////////////////////////
/////////////////////////////////////



}
