<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authchecker;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::group(['middleware' => ['auth']], function () { 
    Route::get('/payment', [App\Http\Controllers\CourseController::class, 'payment'])->name('payment');
    Route::get('/subscribed-courses',[App\Http\Controllers\CourseController::class, 'subscribedCourses'])->name('my-courses');
    Route::get('/course-content/{id}',[App\Http\Controllers\CourseController::class, 'coursecontent'])->name('view-course-content');
    Route::post('/subscribe-free/{id}',[App\Http\Controllers\CourseController::class, 'subscribeFree'])->name('subscribe-free');



});
 Route::get('/payment', [App\Http\Controllers\CourseController::class, 'payment'])->name('payment');
Route::get('/', [App\Http\Controllers\Controller::class, 'index'])->name('frontend.index');
Route::get('/courses', [App\Http\Controllers\CourseController::class, 'courses'])->name('courses');
Route::get('/about', [App\Http\Controllers\Controller::class, 'aboutus'])->name('about');
Route::get('/contact-us', [App\Http\Controllers\Controller::class, 'contact'])->name('contact');
Route::get('/sign-in', [App\Http\Controllers\Controller::class, 'signin'])->name('sign-in');
Route::post('/sign-in', [App\Http\Controllers\Controller::class, 'check'])->name('log-in-check');
Route::get('/blog-details', [App\Http\Controllers\Controller::class, 'blogDetails'])->name('blog-details');
Route::post('/newsletter-subscribe', [App\Http\Controllers\Controller::class, 'newslettersubscribe'])->name('newsletter-visitor');
Route::post('/contact-us', [App\Http\Controllers\Controller::class, 'contactus'])->name('contact-form');
/* Route::get('/register', [App\Http\Controllers\Controller::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\Controller::class, 'save'])->name('register-save'); */

/* Route::get('/my-courses', [App\Http\Controllers\CourseController::class, 'subscribe'])->name('my-courses'); */
/* Route::get('/logout', [App\Http\Controllers\Controller::class, 'logout'])->name('logout'); */


/* Admin routes *//* Route::group(['middleware'=>['Authchecker']], function(){  */
    Route::middleware([Authchecker::class])->group(function () {
Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
Route::get('/add_courses', [App\Http\Controllers\CourseController::class, 'addcourse'])->name('add-courses');
Route::post('/add_courses', [App\Http\Controllers\CourseController::class, 'addcoursesave'])->name('add-courses-save');
Route::post('/add_video', [App\Http\Controllers\CourseController::class, 'addvideo'])->name('add-video');
Route::get('/view-all-courses', [App\Http\Controllers\CourseController::class, 'viewcourses'])->name('view-courses');
Route::get('/view-course/{id}', [App\Http\Controllers\CourseController::class, 'viewcourse'])->name('view-course');
Route::delete('/delete-course/{id}', [App\Http\Controllers\CourseController::class, 'deletecourse'])->name('destroy-course');
Route::get('/newsletter-subscribers', [App\Http\Controllers\CourseController::class, 'newsletterbackend'])->name('newsletter-backend');
Route::delete('/delete-subscriber/{id}', [App\Http\Controllers\CourseController::class, 'subscriberdelete'])->name('destroy-subscriber-route');
Route::get('/messages', [App\Http\Controllers\Controller::class, 'contactsbackend'])->name('contacts-backend');
Route::delete('/delete-message/{id}', [App\Http\Controllers\Controller::class, 'deletemessage'])->name('destroy-message-route');
Route::get('/admin',[App\Http\Controllers\MainAuthController::class, 'login'])->name('login-route');
Route::post('/admin',[App\Http\Controllers\MainAuthController::class, 'check'])->name('login-check-user-route');
Route::get('/admin-register',[App\Http\Controllers\MainAuthController::class, 'register'])->name('register-route');
Route::get('/admin-logout',[App\Http\Controllers\MainAuthController::class, 'logout'])->name('logout-route');
Route::post('/admin-register',[App\Http\Controllers\MainAuthController::class, 'save'])->name('save-user-route');
 }); 









