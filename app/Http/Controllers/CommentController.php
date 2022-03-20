<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Post;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CommentController extends Controller
{

 //خلي بالك عشان لو هتعرض الداتا في اي صفحه لاز الكود ده يكون مووجود 
//  public function index(){
//     $posts = Comment::paginate(2);
//     return view('Comment', compact('Comments'));
// }



/////show crud

// public function readmore($post_id){

//     $post = Post::findOrfail($post_id); 
//     return view ('posts.readmore',['post'=>$post]);

// }

     //////////////////product delete with one way

 //create crude
public function createcomment(){
    $comments = Comment::all();
    return view('comments.createcomment');
    }


public function save(Request $request){

  
    // $validated = $request->validate([
    //     'username' => 'required|max:255|min:2',
    //     'email' => 'required|max:255|min:2',
    //     'comment' => 'required|max:255|min:2',
        

    // ]);

    // $new = Comment::create([
    //     'username' => $request->username,
    //     'email' => $request->email,
    //     'comment' => $request->comment,
        

    // ]);
    return redirect()->route('dashbord')->with('info','comment has been created');
}


public function store(Request $request , Post $post){
    $validated =$request->validate([
        'username' => 'required|max:255|min:2',
        'email' => 'required|max:255|min:2',
        'comment' => 'required|max:255|min:2',
        

    ]);
    
    Comment::create([
        'username'=>request('username'),
        'email'=>request('email'),
        'comment'=>request('comment'),
        'post_id'=>$post->id

    ]);
    return back();
}

public function delete($comment_id){
    $comment = Comment::findOrfail($comment_id);
    $comment->delete();
   return back()->with('alert');
}















}