<?php

namespace App\Http\Controllers;

use App\Models\Library;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $library = Library::all();
        return response()->json($library);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'image' => 'required||string',
            'description' => 'required|string',
            
        ]);

        try {
            $library = new Library();
            $library->title = $request->title;
            $library->image = $request->image;
            $library->description = $request->description;
            $library->save();
            return response()->json($library);
        } catch (\Exception $error) {
            return response()->json([
                "Failed" => "Failed to create a library.",
                $error
            ], 403);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $library = Library::findOrFail($id);
            return response()->json($library);
        } catch (\Exception $error) {
            return response()->json([
                "Error" => "Failed to fetch library.",
                $error
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Library $library)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Library $library)
    {
        {
        $request->validate([
            'title' => 'required|string',
            'image' => 'required|string',
            'description' => 'required|string',
        ]);

        try {
            $library = Library::findOrFail($library);
            $library->name = $request->name;
            $library->image = $request->image;
            $library->description = $request->description;
            $library->update();
            return response()->json($library);
        } catch (\Exception $error) {
            return response()->json([
                "Failed" => "Failed to create a library.",
                $error
            ], 403);
        }
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Library $library)
    {
        //
    }
}
