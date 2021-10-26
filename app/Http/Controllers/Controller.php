<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use App\Models\Course;
use App\Models\User;
use App\Models\Newslettersubscribe;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
        $showCourses = Course::with('videos')->get();
        
        return view('front-end.pages.Home', compact('showCourses'));

    }
    public function courses(){
        $showCourses = Course::with('videos')->get();

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


            public function blogDetails(){
                return view('front-end.pages.BlogDetails');
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

}
