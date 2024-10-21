<?php

use App\Http\Controllers\AiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompilerController;
use App\Http\Controllers\CourseClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\StudentProgressController;
use App\Http\Controllers\ActivitiesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Contracts\Service\Attribute\Required;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('receiveMessage', [AiController::class, 'index']);
Route::get('generateAssessment', [AiController::class, 'generateAssessment']);
Route::get('fetchCompilerToken', [CompilerController::class, 'getToken']);

Route::post('class/create', [CourseClassController::class, 'createClass']);
Route::get('classes', [CourseClassController::class, 'index']);
Route::post('class/join', [CourseClassController::class, 'joinClass']);
Route::get('class/{code}', [CourseClassController::class, 'fetchClassInfo']);
Route::get('class/{id}/students', [CourseClassController::class, 'fetchClassStudents']);
Route::get('student/{id}/classes', [StudentController::class, 'fetchStudentClasses']);

Route::post('activity/create', [ActivitiesController::class, 'store']);
Route::get('activity/{id}/all', [ActivitiesController::class, 'getClassActivities']);

Route::get('/activities/{id}/basic', [ActivitiesController::class, 'getCodingActivity']);
Route::get('/activities/{id}/coding', [ActivitiesController::class, 'fetchActivityWithoutProblems']);


Route::post('announcement', [AnnouncementController::class, 'store']);
Route::get('announcement/fetch', [AnnouncementController::class, 'fetchAllAnnouncements']);


Route::get('student/progress', [StudentProgressController::class, 'index']);


Route::post('/upload/profile-picture', function (Request $request) {
    // Validate the incoming request
    $request->validate([
        'profile_picture' => 'required|image|max:2048', // Max size: 2MB
    ]);

    // Store the uploaded profile picture in the 'profile_pictures' folder
    $path = $request->file('profile_picture')->store('profile_pictures', 'public');

    return response()->json(['path' => $path], 201); // Return the file path
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [AuthController::class, 'user']);
    Route::post('logout', [AuthController::class, 'logout']);
    // API Route for OpenAI model
    Route::get('authUser', function (Request $request) {
        // Check if the user is authenticated
        if ($request->user()) {
            return response()->json(true);  // User is authenticated
        }

        return response()->json(false);  // User is not authenticated
    });
});
