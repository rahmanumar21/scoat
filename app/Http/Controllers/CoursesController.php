<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use App\Models\Course;
use App\Http\Resources\Courses as CoursesResource;
use DataTables;


class CoursesController extends BaseController
{
        //Attendance
        public function index()
        {
            $courses = Course::all();
            return $this->sendResponse(CoursesResource::collection($courses), 'Posts fetched.');
        }

        public function list(Request $request)
        {
            $courses = Course::latest('updated_at')->get();
            if($request->ajax()) {
                $coursesAllData = DataTables::of($courses)
                ->addIndexColumn()
                ->addColumn('action', function ($row){
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.
                    $row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editCourse">Edit</a>';
                    
                    $button.= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.
                    $row->id.'" data-original-title="Delete" class="edit btn btn-danger btn-sm deleteCourse">Delete</a>';
    
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
                return $coursesAllData;
            }
            return view('courses/list', compact('courses'));
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

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            Course::find($id)->delete();
            return response()->json(['success'=>'Course Deleted Successfully']);
        }
        
}
