<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;


class CoursesController extends Controller
{
    public function fetchCourses(){
        $courses = Courses::all();
        return response()->json($courses);
    }
}
