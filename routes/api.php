<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\LibraryController;

use Illuminate\Support\Facades\Route;

//Public Routes
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('getAllRoles', [RoleController::class, 'fetchRoles']);
Route::get('getAllEvents', [EventsController::class, 'index']);
Route::get('getAllCourses', [CoursesController::class, 'fetchCourses']);
Route::get('getAllLibraries', [LibraryController::class, 'index']);
Route::get('getAllSchools', [SchoolController::class, 'fetchSchools']);
Route::get('getAllStudents', [StudentController::class, 'fetchStudents']);

//Protected Routes

Route::middleware("auth;sanctum")->group(function (): void {

  Route::post('logout', [AuthController::class, 'logout']);

  Route::post('createRole', [RoleController::class, 'saveRole']);
  Route::get('getRole/{id}', [RoleController::class, 'fetchRole']);
  Route::put('updateRole/{id}', [RoleController::class, 'updateRole']);
  Route::post('deleteRole/{id}', [RoleController::class, 'deleteRole']);


  Route::post('createSchool', [SchoolController::class, 'saveSchool']);
  Route::get('getSchool/{id}', [SchoolController::class, 'fetchSchool']);
  Route::put('updateSchool/{id}', [SchoolController::class, 'updateSchool']);
  Route::post('deleteSchool/{id}', [SchoolController::class, 'deleteSchool']);


  Route::post('createStudent', [StudentController::class, 'saveStudent']);
  Route::get('getStudent/{id}', [StudentController::class, 'fetchStudent']);
  Route::put('updateStudent/{id}', [StudentController::class, 'updateStudent']);
  Route::delete('deleteStudent/{id}', [StudentController::class, 'deleteStudent']);
});
