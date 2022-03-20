<?php

namespace App\Http\Controllers;
use App\Blog;
use App\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class blogController extends Controller
{
    //خلي بالك عشان لو هتعرض الداتا في اي صفحه لاز الكود ده يكون مووجود 
    public function index(){
        $blogs = Blog::paginate(2);
        return view('blog', compact('blogs'));
    }



    /////show crud
    public function show($blog_id){

        $blog = Blog::findOrfail($blog_id); 
        // 'comments'=>Comment:: where ('blog_id' , '=' , $blog->id)->get()
        return view ('blogs.showblog',['blog'=>$blog]);

    }
    public function readmore($blog_id){

        $blog = Blog::findOrfail($blog_id); 
        return view ('blogs.readmore',['blog'=>$blog]);

    }

         //////////////////product delete with one way
        public function delete($blog_id){
            $blog = Blog::findOrfail($blog_id);


            if(File::exists(public_path('images/blog/' . $blog->blog_image))){
                File::delete(public_path('images/blog/' . $blog->blog_image));
            }else{
                dd('File does not exists.');
            }


            $blog->delete();
           return redirect()->route('dashbord')->with('toast_info','blog has been deleted');


    }
     //create crude
    public function createblog(){
        $blogs = Blog::all();
        return view('blogs.createblog');
       

        }


    public function save(Request $request){

       $imageBlog = '';
       if($request->hasFile('blog_image')){
           $img = $request->blog_image;
           $imageBlog= time().'.'.rand(0,1000).'.'.$img->extension();
           $img->move(public_path('images/blog') , $imageBlog);

       }

        $validated = $request->validate([
            'title_en' => 'required|max:255|min:2',
            'title_ar' => 'required|max:255|min:2',
            'description_en' => 'required|max:255|min:2',
            'description_ar' => 'required|max:255|min:2',
            
//            'product_image' => 'sometimes|image|mimes:jpg,png,jpeg,gif',

        ]);

        $new = Blog::create([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            
            'blog_image' =>$imageBlog

        ]);
        return redirect()->route('dashbord')->with('info','blog has been created');
    }


         public function edit($id){

             $blog = Blog::all();
             $edit = Blog::findOrfail($id);

             return view ('blogs.editblog',['blog' => $blog , 'edit' => $edit ]);
         }



         public function update (Request $request){
               $blog_id = $request->blog_id;
               $update = Blog::findorfail($blog_id);
               //make update for image
               if($request->hasFile('blog_image')) {
                   //if you make update for file of image delete the old
                   if (File::exists(public_path('images/blog/' . $update->blog_image))) {
                       File::delete(public_path('images/blog/' . $update->blog_image));
                   } else {
                       dd('File does not exists.');
                   }

                   //and add the modern image
                       $img = $request->blog_image;
                       $imageBlog= time().'.'.rand(0,1000).'.'.$img->extension();
                       $img->move(public_path('images/blog') , $imageBlog);



                   $update->update([
                       'title_en' => $request->title_en,
                       'title_ar' => $request->title_ar,
                       'description_en' => $request->description_en,
                       'description_ar' => $request->description_ar,
                
                       'blog_image' => $imageBlog
                   ]);
               }
        $update->update([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            
        ]);

             return redirect()->route('dashbord', $blog_id)->with('info','blog has been updated');

         }





}
