<?php

use Illuminate\Support\Facades\Route;

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
    Route::get('/payment', [App\Http\Controllers\CourseController::class, 'payment'])->name('payment');

Route::get('/', [App\Http\Controllers\Controller::class, 'index'])->name('frontend.index');
Route::get('/courses', [App\Http\Controllers\CourseController::class, 'courses'])->name('courses');
Route::get('/about', [App\Http\Controllers\Controller::class, 'aboutus'])->name('about');
Route::get('/contact-us', [App\Http\Controllers\Controller::class, 'contact'])->name('contact');
Route::get('/sign-in', [App\Http\Controllers\Controller::class, 'signin'])->name('sign-in');
Route::post('/sign-in', [App\Http\Controllers\Controller::class, 'check'])->name('log-in-check');
/* Route::get('/register', [App\Http\Controllers\Controller::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\Controller::class, 'save'])->name('register-save'); */
Route::get('/payment', [App\Http\Controllers\CourseController::class, 'payment'])->name('payment');
/* Route::get('/my-courses', [App\Http\Controllers\CourseController::class, 'subscribe'])->name('my-courses'); */
/* Route::get('/logout', [App\Http\Controllers\Controller::class, 'logout'])->name('logout'); */
Route::post('/subscribe-free/{id}',[App\Http\Controllers\CourseController::class, 'subscribeFree'])->name('subscribe-free');
Route::get('/subscribed-courses',[App\Http\Controllers\CourseController::class, 'subscribedCourses'])->name('my-courses');




/* Admin routes */
Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
Route::get('/add_courses', [App\Http\Controllers\CourseController::class, 'addcourse'])->name('add-courses');
Route::post('/add_courses', [App\Http\Controllers\CourseController::class, 'addcoursesave'])->name('add-courses-save');
Route::post('/add_video', [App\Http\Controllers\CourseController::class, 'addvideo'])->name('add-video');
Route::get('/view-all-courses', [App\Http\Controllers\CourseController::class, 'viewcourses'])->name('view-courses');
Route::get('/view-course/{id}', [App\Http\Controllers\CourseController::class, 'viewcourse'])->name('view-course');
Route::delete('/delete-course/{id}', [App\Http\Controllers\CourseController::class, 'deletecourse'])->name('destroy-course');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
