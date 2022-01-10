<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use App\Models\Course;
use App\Models\Posts;
use App\Models\User;
use App\Models\Newslettersubscribe;
use App\Models\Contact;
use App\Models\Faqs;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
        $showCourses = Course::with(['videos'=> function($query){
            $query->orderBy('created_at', 'asc')->take(1);
        }])->get();
        $showsubcourse=Course::all();
        $showvid = Course::with('videos')->first();
        
        return view('front-end.pages.Home', compact('showCourses', 'showvid','showsubcourse'));

    }
    public function courses(){
        $showCourses = Course::with(['videos'=> function($query){
            $query->orderBy('created_at', 'asc')->take(1);
        }])->get();

        return view('front-end.pages.Courses', compact('showCourses'));

    }
   
    public function aboutus(){
        return view('front-end.pages.AboutUs');
    }
    public function contact(){
        return view('front-end.pages.ContactUs');
    }
    public function signin(){
        return view('front-end.pages.SignIn');
    }
    /* public function register(){
        return view('front-end.pages.Register');
    } */


              public function save(Request $request){
                        $request->validate([
                            'name'=>'required',
                            'email'=>'required|email|unique:users',
                            'password'=>'required|min:5|max:12',
                            'country'=>'required'                        
                ]);
                        $user= new User;
                        $user->name = $request->name;
                        $user->email = $request->email;
                        $user->country = $request->country;
                        $user->phone = $request->phone;
                        if($request->password != $request->confirm){
                            return back()->with('fail','Ensure both password fields are same');
                        }
                        $user->password = Hash::make($request->password);

                $save= $user->save();

                if($save){
                    return back()->with('success','New user registered successfully');
                }else{
                    return back()->with('fail','Something went wrong, try again');
                }
                    }

                    public function check(Request $request){
                        $request->validate([
                            'email'=> 'required|email',
                            'password'=> 'required|min:5|max:12',
                        ]);
                
                        $userInfo= User::where('email', '=', $request->email )->first();
                        {
                        if($userInfo){
                            if(Hash::check($request->password, $userInfo->password)){
                                $request->session()->put('LoggedUser', $userInfo->id,$userInfo->name );
                                return redirect('');
                            }else{
                               return back()->with('fail','wrong email or password') ;
                            }
                        }   
                        else{
                            return back()->with('fail','Email not recognized, try signing up');
                        }
                    
                    }
                            }

                            /* function logout(){
                                if(session()->has('LoggedUser')){
                                    session()->pull('LoggedUser');
                                    return redirect('/');
                                } 
                            }*/


            public function blogDetails($id){
                $postdetails=Posts::where('id','=',$id)->with(['postimages'])->get();  
                
                return view('front-end.pages.BlogDetails',compact('postdetails'));
            }
            public function blog(){
                $findpost=Posts::with(['postimages'=> function($query){
                    $query->orderBy('created_at', 'asc')->take(1);
                }])->get();
         /*  dd($findpost); */
                return view('front-end.pages.Blog',compact('findpost'));
            }
        
            public function newslettersubscribe(Request $request){
                try{
                    $request->validate
                    ([
                        'email'=>'required|email|unique:newslettersubscribes',           
                        'category'=>'required',
                      
                    ]);
                 /*    $prodoverview=ProductOverview::where('product_id', '=', $request->product_id)->first(); */
                 Newslettersubscribe::create($request->all());
                    
            
          
            return back()->with('success-newsletter','Thankyou for subscribing, we shall be in touch');
                    
                }
                catch(\Exception $e){
                    return back()
                    ->with('fail-newsletter','Sorry an error occured, try subscribing again');
                } 
            }

            public function contactus (Request $request){
                $request->validate([
                    'name'=>'required',
                    'email'=>'required',
                    'subject'=>'required',
                    'message'=>'required',
                  
        ]);
        
        $contact= new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        
$save= $contact->save();

if($save){
    return back()->with('success','Message sent successfully');
}
else{
    return back()->with('fail','Something went wrong, try again');
}

            }

            public function contactsbackend(){
                $showMessages = Contact::all();
                return view('back-end.pages.Messages', compact('showMessages'));
            }

            public function deletemessage($id){
      
                $findmessage = Contact::where('id',$id);
                $findmessage->delete();
                return back()->with('success','Message deleted successfuly');
          
               
              }
              public function addPost(){
                  return view('back-end.pages.AddPost');

              }

              public function viewPosts(){
                  $showposts=Posts::all();
                  return view('back-end.pages.ViewPosts', compact('showposts'));
              }
              public function viewPost($id){
                $showpost = Posts::with('postimages')->where('id',$id)->get();
                return view('back-end.pages.ViewPost',compact('showpost'));
            }

            public function faqs(){
                $showfaqs = Faqs::all();
                return view('front-end.pages.Faqs', compact('showfaqs'));
            }

            public function addfaq(){
                return view('back-end.pages.AddFaq');
            }

 public function faqAdd(Request $request){          
 $request->validate([
                    'question'=>'required',
                    'answer'=>'required',
                               
        ]); 
        $faq= new Faqs;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
       
        
$save= $faq->save();
if($save){
    return back()->with('success-faq','FAQ added successfully');
}
else{
    return back()->with('fail-faq','Something went wrong, try again');
}
      
    
    /*  }
    catch(\Exception $e){
    
        return back()->with('fail-faq','Something went terribly wrong, try again');
    }   */  
     

            }

            public function adminViewFaqs(){

                $showFaqs= Faqs::all();
                return view('back-end.pages.ViewFaqs', compact('showFaqs'));
            }

            public function updatefaq(Request $request, $id){
                $findFaq = Faqs::find($id);
                $findFaq->update( $request->except(['_token', '_method' ]));
                return back()->with('success','Faq updated successfuly');
        
            }

            public function deletefaq($id){
                $findFaq = Faqs::find($id);
                $findFaq->delete();
                return back()->with('success','Faq Deleted successfully');
        
           
            }

            public function downloadVideo(Request $request, $file){
         return response()->download(public_path('storage/img/videos/'.$file));
            }


}
