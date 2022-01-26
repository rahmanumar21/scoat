<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use Auth;

class AttendanceController extends Controller
{

    public function index(Request $request)
    {

        $result = Attendance::create([
            'student_id'=>$request->student_id,
            'course_id'=>$request->course_id,
            'location_id'=>$request->location_id,
        ]);
        return $result;

    }
 
        
}
