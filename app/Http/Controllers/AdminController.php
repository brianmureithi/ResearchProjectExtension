<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\subscribed_courses;
use App\Models\Contact;
use App\Models\Newslettersubscribe;

class AdminController extends Controller
{
    //
    public function index(){
        $countcourses= Course::count();
        $countsubscriptions= subscribed_courses::count();
        $countmessages= Contact::count();
        $countnewslettersubscriptions= Newslettersubscribe::count();
        return view ('back-end.pages.Dashboard',compact('countcourses','countsubscriptions','countmessages','countnewslettersubscriptions'));
    }
}
