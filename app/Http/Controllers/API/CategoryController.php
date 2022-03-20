<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Validator;

use App\catogry;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResourse;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use APIResponse;

    //return all categories

    public function index(){
        $categories = CategoryResourse::collection(catogry::all()); //category resourse make controle for the shape of api  
     
       return $this->APIResponse("return all categories succesfully",200,$categories);
    }

    //return one category
    public function show($id){
        $category = catogry::find($id);
        if($category){
            return $this->APIResponse("return one category", 200 ,new CategoryResourse($category));

        }else{
            return $this->APIResponse("there is no such id",200);

        }
    }
   //code of store category in api
    public function store(Request $request){

        // $validData = Validator::make($request->all() , [

        // ])
  ///////كوود الصوره 
  $validData = Validator::make($request->all() , [
    'title_en' => 'required|max:255|min:5',
    'title_ar' => 'required|max:255|min:5',
    'description_en' => 'required|max:255|min:5',
    'description_ar' => 'required|max:255|min:5',
    'parent_id' => 'required',
    //////كود الصوره عشان لو انا رفعت ملف غير الصوره يظهرلي الخطا ده///////
//            'cate_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048'

///max لايزيد عن 2 كيلو بيتاااا

]);

     if($validData->fails()) {
     return $this->APIResponse("there are errors", 200 , $validData->errors());
     }



        $imageName = '';
        if($request->hasFile('cate_image')){
            $image=$request->cate_image;
            $imageName= time().'.'.rand(0,1000).'.'.$image->extension();
            $image->move(public_path('images/category') , $imageName);


        }
     
////
     $new = catogry::create([

         'title_en' => $request->title_en,
         'title_ar' => $request->title_ar,
         'description_en' => $request->description_en,
         'description_ar' => $request->description_ar,
         'parent_id' => $request->parent_id,
         'cate_image' => $imageName


     ]);
     return $this->APIResponse("created new category succefully", 201 ,new CategoryResourse($new));

    }


   //delete function

   public function delete(Request $request){
       $id = $request->category_id;
       $category = catogry::find($id);

       if($category){
           $category->delete();
           return $this->APIResponse("deleted category succefully", 201 ,);

       }else{
        return $this->APIResponse("there is no such id category ", 201 ,);

       }
   }


//code of update category in api
public function update(Request $request){

///////كوود الصوره 
$validData = Validator::make($request->all() , [
'title_en' => 'required|max:255|min:5',
'title_ar' => 'required|max:255|min:5',
'description_en' => 'required|max:255|min:5',
'description_ar' => 'required|max:255|min:5',
'parent_id' => 'required',
//////كود الصوره عشان لو انا رفعت ملف غير الصوره يظهرلي الخطا ده///////
//            'cate_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048'

///max لايزيد عن 2 كيلو بيتاااا

]);

 if($validData->fails()) {
 return $this->APIResponse("there are errors", 200 , $validData->errors());
 }

    $id = $request->category_id;
    $category = catogry::find($id);
    if($category){
            $imageName = '';
    if($request->hasFile('cate_image')){
        $image=$request->cate_image;
        $imageName= time().'.'.rand(0,1000).'.'.$image->extension();
        $image->move(public_path('images/category') , $imageName);


    }
 
////
   $category->update([

     'title_en' => $request->title_en,
     'title_ar' => $request->title_ar,
     'description_en' => $request->description_en,
     'description_ar' => $request->description_ar,
     'parent_id' => $request->parent_id,
     'cate_image' => $imageName


    ]);
      return $this->APIResponse("updated new category succefully", 201 ,new CategoryResourse($category));
    }else{
        return $this->APIResponse("theres no such id category", 201);
    }



}






}
