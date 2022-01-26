<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index(){

        $role=Auth::user()->role;

        //Role
        if($role == 0){
            return view('lecturer.dashboard');
        } else{
            return view('student.dashboard');
        }
    }   

}
