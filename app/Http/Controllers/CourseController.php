<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Video;
use App\Models\subscribed_courses;
use App\Models\Newslettersubscribe;


class CourseController extends Controller
{
    //

    public function index(){
      return view('front-end.pages.Courses') ;
    }
    public function addcourse(){
    
      $showCourses = Course::all();
      return view('back-end.pages.AddCourses',compact('showCourses')) ;
    }
    public function addcoursesave(Request $request){
      try{
        $request->validate
        ([
            'name'=>'required',
            'amount'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);
        
    
        $image =$request->image;
        $filename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('storage/img/courseImages',$filename);
        Course::create([
          'name'=>$request->name,
          'description'=>$request->description,
          'amount'=>$request->amount,
          'image'=>$filename,
         
         
          
      ]);
      /*   Course::create($request->all());
        // $obj= new Subcategory();
        // $obj->name= $request->name;
        // $obj->category_id= $request->category_id; */
      

        return back()->with('success','Course added successfully, proceed to add videos');
      }
 catch(\Exception $e){
    
     return back()->with('fail','Addition of course failed. Ensure all fields are filled appropriately');
          }
      }
      public function addvideo(Request $request){
       try{ 
        
          $request->validate
          ([
              'video'=>'required',
              'course_id'=>'required',
             
             
             
          ]);
          $data = new Video();
          $course_id=$request->input('course_id');
          $file =$request->video;
          $filename=time().'.'.$file->getClientOriginalExtension();
          $request->video->move('storage/img/videos',$filename);
          $data->video=$filename;
          $data->course_id=$course_id;

          $data->save();
         
     
        

        
          return back()->with('success-video', 'Video Added Successfully'); 

     }catch(\Exception $e){
        
          return back() ->with('fail-video','Video addition failed, ensure all records are filled approprately');

      }  
      }

      public function viewcourses(){
        $showCourses = Course::all();
        return view('back-end.pages.ViewAllCourses', compact('showCourses'));
      }
      public function viewcourse($id){
        $showcoursedetails = Course::where('id', '=',$id)->with('course.videos')->get();
       
        return view('back-end.pages.ViewCourse', compact('showcoursedetails'));

      }
      public function deletecourse(Request $request, $id){
        $findCourse = Course::find($id);
        $findCourse->delete();
        $findVideo= Video::where('course_id',$id);
        $findVideo->delete();
       
        return back()->with('success','Course Deleted successfuly');
        
      }

      public function payment(){
        return view('front-end.pages.Payment');
      }
      public function subscribe(){

      }
      
      public function subscribeFree(Request $request, $id){
       
      
          
              subscribed_courses::create([
                'course_id'=>$id,               
                'user_id'=>auth()->user()->id,
             
            ]);
    
    return redirect()->route('my-courses')
    ->with('success-free','Course subscribed successfully'); 
            
          
        
       
        }

        public function subscribedCourses(){
       
        $subcribedcourses = subscribed_courses::where('user_id', '=',auth()->user()->id)->with('course','course.videos')->get();
 
        return view('front-end.pages.SubscribedCourses',compact('subcribedcourses'));
      }


      public function coursecontent(Request $request, $id){
      
        $coursecontent=Course::where('id', '=', $id)->with('videos')->get();

        return view('front-end.pages.CourseContent', compact('coursecontent'));
      }
      public function newsletterbackend(Request $request){
      
        $newslettersubscribers=Newslettersubscribe::all();

        return view('back-end.pages.Newsletersub', compact('newslettersubscribers'));
      }
      public function subscriberdelete($id){
      
        $findsubscriber = Newslettersubscribe::where('id',$id);
        $findsubscriber->delete();
        return back()->with('success','Subscriber deleted successfuly');     
      }
      

    }    
    


