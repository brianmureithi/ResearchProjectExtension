<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    //

    public function index(){
      return view('front-end.pages.Courses') ;
    }
    public function addcourse(){
      return view('back-end.pages.AddCourses') ;
    }
    public function addcoursesave(Request $request){
      try{
        $request->validate
        ([
            'name'=>'required',
            'amount'=>'required',
            'description'=>'required',
        ]);
        Course::create($request->all());
        // $obj= new Subcategory();
        // $obj->name= $request->name;
        // $obj->category_id= $request->category_id;
      

        return back()->with('success','Course added successfully, proceed to add videos');
      }
 catch(\Exception $e){
    
     return back()->with('fail','Addition of course failed. Ensure all fields are filled appropriately');
          }
      }
    
}

