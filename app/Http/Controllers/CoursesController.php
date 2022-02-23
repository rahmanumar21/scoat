<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use App\Models\Course;
use App\Http\Resources\Courses as CoursesResource;
use App\Models\Attendance;
use DataTables;


class CoursesController extends BaseController
{
      
        public function index(Request $request)
        {
      
            $courses = Course::latest('updated_at')->get();
            if($request->ajax()) {
                $coursesAllData = DataTables::of($courses)

                ->addColumn('course_name', function($row) {

                    $course_name = '<a href="/attendances/att_spec_list/'.$row->id.'" id="show-user" data-id="{{ $row->id }}"><b>'.$row->course.'</b></a>';

                    return $course_name;
                })

            
                ->addColumn('course_time', function($row) {

                    //Time Start 
                    $time_start = $row->time_start;
                    $get_time_start = explode( "T", $time_start );

                    //Time End 
                    $time_end = $row->time_end;
                    $get_time_end = explode( "T", $time_end );


                    $course_time = $get_time_start[1].' to '.$get_time_end[1];

                    return $course_time;
                })

                ->addColumn('updated_at', function($row) {
                    return $row->updated_at->diffForHumans();
                })

                ->addIndexColumn()
                ->addColumn('action', function ($row){


                    $button = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.
                    $row->id.'" data-original-title="Edit" class="btn btn-icon btn-primary btn-sm editCourse">
                    <span class="btn-inner--icon"><i class="fa fa-edit"></i></span>
                    <span class="btn-inner--text"> Edit </span></a>';
                    
                    $button.= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.
                    $row->id.'" data-original-title="Delete" class="btn btn-icon btn-primary btn-danger btn-sm deleteCourse"><span class="btn-inner--icon"><i class="fa fa-edit"></i></span>
                    <span class="btn-inner--text"> Delete </span></a>';
    
                    return $button;
                })
                ->rawColumns(['action', 'course_name'])
                ->make(true);
                return $coursesAllData;
            }
            return view('courses/list', compact('courses'));


            // API 
            $coursesAPI = Course::all();
            return $this->sendResponse(CoursesResource::collection($coursesAPI), 'Posts fetched.');

        }
            

            public function courses_api()
            {
    
                $coursesAPI = Course::all();
                return $this->sendResponse(CoursesResource::collection($coursesAPI), 'Posts fetched.');
    
            }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */

        public function store(Request $request)
        {
            
            Course::updateOrCreate(
                ['id'=>$request->course_id],
                [
                    'lecturer_id' => $request->lecturer_id,
                    'course' => $request->course,
                    'course_url_link' => $request->course_url_link,
                    'time_start' => $request->time_start,
                    'time_end' => $request->time_end
                ]
                );
                return response()->json(['success'=>'Course Added Successfully']);
        }


        public function show(Request $request, $id)
        {   
            $user = Attendance::latest('attendances.updated_at')
            ->join('users', 'attendances.student_id', '=', 'users.id')
            ->join('courses', 'attendances.course_id', '=', 'courses.id')
            ->join('student_locations', 'attendances.location_id', '=', 'student_locations.id')
            ->select('users.name', 'student_locations.addressline', 'attendances.updated_at', 'users.updated_at')
            ->where('courses.id', $id)
            ->get();

        
            return view("attendances/att_spec_list", ["data" => $user]);
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $courses = Course::find($id);
            return response()->json($courses);
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            Course::find($id)->delete();
            return response()->json(['success'=>'Country Deleted Successfully']);
        }


        
}