<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ActionController extends Controller
{
    //----------------------------------------------------
    //Guest Do Register
    //----------------------------------------------------
    public function doguestRegister(Request $request){

        try {
            $validator = Validator::make($request->all(), [
                'name'              => 'required',
                'nic'               => 'required',
                'city'              => 'required',
                'educationlevel'    => 'required',
                'email'             => 'required',
                'password'          => 'required',

            ]);
            
            //return response()->json($validator);
        
            if ($validator->fails()) {
                return redirect()->route('register_member');
            }
          
            DB::beginTransaction();
          
            $user = new User;
            $user->name = $request->name;
            $user->nic = $request->nic;
            $user->city = $request->city;
            $user->educationlevel = $request->educationlevel == 'other' ? $request->other : $request->educationlevel;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->action = 'Desapproved';
            $user->usertype = 'student';
            $user->save();
        
            DB::commit();
         
            return redirect()->back()->with('success','User created successfully!');
          
        } catch (\Throwable $e) {
            DB::rollback();
            //return response()->json($e->getMessage());
            return redirect()->back()->with('error', "Somthing went wrong. Please try again later");
        }

    }

    public function dologin(Request $request){
    
            $validator = Validator::make($request->all(),[
                'email' => 'required',
                'password' => 'required'
            ]);

            $userdata = array(
                'email'  => $request->email,
                'password' => $request->password
            );
            $user = $request->email;
            if(Auth::attempt($userdata)){
                $request->session()->regenerate();
                return view('home')->with('success','Welcome {{user}}');
            }
            return redirect()->back();
    }
        /*
    |--------------------------------------------------------------------------
    |private function get Users permissions
    |--------------------------------------------------------------------------
    */ 
    private function getUsersPermissions(){
        $data = User::with('Permission')->where('email',Auth::id())->get()->all();
        return $data;
    }

       /*
    |--------------------------------------------------------------------------
    |Public function / Logout
    |--------------------------------------------------------------------------
    */
    public function DoLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    //------------------------------------------------------------------------
    // User Action
    //------------------------------------------------------------------------
    public function user_register(Request $request){

    }

    //------------------------------------------------------------------------
    //Course Add
    //------------------------------------------------------------------------
    public function Course_Add(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'CourseName'        => 'required',
                'CourseCategory'    => 'required',
                'title'             => 'required',
                'Address'           => 'required',
                'Contacts'          => 'required',
                'InputFile'         => 'required|image',
                'summary'           => 'required'

            ]);
        
            if ($validator->fails()) {
                return redirect()->back()->with('success','User created successfully!');
            }else{
              
                $image = time().".".$request->InputFile->extension();
               
                
                DB::beginTransaction();
   
              
                $course = new Course;
                $course->name=$request->CourseName;
                $course->category=$request->CourseCategory;
                $course->title=$request->title;
                $course->address=$request->Address;
                $course->contacts=$request->Contacts;
                $course->image=$image;
                $course->summary=$request->summary;
                $course->save();

                DB::commit();
                //dd($request->title);
           
                $request->InputFile->move(public_path('course'),$image);
                return redirect()->back();
            }
        }catch (\Throwable $e){
            return response()->json($e->getMessage());
            dd('$validator');
            return redirect()->back()->with('error', "Somthing went wrong. Please try again later");
        }

    }
}
