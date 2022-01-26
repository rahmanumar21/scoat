<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use App\Models\StudentLocation;
use Auth;

class StudentController extends Controller
{


    // public function index(Request $request)
    // {


    // //    $request = User::select(['users.name', 'courses.course as course_name'])
    // //    ->join('attendances', 'attendances.student_id', '=', 'users.id')
    // //    ->join('courses', 'attendances.course_id', '=', 'courses.id')
    // //    ->get();

    // //    $request = User::join('attendances', 'attendances.student_id', '=', 'users.id')               
    // //    ->join('courses', 'attendances.course_id', '=', 'courses.id')               
    // //    ->get(['users.*', 'courses.course']);
        
    //     return User::where('id', 1)->get(['name']);
    // }

     //User Index
     public function index(Request $request)
     {
         return $request->user();
     }
 
     //Register
     public function register(Request $request)
     {
         $request->validate([
             'name'=>'required',
             'email'=>'required|email|unique:users',
             'password'=>'required|confirmed',
         ]);
 
         $result = User::create([
             'name'=>$request->name,
             'email'=>$request->email,
             'password'=>bcrypt($request->password),
             'role'=>$request->role,
         ]);
         return $result;
     }

     
    //Attendance
    public function attendance(Request $request)
    {
        $request->validate([
            'lecturer_name'=>'required',
            'student_name'=>'required',
            'course'=>'required',
            'course_url_link'=>'required',
            'latitude'=>'required',
            'longtitude'=>'required',
            'addressline'=>'required',
            'time_start'=>'required',
            'time_end'=>'required',
        ]);

        $result = Attendance::create([
            'lecturer_name'=>$request->lecturer_name,
            'student_name'=>$request->student_name,
            'course'=>$request->course,
            'course_url_link'=>$request->course_url_link,
            'latitude'=>$request->latitude,
            'longtitude'=>$request->longtitude,
            'addressline'=>$request->addressline,
            'time_start'=>$request->time_start,
            'time_end'=>$request->time_end,
        ]);
        return $result;
    }


 
     //Login
     public function login(Request $request)
     {
         $credentials = $request->validate([
             'email'=>'required|email',
             'password'=>'required'
         ]);
 
         if( Auth::attempt($credentials) ){
             $user = Auth::user();
             $token = md5( time() ).'.'.md5($request->email);
             $user->forceFill([
                 'api_token'=>$token,
             ])->save();
             return response()->json([
                 'token'=>$token
             ]);
         }
         return response()->json([
             'message'=>'The provided credentials do not match our records.'
         ],401);
     }
 
     //Logout
     public function logout(Request $request)
     {
         $request->user()->forceFill([
             'api_token'=>null,
         ])->save();
 
         return response()->json(['message' => 'success']);
     }

}
