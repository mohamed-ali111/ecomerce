<?php

namespace App\Http\Controllers;
use App\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContactController extends Controller
{







 

    public function index()
    {
        $contacts = Contact::all();
        return view('contactus/contactus', compact('contacts'));
    }



    ///////////////////////
    public function store(Request $request){
  
        $validatedData = $request->validate([
            'email' => 'required|max:255|min:5',
            'message' => 'required|max:255|min:5',
            'phone' => 'required',
        ]);
//
//        if($validatedData->fails()) {
//            return back()->with('error',$validatedData->messages()->all()[0])->withInput();
//        }
////
     $new = Contact::create([

         'email' => $request->email,
         'message' => $request->message,
         'phone' => $request->phone,
   

     ]);
     return back()->with('success','you have send your email');
    }
}
