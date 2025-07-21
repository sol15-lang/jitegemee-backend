<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException as ValidationException;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|integer|exists:roles,id'
        ]);
        $validated['password'] = Hash::make($validated['password']);

        try {
            $user = User::create($validated);
            $token = $user->createToken('auth-token')->plainTextToken;

            return response()->json([
                'message' => 'Registration Successful!',
                'user' => $user->load('role'),
                'token' => $token,
                'abilities' => $user->abilities()
            ], 201);
        } catch (\Exception $exception) {
            return response()->json([
                "Error" => "Registration failed",
                $exception
            ], 500);
        }
    }
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required'
        ]);

        try {
            $user = User::where('email', $validated['email'])->first();
            if (!$user || !Hash::check($validated['password'], $user->password)) {
                throw ValidationException::withMessages([
                    'email' => ['The Provided Credentiald are Incorrect'],
                ]);
            }

            $token = $user->createToken('auth-token')->plainTextToken;

            return response()->json([
                'message' => 'Login Successful!',
                'user' => $user,
                'token' => $token
            ], 201);
        } catch (\Exception $exception) {
            return response()->json([
                "Error" => "Invalid Credentials!",
                $exception
            ], 500);
        }
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Log Out successful'
        ]);
    }
}
