<?php

use App\Http\Controllers\AiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompilerController;
use App\Http\Controllers\CourseClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\StudentProgressController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\ActivityFileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\SubmissionFileController;
use Illuminate\Support\Facades\Route;


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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [AuthController::class, 'user']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('authUser', [AuthController::class, 'checkAuth']);

    Route::post('/upload/profile-picture', [ProfileController::class, 'uploadProfilePicture']);
    Route::get('/profile/picture/fetch', [ProfileController::class, 'fetchProfilePicture']);
    Route::post('/update/basic-info', [ProfileController::class, 'updateBasicInfo']);
    Route::post('/update/contact-info', [ProfileController::class, 'updateContactInfo']);
    Route::post('/update/password', [ProfileController::class, 'updatePassword']);

    Route::post('receiveMessage', [AiController::class, 'index']);
    Route::get('generateAssessment', [AiController::class, 'generateAssessment']);
    Route::post('submission/autocheck', [AiController::class, 'activityAutoCheck']);

    Route::get('fetchCompilerToken', [CompilerController::class, 'getToken']);

    Route::post('class/create', [CourseClassController::class, 'createClass']);
    Route::delete('class/{classId}/delete', [CourseClassController::class, 'deleteClass']);

    Route::get('classes', [CourseClassController::class, 'index']);
    Route::get('class/all', [CourseClassController::class, 'allClasses']);
    Route::post('class/join', [CourseClassController::class, 'joinClass']);
    Route::get('class/{code}', [CourseClassController::class, 'fetchClassInfo']);
    Route::get('class/{id}/students', [CourseClassController::class, 'fetchClassStudents']);
    Route::get('student/{id}/classes', [StudentController::class, 'fetchStudentClasses']);
    Route::post('/student/remove', [CourseClassController::class, 'removeStudent']);

    Route::post('activity/create', [ActivitiesController::class, 'store']);
    Route::get('activity/{id}/all', [ActivitiesController::class, 'getClassActivities']);
    Route::get('activity/{id}/delete', [ActivitiesController::class, 'deleteActivity']);
    Route::put('activity/{id}/update', [ActivitiesController::class, 'updateActivity']);

    Route::get('/activities/{id}/basic', [ActivitiesController::class, 'getCodingActivity']);
    Route::get('/activities/{id}/coding', [ActivitiesController::class, 'fetchActivityWithoutProblems']);
    Route::get('/activity/{id}/auth', [ActivitiesController::class, 'checkActivityAuth']);
    Route::get('/activity/default/{classId}', [ActivitiesController::class, 'fetchDefaultActivities']);
    Route::get('activity/{classId}/fetch', [ActivitiesController::class, 'fetchGetPaginatedActivities']);



    Route::post('submission/create', [SubmissionController::class, 'store']);
    Route::get('/submission/{activityId}/{userId}', [SubmissionController::class, 'fetchSubmission']);
    Route::get('/submission/all', [SubmissionController::class, 'all']);
    Route::get('{id}/submissions/all', [SubmissionController::class, 'fetchAllActivitySubmission']);
    Route::delete('activity/submission/{id}/delete', [SubmissionController::class, 'deleteSubmission']);


    Route::post('announcement', [AnnouncementController::class, 'store']);
    Route::get('announcement/fetch', [AnnouncementController::class, 'fetchAllAnnouncements']);
    Route::get('announcement/delete/{id}', [AnnouncementController::class, 'deleteAnnouncement']);


    Route::get('student/{classId}/progress', [StudentProgressController::class, 'index']);

    Route::post('activity/logic/{activityId}/submit', [SubmissionFileController::class, 'store']);
    Route::get('activity/logic/{activityId}/check', [SubmissionFileController::class, 'checkSubmission']);
    Route::delete('activity/logic/{fileId}/delete', [SubmissionFileController::class, 'unSubmitFile']);
    Route::post('activity/logic/{submissionId}/resubmit', [SubmissionFileController::class, 'updateSubmissionFiles']);

    Route::get('activity/{activitId}/rankings', [SubmissionController::class, 'fetchSubmissionRanking']);

    Route::post('activity/logic/upload', [ActivitiesController::class, 'createLogicActivity']);
    Route::get('activity/logic/{activityId}/files', [ActivityFileController::class, 'fetchFiles']);
});
