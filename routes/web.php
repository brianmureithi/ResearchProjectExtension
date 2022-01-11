<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authchecker;
use App\Models\User;


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
    Route::get('/payment/{id}', [App\Http\Controllers\CourseController::class, 'payment'])->name('payment');
    Route::get('/subscribed-courses',[App\Http\Controllers\CourseController::class, 'subscribedCourses'])->name('my-courses');
    Route::get('/course-content/{id}',[App\Http\Controllers\CourseController::class, 'coursecontent'])->name('view-course-content');
    Route::post('/subscribe-free/{id}',[App\Http\Controllers\CourseController::class, 'subscribeFree'])->name('subscribe-free');
    Route::post('/subscribe-pay',[App\Http\Controllers\CourseController::class, 'subscribePay'])->name('subscribe-pay');



});

 /* Route::get('/payment/{id}', [App\Http\Controllers\CourseController::class, 'payment'])->name('payment'); */
Route::get('/', [App\Http\Controllers\Controller::class, 'index'])->name('frontend.index');
Route::get('/courses', [App\Http\Controllers\CourseController::class, 'courses'])->name('courses');
Route::get('/about', [App\Http\Controllers\Controller::class, 'aboutus'])->name('about');
Route::get('/contact-us', [App\Http\Controllers\Controller::class, 'contact'])->name('contact');
Route::get('/sign-in', [App\Http\Controllers\Controller::class, 'signin'])->name('sign-in');
Route::post('/sign-in', [App\Http\Controllers\Controller::class, 'check'])->name('log-in-check');
Route::get('/blog-details/{id}', [App\Http\Controllers\Controller::class, 'blogDetails'])->name('blog-details');
Route::get('/blog', [App\Http\Controllers\Controller::class, 'blog'])->name('blog');
Route::get('/faqs', [App\Http\Controllers\Controller::class, 'faqs'])->name('faqs');
Route::post('/newsletter-subscribe', [App\Http\Controllers\Controller::class, 'newslettersubscribe'])->name('newsletter-visitor');
Route::post('/contact-us', [App\Http\Controllers\Controller::class, 'contactus'])->name('contact-form');
Route::get('/download/{file}',[App\Http\Controllers\Controller::class, 'downloadVideo'])->name('download-video');
Route::post('get-token', [App\Http\Controllers\MPESAController::class, 'getAccessToken']);
Route::post('register-urls', [App\Http\Controllers\MPESAController::class, 'registerURLS']);
Route::post('api/validation', [App\Http\Controllers\MPESAResponsesController::class, 'validation']);
Route::post('api/confirmation', [App\Http\Controllers\MPESAResponsesController::class, 'confirmation']);

Route::get('customerMpesaSTKPush', [App\Http\Controllers\MPESAController::class, 'stkPush'])->name('stkpush');
Route::get('simulateb2c', [App\Http\Controllers\MPESAController::class, 'b2cRequest'])->name('b2cRequest');

Route::post('api/stkpushcallback', [App\Http\Controllers\MPESAResponsesController::class, 'stkPush']);
Route::post('api/b2ccallback', [App\Http\Controllers\MPESAResponsesController::class, 'b2ccallback']);
Route::post('api/b2ctimeout', [App\Http\Controllers\MPESAResponsesController::class, 'b2ctimeout']);
Route::get('send-email',function(){
$details = [
    'title'=>'Mail from Brian',
    'body'=>'Hope you are well, test email'
];
$users=User::all();

foreach($users as $user){
\Mail::to($user->email)->send(new \App\Mail\TestEmail($details));

dd("email is sent");
}
});
/* Route::get('/register', [App\Http\Controllers\Controller::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\Controller::class, 'save'])->name('register-save'); */

/* Route::get('/my-courses', [App\Http\Controllers\CourseController::class, 'subscribe'])->name('my-courses'); */
/* Route::get('/logout', [App\Http\Controllers\Controller::class, 'logout'])->name('logout'); */


/* Admin routes *//* Route::group(['middleware'=>['Authchecker']], function(){  */
    Route::middleware([Authchecker::class])->group(function () {
Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
Route::get('/add_courses', [App\Http\Controllers\CourseController::class, 'addcourse'])->name('add-courses');
Route::post('/add_courses', [App\Http\Controllers\CourseController::class, 'addcoursesave'])->name('add-courses-save');
Route::post('/add_video', [App\Http\Controllers\CourseController::class, 'addvideo'])->name('add-video-in-course-add');
Route::get('/view-all-courses', [App\Http\Controllers\CourseController::class, 'viewcourses'])->name('view-courses');
Route::get('/view-course/{id}', [App\Http\Controllers\CourseController::class, 'viewcourse'])->name('view-course');

Route::delete('/delete-course/{id}', [App\Http\Controllers\CourseController::class, 'deletecourse'])->name('destroy-course');
Route::get('/newsletter-subscribers', [App\Http\Controllers\CourseController::class, 'newsletterbackend'])->name('newsletter-backend');
Route::delete('/delete-subscriber/{id}', [App\Http\Controllers\CourseController::class, 'subscriberdelete'])->name('destroy-subscriber-route');
Route::get('/messages', [App\Http\Controllers\Controller::class, 'contactsbackend'])->name('contacts-backend');
Route::delete('/delete-message/{id}', [App\Http\Controllers\Controller::class, 'deletemessage'])->name('destroy-message-route');
Route::delete('/delete-image/{id}', [App\Http\Controllers\CourseController::class, 'deleteimage'])->name('destroy-image-route');
Route::delete('/delete-video/{id}', [App\Http\Controllers\CourseController::class, 'deletevideo'])->name('delete-video');
Route::delete('/delete-post/{id}', [App\Http\Controllers\PostController::class, 'deletepost'])->name('destroy-post-route');
Route::delete('/delete-faq/{id}', [App\Http\Controllers\Controller::class, 'deletefaq'])->name('destroy-faq-route');
Route::get('/admin',[App\Http\Controllers\MainAuthController::class, 'login'])->name('login-route');
Route::post('/admin',[App\Http\Controllers\MainAuthController::class, 'check'])->name('login-check-user-route');
Route::get('/admin-register',[App\Http\Controllers\MainAuthController::class, 'register'])->name('register-route');
Route::get('/admin-logout',[App\Http\Controllers\MainAuthController::class, 'logout'])->name('logout-route');
Route::get('/admin-course-subscribed',[App\Http\Controllers\CourseController::class, 'adminSubscribedCourses'])->name('admin-subscribed-courses');
Route::get('/add-post',[App\Http\Controllers\Controller::class, 'addPost'])->name('add-post');
Route::get('/view-posts',[App\Http\Controllers\Controller::class, 'viewPosts'])->name('view-posts');

Route::get('/view-post/{id}',[App\Http\Controllers\Controller::class, 'viewPost'])->name('view-post');
Route::post('/admin-register',[App\Http\Controllers\MainAuthController::class, 'save'])->name('save-user-route');
Route::post('/add-video/{id}',[App\Http\Controllers\CourseController::class, 'addVideoAdmin'])->name('add-video');

Route::post('/add-video/{id}',[App\Http\Controllers\CourseController::class, 'addVideoAdmin'])->name('add-video');
Route::post('/add-post',[App\Http\Controllers\PostController::class, 'addPostSave'])->name('add-new-post-route.store');
Route::post('/post-add-image/{id}',[App\Http\Controllers\PostController::class, 'addpostimage'])->name('add-post-image');


Route::put('/course-update/{id}', [App\Http\Controllers\CourseController::class, 'updatecourse'])->name('update-course-route');
Route::put('/course-image-update/{id}', [App\Http\Controllers\CourseController::class, 'updatecourseimage'])->name('update-course-image');
Route::put('/post-edit/{id}', [App\Http\Controllers\PostController::class, 'updatepost'])->name('update-post-route');
Route::put('/faq-edit/{id}', [App\Http\Controllers\Controller::class, 'updatefaq'])->name('update-faq-route');
Route::delete('/post-image-delete/{id}', [App\Http\Controllers\PostController::class, 'deletepostimage'])->name('destroy-post-images-route');
Route::get('/add_faqs',[App\Http\Controllers\Controller::class, 'addfaq'])->name('addfaqs');
Route::post('/add_faqs',[App\Http\Controllers\Controller::class, 'faqAdd'])->name('addfaqs.store');

Route::get('/admin_view_faqs',[App\Http\Controllers\Controller::class, 'adminViewFaqs'])->name('admin-view-faqs');
}); 










