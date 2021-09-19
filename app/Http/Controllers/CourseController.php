<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Video;


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
         
     /*   /  if($request->hasfile('video')){ 

            $file =$request->file('video');
            $course_id=$request->input('course_id');
            foreach($file as $file){
            $filename = $file->getClientOriginalName();
            $path = public_path().'/img/videos/';
            return $file->move($path, $filename);

            Video::create([
              'video'=>$video_name,
             
              'course_id'=>$course_id,
              
          ]);
        }

        }
 */
        /*   if($request->hasfile('video')){
              $videos=$request->file('video');
             


              foreach($videos as $video){
                  $video_name=$video->getClientOriginalName();
                  $path=$video->storeAs('videos/',$video_name,'public');
            
                  $course_id=$request->input('course_id');
                 
                  Video::create([
                      'video'=>$video_name,
                     
                      'course_id'=>$course_id,
                      
                  ]);
              }
          } */
        

        
          return back()->with('success-video', 'Video Added Successfully'); 

     }catch(\Exception $e){
        
          return back() ->with('fail-video','Video addition failed, ensure all records are filled approprately');

      }  
      }

      public function viewcourses(){
        $showCourses = Course::all();
        return view('back-end.pages.ViewAllCourses', compact('showCourses'));
      }
      public function viewcourse(){
       
        return view('back-end.pages.ViewCourse', );
      }
      public function deletecourse(Request $request, $id){
        $findCourse = Course::find($id);
        $findCourse->delete();
        $findVideo= Video::where('course_id',$id);
        $findVideo->delete();
       
        return back()->with('success','Course Deleted successfuly');
        
      }

      
    
}

