<?php

use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\TestLogoutController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [TestLogoutController::class, 'test']);

// there is an issue with ", 'signed'" middlevare while running the app in containers, so the emailVerification
// function in config/fortify is turned off and needed routes for those functions here, not ideal
// UPDATE: it actually works even with signed middleware now, I guess it was because of the docker network, both api
// and client have to be on the same network, which could be a problem tho, idk yet
Route::middleware(['auth:sanctum', 'throttle:6,1'])
    ->get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
->name('verification.verify');

Route::middleware(['auth:sanctum', 'throttle:6,1'])
    ->post('/email/verification-notification', [EmailVerificationController::class, 'resend'])
->name('verification.send');
