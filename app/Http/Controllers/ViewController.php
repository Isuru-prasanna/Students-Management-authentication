<?php

namespace App\Http\Controllers;

use App\Models\User;
use  App\Models\Course;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    //----------------------------------------------------------------
    // guest action
    //---------------------------------------------------------------
    public function GuestRegister(){
        return view('guestRegistration');
    }

    //---------------------------------------------------------------
    //User View
    //---------------------------------------------------------------
    public function dohome(){
        return view('home');
    }
    public function UserRegister(){
        return view('user_register');
    }
    public function UserActive(){
        $users = User::paginate();
        return view('user_active', compact('users'));
    }
    public function UserDetails(){
        $users =  User::paginate();
        return view('user_details', compact('users'));
    }
    public function CourseAdd(){
        return view('course_add');
    }
    public function CourseRegister(){
        return view('course_register');
    }
    public function CourseView(){
        $courses = Course::paginate();
        return view('course_view', compact('courses'));
    }

}
