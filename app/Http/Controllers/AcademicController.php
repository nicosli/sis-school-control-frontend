<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Util;
use GuzzleHttp\Client as HttpClient;
use Guzzle\Http\Exception\ClientErrorResponseException;

class AcademicController extends Controller
{
    public function schoolyear()
    {
        return view('academic.schoolyear');
    }
    public function grades(){
        return view('academic.grades');
    }
    public function groups(){
        return view('academic.groups');
    }
    public function classrooms(){
        return view('academic.classrooms');
    }
    public function assignments(){
        return view('academic.assignments');
    }
    public function school(){
        return view('academic.school');
    }
    public function authorizations(){
        return view('academic.authorizations');
    }
}
