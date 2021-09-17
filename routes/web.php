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

Route::get('/', [App\Http\Controllers\Controller::class, 'index'])->name('frontend.index');
Route::get('/courses', [App\Http\Controllers\CourseController::class, 'index'])->name('courses');
Route::get('/about', [App\Http\Controllers\Controller::class, 'aboutus'])->name('about');
Route::get('/contact-us', [App\Http\Controllers\Controller::class, 'contact'])->name('contact');
Route::get('/sign-in', [App\Http\Controllers\Controller::class, 'signin'])->name('sign-in');
Route::get('/register', [App\Http\Controllers\Controller::class, 'register'])->name('register');




