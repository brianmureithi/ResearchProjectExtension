<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
        return view('front-end.pages.Home');
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
