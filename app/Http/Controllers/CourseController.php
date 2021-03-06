<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Video;
use App\Models\User;
use App\Models\payments;
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
      
        return back()->with('success-add','Course added successfully, proceed to add videos');
      }
 catch(\Exception $e){  
     return back()->with('fail-add','Addition of course failed. Ensure all fields are filled appropriately');
          }
      }     
      public function addvideo(Request $request){
       try{ 
        
          $request->validate
          ([
              'video'=>'required',
              'course_id'=>'required',
              'description'=>'required',
              'lesson'=>'required',
          ]);
          $data = new Video();
          $course_id=$request->input('course_id');
          $description=$request->input('description');
          $lesson=$request->input('lesson');
          $file =$request->video;
          $filename=time().'.'.$file->getClientOriginalExtension();
          $request->video->move('storage/img/videos',$filename);
          $data->video=$filename;
          $data->lesson=$lesson;
          $data->course_id=$course_id;
          $data->description=$description;
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
        $showcoursedetails = Course::where('id', '=',$id)->with('videos')->get();
       
        return view('back-end.pages.ViewCourse', compact('showcoursedetails'));

      }
      public function deletecourse(Request $request, $id){
        $findCourse = Course::find($id);
        $findCourse->delete();
        $findVideo= Video::where('course_id',$id);
        $findVideo->delete();
       
        return back()->with('success','Course Deleted successfuly');
        
      }
      public function deleteimage(Request $request, $id){
        $findCourse = Course::find($id);
        $findCourse->delete();
       
       
        return back()->with('success','Course Deleted successfuly');
        
      }
      public function deletevideo(Request $request, $id){
        $findVideo = Video::find($id);
        $findVideo->delete();
       
       
        return back()->with('success','Video Deleted successfuly');
        
      }

      public function payment(Request $request, $id){
        $getcourses=Course::where('id', '=',$id)->get();
       
        return view('front-end.pages.Payment', compact('getcourses'));
      }
      public function subscribe(){

      }

     
      public function  updatecourse(Request $request, $id){
        $findCourse = Course::find($id);
    
        $findProductById->update( $request->except(['_token', '_method' ]) );
        return back()->with('success','Course updated successfuly');
    }
      public function  updatecourseimage(Request $request, $id){
      /*   $findCourse = Course::find($id); */
    
      $image =$request->image;
      $filename=time().'.'.$image->getClientOriginalExtension();
      $request->image->move('storage/img/courseImages',$filename);
             Course::where('id', $id)->update(array('image' => $filename));
       /*  $findProductById->update( $request->except(['_token', '_method' ]) ); */
        return back()->with('success-image','Course image updated successfuly');
    }
      
      public function subscribeFree(Request $request, $id){
       
       /*  $findCourse = subscribed_courses::find($id); */
       /*  Table::select('name','surname')->where('id', 1)->get(); */
        $user = DB::table('subscribed_courses')->where(['course_id'=>$id, 'user_id' => auth()->user()->id])->first();

        
          if($user){
            return back()->with('fail-subscribe', 'Already subscribed to this course');
          }else{
              subscribed_courses::create([
                'course_id'=>$id,               
                'user_id'=>auth()->user()->id,
                'status'=> 1,
             
            ]);
    
          return redirect()->route('my-courses')
          ->with('success-free','Course subscribed successfully'); 
            }  
               
               }

        public function subscribePay(Request $request){
          $request->validate
          ([
              'amount'=>'required',
              'course_id'=>'required',
             
              'phone'=>'required',
                           
             
             
          ]);
           $user = DB::table('subscribed_courses')->where(['course_id'=>$request->course_id, 'user_id' => auth()->user()->id])->first();
        
          if($user){
            return back()->with('fail-subscribe', 'Already subscribed to this course');
          }else{ 
              subscribed_courses::create([
                'course_id'=>$request->course_id,               
                'user_id'=>auth()->user()->id,
                'status'=> 0,
             
            ]);
             /*  payments::create([
                'course_id'=>$request->course_id,               
                'user_id'=>auth()->user()->id,
                'phone'=>$request->phone,        
                'amount'=>$request->amount,        
             
            ]); */

        
          /*   my-courses */
         return redirect()->route('my-courses')
            ->with('success-pay','Course subscribed successfully, Kindly confirm payment to access course'); 

        }   
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
      
      public function addVideoAdmin(Request $request, $id){
        try{ 
        
          $request->validate
          ([
              'video'=>'required',
              'description'=>'required',
              'lesson'=>'required',

            
             
             
          ]);
          $data = new Video();
         
          $file =$request->video;
          $description =$request->description;
          $lesson =$request->lesson;
          $filename=time().'.'.$file->getClientOriginalExtension();
          $request->video->move('storage/img/videos',$filename);
          $data->video=$filename;
          $data->description=$description;
          $data->lesson=$lesson;
          $data->course_id=$id;
          $data->save();

         
     
        

        
          return back()->with('success', 'Video Added Successfully'); 

     }catch(\Exception $e){
        
          return back() ->with('fail','Video addition failed, ensure all records are filled approprately');

      }  
       
      }
      public function adminSubscribedCourses (){
        
        $subscribedCourses=subscribed_courses::with('course','user')->get();
 /* 
       dd($subscribedCourses);  */
      
return view('back-end.pages.SubscribedCourses', compact('subscribedCourses'));
      }

      

    }    
    


