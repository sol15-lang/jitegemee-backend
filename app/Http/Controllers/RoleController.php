<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //Save Role Function
    public function saveRole(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string|max:1000'
        ]);

        try {
            $role = new Role();
            $role->name = $request->name;
            $role->description = $request->description;
            $role->save();
            return response()->json($role);
        } catch (\Exception $error) {
            return response()->json([
                "Failed" => "Failed to create a role.",
                $error
            ], 403);
        }
    }

    //Fetch All Roles function
    public function fetchRoles() {
        try{
            $roles= Role::all();
            return response()->json($roles);
        }
        catch(\Exception $error) {
            return response()->json([
            "Error" =>"Failed to fetch roles.",
            $error
            ], 403);
        }
    }

    //Fetch a specific Role functiom
    public function fetchRole($id) {
        try{
            $role= Role::findOrFail($id);
            return response()->json($role);
        }
        catch(\Exception $error) {
            return response()->json([
            "Error" =>"Failed to fetch role.",
            $error
            ], 403);
        }

    }

    //Update Role function
    public function updateRole($id, Request $request) {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string|max:1000'
        ]);

        try{
            $role= Role::findOrFail($id);
            $role->name - $request->name;
            $role->description = $request->description;
            $role->update();
            return response()->json($role);
        }
        catch(\Exception $error) {
            return response()->json([
            "Error" =>"Failed to update role.",
            $error
            ], 403);
        }

    }

    //Delete Role function
    public function deleteRole($id) {
        try{
            $role= Role::findOrFail($id);
            $role->delete();
            return response()->json($role);
        }
        catch(\Exception $error) {
            return response()->json([
            "Error" =>"Failed to fetch role.",
            $error
            ], 403);
        }
    }
}
