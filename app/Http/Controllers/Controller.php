<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Course;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
        $showCourses = Course::with('videos')->get();
        return view('front-end.pages.Home', compact('showCourses'));

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
    public function register(){
        return view('front-end.pages.Register');
    }
}
