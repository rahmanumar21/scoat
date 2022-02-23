<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use DB;

class HomeController extends Controller
{
    
    public function index(){

        $role=Auth::user()->role;

        //Role
        if($role == 0){

            $attendance = DB::table('attendances')->count();
            $course = DB::table('courses')->count();
            $student = DB::table('users')->where('role', 1)->count();
            $lecturer = DB::table('users')->where('role', 0)->count();
            
            return view('lecturer.dashboard', compact('attendance','course', 'student', 'lecturer'));

        } else{
            return view('student.dashboard');
        }

    }   

}
