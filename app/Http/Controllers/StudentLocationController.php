<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentLocation;
use App\Models\User;
use Auth;
use App\Http\Resources\Locations as LocationsResource;

class StudentLocationController extends BaseController
{
    
    public function index(Request $request)
    {

        $request->validate([
            'student_id'=>'required',
            'latitude'=>'required',
            'longtitude'=>'required',
            'addressline'=>'required',
        ]);
        
        $result = StudentLocation::create([
            'student_id'=>$request->student_id,
            'latitude'=>$request->latitude,
            'longtitude'=>$request->longtitude,
            'addressline'=>$request->addressline,
        ]);
        return $result;
    }

    public function show(Request $request)
    {

        $locations = StudentLocation::all();
        return $this->sendResponse(LocationsResource::collection($locations), 'Posts fetched.');

    }
 
}
