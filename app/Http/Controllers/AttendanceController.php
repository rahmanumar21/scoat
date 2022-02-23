<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use Auth;
use DataTables;
use App\Exports\AttendancesExport;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends Controller
{


    public function index(Request $request)
    {


// SELECT * FROM attendances a
// JOIN users b ON a.student_id = b.id
// JOIN courses c ON a.course_id = c.id
// JOIN student_locations d ON a.location_id = d.id
        $attendances = Attendance::latest('attendances.updated_at')
                            ->join('users', 'attendances.student_id', '=', 'users.id')
                            ->join('courses', 'attendances.course_id', '=', 'courses.id')
                            ->join('student_locations', 'attendances.location_id', '=', 'student_locations.id')
                            ->select('*')
                            ->get();


        if($request->ajax()) {
            $attendancesAllData = DataTables::of($attendances)

            ->addColumn('updated_at', function($row) {
                return $row->updated_at->format('F j, Y, g:i a');
            })

            ->addIndexColumn()
            ->addColumn('action', function ($row){
                
                $button = '<a href="http://maps.apple.com/maps?q='.$row->latitude.', '.$row->longtitude.'" data-original-title="Map" class="btn btn-icon btn-default btn-sm" target="_blank">
                <span class="btn-inner--icon"><i class="fas fa-map"></i></span>
                <span class="btn-inner--text">Map </span></a>';

                $button = '<a href="mailto: '.$row->email.'" data-original-title="Map" class="btn btn-icon btn-default btn-sm" target="_blank">
                <span class="btn-inner--icon"><i class="fa fa-envelope"></i></span>
                <span class="btn-inner--text">Message </span></a>';

                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
            return $attendancesAllData;
        }
        return view('attendances/att_list', compact('attendances'));


    }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $attendance = Attendance::find($id);
            return response()->json($attendance);
        }

    public function attendances_api(Request $request)
    {
        $result = Attendance::create([
            'student_id'=>$request->student_id,
            'course_id'=>$request->course_id,
            'location_id'=>$request->location_id,
        ]);
        return $result;
    }

    // public function export(){
    //     return Excel::download(new AttendancesExport, 'attendances.xlsx');
    // }

        
}