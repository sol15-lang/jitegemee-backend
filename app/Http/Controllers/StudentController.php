<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //Save Student function
    public function saveStudent(Request $request)
    {
        // $this->authorize('create', Student::class);
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'dob' => 'required|date',
            'location' => 'required|string',
            'school_id' => 'required|integer|exists:schools,id'
        ]);

        try {
            $student = new Student();
            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->dob = $request->dob;
            $student->location = $request->location;
            $student->school_id = $request->school_id;
            $student->save();
            return response()->json($student);
        } catch (\Exception $error) {
            return response()->json([
                "Error" => "Failed to create a student.",
                $error
            ], 500);
        }
    }

    //Fetch all Students function
    public function fetchStudents()
    {
        // $this->authorize('viewAny', Student::class);
        try {
            $students = Student::join('schools','students.school_id', '=', 'schools.id')
                         ->select('schools.*','schools.name as school_name')
                         ->get();

            return response()->json($students);
        } catch (\Exception $error) {
            return response()->json([
                "Error" => "Failed to fetch students.",
                $error
            ], 500);
        }
    }

    //Fetch a specific Student function
    public function fetchStudent($id)
    {
        try {
            $student = Student::findOrFail($id);
            return response()->json($student);
        } catch (\Exception $error) {
            return response()->json([
                "Error" => "Failed to fetch student.",
                $error
            ], 500);
        }
    }

    //Update Student function
    public function updateStudent($id, Request $request)
    {

        $student = Student::findOrFail($id);
        // $this->authorize('update', $student);

        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'dob' => 'required|date',
            'location' => 'required|string',
            'school_id' => 'required|integer|exists:schools,id'
        ]);

        try {
            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->dob = $request->dob;
            $student->location = $request->location;
            $student->school_id = $request->school_id;
            $student->update();
            return response()->json($student);
        } catch (\Exception $error) {
            return response()->json([
                "Error" => "Failed to update student.",
                $error
            ], 500);
        }
    }

    //Delete Student function
    public function deleteStudent($id)
    {
        // $this->authorize('delete', Student::class);
        try {
            $student = Student::findOrFail($id);
            $student->delete();
            return response()->json("Student Deleted Successfully");
        } catch (\Exception $error) {
            return response()->json([
                "Error" => "Failed to Delete student.",
                $error
            ], 500);
        }
    }
}

