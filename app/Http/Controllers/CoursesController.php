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

    public function fetchCourse($id){
        try{
            $courses= Courses ::findOrFail($id);
            return response()->json($courses);
        }
        catch(\Exception $error) {
            return response()->json([
            "Error" =>"Failed to fetch course.",
            $error
            ], 500);
        }
    }
    public function saveCourse(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'school_id' => 'required|string',
            'description' => 'required|string',
            'intake'=> 'required|string',
        ]);

        try {
            $course = new Courses();
            $course->name = $request->name;
            $course->_id = $request->course_id;
            $course->description = $request->description;
            $course->intake = $request->intake;
            $course->save();
            return response()->json($course);
        } 
        catch (\Exception $error) {
            return response()->json([
                "Failed" => "Failed to create a course.",
                $error
            ], 403);
        }
    }
    public function updateCourse($id, Request $request) {
        $request->validate([
            'name' => 'required|string',
            'school_id' => 'required|string',
            'description' => 'required|string',
            'intake'=> 'required|string',
        ]);

        try{
            $course= Courses::findOrFail($id);
            $course->name = $request->name;
            $course->school_id = $request->school_id;
            $course->description = $request->description;
            $course->intake = $request->intake;
            $course->update();
            return response()->json($course);
        }
        catch(\Exception $error) {
            return response()->json([
            "Error" =>"Failed to update course.",
            $error
            ], 403);
        }

    }
}
