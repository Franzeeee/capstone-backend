<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AiController;
use App\Mail\DueActivityReminderMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AiController::class, 'getToken']);

Route::get('/send-mail', function () {
    Mail::to('user01@gmail.com')->queue(new DueActivityReminderMail('user01@gmail.com'));
    return 'Success: Email queued.';
});

Route::get(`/test-send/{email}`, function ($email) {
    Mail::to($email)->send(new TestMail($email));
    return 'Success: Email queued.';
});
