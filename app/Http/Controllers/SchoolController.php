<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends Controller
{
    //Save School Function
    public function saveSchool(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone'=> 'required|string',
        ]);

        try {
            $school = new School();
            $school->name = $request->name;
            $school->address = $request->address;
            $school->phone = $request->phone;
            $school->save();
            return response()->json($school);
        } catch (\Exception $error) {
            return response()->json([
                "Failed" => "Failed to create a school.",
                $error
            ], 403);
        }
    }

    //Fetch All Schools function
    public function fetchSchools() {
        try{
            $schools= School::all();
            return response()->json($schools);
        }
        catch(\Exception $error) {
            return response()->json([
            "Error" =>"Failed to fetch schools.",
            $error
            ], 403);
        }
    }

    //Fetch a specific School functiom
    public function fetchSchool($id) {
        try{
            $school= School::findOrFail($id);
            return response()->json($school);
        }
        catch(\Exception $error) {
            return response()->json([
            "Error" =>"Failed to fetch school.",
            $error
            ], 403);
        }

    }

    //Update School function
    public function updateSchool($id, Request $request) {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone'=> 'required|string',
        ]);

        try{
            $school= School::findOrFail($id);
            $school->name - $request->name;
            $school->description = $request->description;
            $school->update();
            return response()->json($school);
        }
        catch(\Exception $error) {
            return response()->json([
            "Error" =>"Failed to update school.",
            $error
            ], 403);
        }

    }

    //Delete School function
    public function deleteSchool($id) {
        try{
            $school= School::findOrFail($id);
            $school->delete();
            return response()->json($school);
        }
        catch(\Exception $error) {
            return response()->json([
            "Error" =>"Failed to fetch school.",
            $error
            ], 403);
        }
    }
}
