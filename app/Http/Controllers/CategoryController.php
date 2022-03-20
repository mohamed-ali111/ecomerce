<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
//use Illuminate\Http\CategoryRequest;

class CategoryController extends Controller
{


##########################################
####################################
//     public function categories()
// {
//     $categories = category::paginate(2);
//     return view('categories', compact('categories'));
// }

// public function products($category_id){
//     $category = category::find($category_id);

//     $products = $category-> productsss;
//     return view('index',compact('products'));

// }
###################################
##############################
##############################


    // public function show($category_id){
    //     //there category_id as a paramater from home category
    //     $category = product::findOrfail($category_id); //find category or fail
    //     // return name of page of show ,key and value الي شايله الداتا فووق
    //     return view ('categories.show',['category'=>$category]);

    // }

    //code of create new add
    public function create(){
        $categories = category::all();
        return view('categories.create', ['categories'=>$categories]);
    }



//////////////////////////////////
/// ///////////////////////////////////////
    public function store(Request $request){
        ////////////كوود الصوره /////////
        $imageName = '';
        if($request->hasFile('cate_image')){
            $image=$request->cate_image;
            $imageName= time().'.'.rand(0,1000).'.'.$image->extension();
            $image->move(public_path('images/category') , $imageName);


        }
////////////كوود الصورهend  /////////
        $validatedData = $request->validate([
            'title_en' => 'required|max:255|min:5',
            'title_ar' => 'required|max:255|min:5',
            'description_en' => 'required|max:255|min:5',
            'description_ar' => 'required|max:255|min:5',
          

           
            //////كود الصوره عشان لو انا رفعت ملف غير الصوره يظهرلي الخطا ده///////
//            'cate_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048'

        ///max لايزيد عن 2 كيلو بيتاااا



        ]);
//
//        if($validatedData->fails()) {
//            return back()->with('error',$validatedData->messages()->all()[0])->withInput();
//        }
////
     $new = category::create([

         'title_en' => $request->title_en,
         'title_ar' => $request->title_ar,
         'description_en' => $request->description_en,
         'description_ar' => $request->description_ar,
       

         'cate_image' => $imageName


     ]);
     return redirect()->route('dashbord')->with('success','category has been created');
    }
///////////////////////////////////////////////////
/// //////////////////////////////////////////////
/// /////////////////////////////////////////////
/// ////////////////////////////////////////////
    public function show($category_id){
            //there category_id as a paramater from home category
        $category = category::findOrfail($category_id); //find category or fail
                // return name of page of show ,key and value الي شايله الداتا فووق
        return view ('categories.show',['category'=>$category]);

    }

//    public function delete($category_id){
//        $category = catogry::findOrfail($category_id);
//        $category->delete();
//        return redirect()->route('home');
//
//
//    }

    public function delete(Request $request){
        $category = category::findOrfail($request-> category_id);//name of input hidden

        /////////////كوود مسح الصوره//////////
        if(File::exists(public_path('images/category/'.$category->cate_image))){
            File::delete(public_path('images/category/'.$category->cate_image));
        }else{
            dd('File does not exists.');
        }
        ////////////////////////
        $category->delete();
        return redirect()->route('dashbord')->with('toast_success','category has been deleted');


    }
    //////////edit////////////

          public function edit($id){

              $categories = category::all();
            $edit = category::findorfail($id);
            return view ('categories.edit',['categories'=>$categories,'edit' => $edit]);

        }

    //////////update////////////

    public function update(Request $request){

    $category_id = $request->category_id;
    $update = category::findorfail($category_id);


        if($request->hasFile('cate_image')){

            if(File::exists(public_path('images/category/'.$update->cate_image))){
                File::delete(public_path('images/category/'.$update->cate_image));
            }else{
                dd('File does not exists.');
            }

            $image=$request->cate_image;
            $imageName=time().'.'.rand(0,1000).'.'.$image->extension();
            $image->move(public_path('images/category') ,  $imageName);

//              if you make update for image make comment to image
            $update->update([
                'title_en' => $request->title_en,
                'title_ar' => $request->title_ar,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
             
              

                'cate_image' => $imageName
            ]);

        }


//if you dont make save your old image
    $update->update([
        'title_en' => $request->title_en,
        'title_ar' => $request->title_ar,
        'description_en' => $request->description_en,
        'description_ar' => $request->description_ar,
       

        
    ]);

        return redirect()->route('dashbord' , $category_id)->with('success','category has been updated');

    }




    ////////////////////////
    /////////////////////
    // search 
  

/////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////







}
