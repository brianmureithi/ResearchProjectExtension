<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminUser;

use Illuminate\Support\Facades\Hash;

class MainAuthController extends Controller
{
  //

    public function login(){
return view('back-end.pages.login');
    }

    public function check(Request $request){
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|min:5|max:12',
        ]);

        $userInfo= AdminUser::where('email', '=', $request->email )->first();{
        if($userInfo){
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('/dashboard');
            }else{
               return back()->with('fail','wrong email or password') ;
            }
        }   
        else{
            return back()->with('fail','Email not recognized, try signing up');
        }
    
    }
            }


    public function register(){
return view('back-end.pages.register');
    }
    public function save(Request $request){
 $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admin_users',
            'password'=>'required|min:5|max:12',
          
]);
        $admin= new AdminUser;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
$save= $admin->save();

if($save){
    return redirect('/admin')->with('success','New user registered successfully');
}
else{
    return back()->with('fail','Something went wrong, try again');
}

    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/admin');
        }
    }
}
