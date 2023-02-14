<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ActionController;
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


//-----------------------------------------------------
//Guest Controller
//-----------------------------------------------------
Route::get('/', function () {
    return view('login');
});
Route::post('/guest/doregister',[ActionController::class, 'doguestRegister']);
Route::get('/guest/register', [ViewController::class , 'GuestRegister']);
Route::post('/dologin', [ActionController::class, 'dologin']);

Route::group(['middleware' => 'auth'], function(){
//------------------------------------------------------
// view controller
//------------------------------------------------------
Route::get('/home', [ViewController::class, 'dohome']);
Route::get('/register_member', [ViewController::class, 'UserRegister']);
Route::get('/User_Active',[ViewController::class, 'UserActive']);
Route::get('/Student_details', [ViewController::class, 'UserDetails']);
Route::get('/Courses_add', [ViewController::class,'CourseAdd']);
Route::get('/Courses_Registration_Member',[ViewController::class, 'CourseRegister']);
Route::get('/Courses_view',[ViewController::class, 'CourseView']);

//-----------------------------------------------------
//Action Controller
//-----------------------------------------------------
Route::post('Register/users',[ActionController::class, 'doguestRegister']);
Route::get('/logout',[ActionController::class, 'DoLogout'] );
Route::post('/course/insert',[ActionController::class, 'Course_Add']);
Route::post('/course_registration', [ActionController::class, 'CourseRegister']);
Route::post('/delete_user/{id}',[ActionController::class, 'UserDelete']);
//-----------------------------------------------------
//Ajax Controller
//-----------------------------------------------------
Route::post('/actionselect/{id}/{action}', [AjaxController::class, 'UserActive']);
});
//-------------------------------------------------------
//dashboard
//-------------------------------------------------------
// Route::get('/home', function () {
//     return view('home');
// })->middleware(['auth', 'user'])->name('admin_dashboard');


