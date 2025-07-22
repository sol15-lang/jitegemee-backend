<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Events::all();
        return response()->json($events);
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
            'name' => 'required|string',
            'image' => 'required||string',
            'date' => 'required|string',
            'location' => 'required|string',
            'category' => 'required|string',
        ]);

        try {
            $event = new Events();
            $event->name = $request->name;
            $event->image = $request->image;
            $event->date = $request->date;
            $event->location = $request->location;
            $event->category = $request->category;
            $event->save();
            return response()->json($event);
        } catch (\Exception $error) {
            return response()->json([
                "Failed" => "Failed to create a event.",
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
            $events = Events::findOrFail($id);
            return response()->json($events);
        } catch (\Exception $error) {
            return response()->json([
                "Error" => "Failed to fetch event.",
                $error
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Events $events)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Events $events)
    {
        {
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|string',
            'date' => 'required|string',
            'location' => 'required|string',
            'category' => 'required|string',
        ]);

        try {
            $event = Events::findOrFail($events);
            $event->name = $request->name;
            $event->image = $request->image;
            $event->date = $request->date;
            $event->location = $request->location;
            $event->category = $request->category;
            $event->update();
            return response()->json($event);
        } catch (\Exception $error) {
            return response()->json([
                "Failed" => "Failed to create a event.",
                $error
            ], 403);
        }
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Events $events)
    {
        //
    }
}
