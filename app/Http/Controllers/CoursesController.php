<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use App\Models\Course;
use App\Http\Resources\Courses as CoursesResource;

class CoursesController extends BaseController
{
           //Attendance
           public function index()
           {
       
               $courses = Course::all();
               return $this->sendResponse(CoursesResource::collection($courses), 'Posts fetched.');

           }
        
}
