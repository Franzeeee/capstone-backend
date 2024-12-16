<?php

use App\Http\Controllers\ActivateLogicLessonController;
use App\Http\Controllers\AiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompilerController;
use App\Http\Controllers\CourseClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\StudentProgressController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\ActivityFileController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\SubmissionFileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\BadgeController;
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
Route::post('login', [AuthController::class, 'login'])->name('login')->middleware('throttle:login');

Route::middleware('auth:sanctum')->group(function () {

    Route::get('user', [AuthController::class, 'user']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('authUser', [AuthController::class, 'checkAuth']);

    Route::post('/upload/profile-picture', [ProfileController::class, 'uploadProfilePicture']);
    Route::get('/profile/picture/fetch', [ProfileController::class, 'fetchProfilePicture']);
    Route::post('/update/basic-info', [ProfileController::class, 'updateBasicInfo']);
    Route::post('/update/contact-info', [ProfileController::class, 'updateContactInfo']);
    Route::post('/update/password', [ProfileController::class, 'updatePassword']);

    Route::post('receiveMessage', [AiController::class, 'index'])->name('ai.index');
    Route::get('generateAssessment', [AiController::class, 'generateAssessment'])->name('ai.generateAssessment');
    Route::post('submission/autocheck', [AiController::class, 'activityAutoCheck'])->name('ai.activityAutoCheck');

    Route::get('fetchCompilerToken', [CompilerController::class, 'getToken'])->name('compiler.getToken');

    Route::post('class/create', [CourseClassController::class, 'createClass'])->name('class.create');
    Route::delete('class/{classId}/delete', [CourseClassController::class, 'deleteClass'])->name('class.delete');

    Route::get('classes', [CourseClassController::class, 'index']);
    Route::get('class/all', [CourseClassController::class, 'allClasses']);
    Route::post('class/update', [CourseClassController::class, 'update'])->name('class.update');
    Route::post('class/join', [CourseClassController::class, 'joinClass'])->name('class.join');
    Route::get('class/{code}', [CourseClassController::class, 'fetchClassInfo'])->name('class.fetchClassInfo');
    Route::get('class/{id}/students', [CourseClassController::class, 'fetchClassStudents'])->name('class.fetchClassStudents');
    Route::get('student/{id}/classes', [StudentController::class, 'fetchStudentClasses'])->name('student.fetchStudentClasses');
    Route::post('/student/remove', [CourseClassController::class, 'removeStudent'])->name('class.removeStudent');
    Route::post('/class/update-grade-distribution', [CourseClassController::class, 'updateGradeDistribution'])->name('class.updateGradeDistribution');

    Route::post('activity/create', [ActivitiesController::class, 'store'])->name('activities.store');
    Route::get('activity/{id}/all', [ActivitiesController::class, 'getClassActivities'])->name('activities.getClassActivities');
    Route::get('activity/{id}/delete', [ActivitiesController::class, 'deleteActivity'])->name('activities.delete');
    Route::put('activity/{id}/update', [ActivitiesController::class, 'updateActivity'])->name('activities.update');

    Route::get('/activities/{id}/basic', [ActivitiesController::class, 'getCodingActivity'])->name('activities.getCodingActivity');
    Route::get('/activities/{id}/coding', [ActivitiesController::class, 'fetchActivityWithoutProblems'])->name('activities.fetchActivityWithoutProblems');
    Route::get('/activity/{id}/auth', [ActivitiesController::class, 'checkActivityAuth'])->name('activities.checkActivityAuth');
    Route::get('/activity/default/{classId}', [ActivitiesController::class, 'fetchDefaultActivities'])->name('activities.fetchDefaultActivities');
    Route::get('activity/{classId}/fetch', [ActivitiesController::class, 'fetchGetPaginatedActivities'])->name('activities.fetchGetPaginatedActivities');

    Route::post('submission/create', [SubmissionController::class, 'store']);
    Route::get('/submission/{activityId}/{userId}', [SubmissionController::class, 'fetchSubmission']);
    Route::get('/submission/all', [SubmissionController::class, 'all']);
    Route::get('{id}/submissions/all', [SubmissionController::class, 'fetchAllActivitySubmission']);
    Route::delete('activity/submission/{id}/delete', [SubmissionController::class, 'deleteSubmission']);

    Route::post('submission/update', [SubmissionController::class, 'updateCodingSubmission']);

    Route::post('announcement', [AnnouncementController::class, 'store'])->name('announcements.store');
    Route::get('announcement/fetch', [AnnouncementController::class, 'fetchAllAnnouncements'])->name('announcements.fetchAllAnnouncements');
    Route::get('announcement/delete/{id}', [AnnouncementController::class, 'deleteAnnouncement'])->name('announcements.delete');


    Route::get('student/{classId}/progress', [StudentProgressController::class, 'index']);

    Route::post('activity/logic/{activityId}/submit', [SubmissionFileController::class, 'store']);
    Route::get('activity/logic/{activityId}/check', [SubmissionFileController::class, 'checkSubmission']);
    Route::delete('activity/logic/{fileId}/delete', [SubmissionFileController::class, 'unSubmitFile']);
    Route::post('activity/logic/{submissionId}/resubmit', [SubmissionFileController::class, 'updateSubmissionFiles']);

    Route::get('activity/{activitId}/rankings', [SubmissionController::class, 'fetchSubmissionRanking']);

    Route::post('activity/logic/upload', [ActivitiesController::class, 'createLogicActivity'])->name('activities.createLogicActivity');
    Route::get('activity/logic/{activityId}/files', [ActivityFileController::class, 'fetchFiles']);

    Route::post('/submission/logic/grade', [SubmissionController::class, 'gradeLogicSubmission']);

    Route::get('grades/{classId}/fetch', [GradeController::class, 'fetchAllStudentGrade'])->name('grades.fetchAllStudentGrade');
    Route::get('/grades/{classId}/student/{studentId}/scores', [ActivitiesController::class, 'fetchAllActivityWithStudentSubmission']);
    Route::post('/grades/{gradeId}/update', [GradeController::class, 'updateGrade'])->name('grades.updateGrade');
    Route::get('/grades/{classId}/print', [GradeController::class, 'printAllStudentGrade'])->name('grades.printAllStudentGrade');

    Route::post('/assessment/coding/generate', [AiController::class, 'generateCodingProblem'])->name('ai.generateCodingProblem');

    Route::post('/events/create', [ScheduleController::class, 'createEvent']);
    Route::get('/events/fetch', [ScheduleController::class, 'fetchEvents']);
    Route::delete('/events/{id}/delete', [ScheduleController::class, 'deleteEvent']);

    // Get class id by code
    Route::get('/code/{code}/id', [CourseClassController::class, 'fetchClassId']);

    Route::get('/teacher/class/all', [CourseClassController::class, 'fetchTeacherClasses']);
    Route::get('/classes/{studentId}/fetch', [CourseClassController::class, 'fetchUserClasses']);
    Route::get('/class/{classId}/student/average', [CourseClassController::class, 'fetchAvgStudentScores']);
    Route::get('/class/{teacherId}/score/average', [CourseClassController::class, 'fetchClassAverages']);

    Route::get('class/{id}/activate-logic', [ActivateLogicLessonController::class, 'update'])->name('activateLogicLesson.update');
    Route::get('class/{id}/deactivate-logic', [ActivateLogicLessonController::class, 'deactivate'])->name('activateLogicLesson.deactivate');
    Route::get('class/{id}/logic-status', [ActivateLogicLessonController::class, 'status'])->name('activateLogicLesson.status');

    Route::post('/class/certificate/issue', [CertificateController::class, 'issueCertificate']);
    Route::get('/class/certificate/status/{classId}', [CertificateController::class, 'checkStatus']);

    Route::post('/notification/create', [NotificationController::class, 'createNotification']);
    Route::get('/notification/{id}/fetch', [NotificationController::class, 'fetchNotifications']);
    Route::get('/notification/{id}/mark-as-read', [NotificationController::class, 'markAsRead']);
    Route::get('/notification/{id}/delete', [NotificationController::class, 'deleteNotification']);
    Route::get('/notification/{id}/deleteAll', [NotificationController::class, 'deleteAllNotifications']);

    Route::get('/badge/{activityId}/issue', [BadgeController::class, 'issueBadge']);
    Route::get('/{activityId}/badge/fetch', [BadgeController::class, 'fetchActivityBadge']);
    Route::get('/badge/{classId}/fetch', [BadgeController::class, 'fetchClassBadges']);
    Route::get('/{studentId}/{classId}/badge/fetch', [BadgeController::class, 'fetchStudentBadge']);
});


Route::get('/class/{classId}/gradesheet', [GradeController::class, 'fetchAllGrades']);


Route::get('/verify-email/{id}', [AuthController::class, 'verify'])->name('verification.verify');
