<?php

use App\Http\Controllers\UserController;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return response()->json(['message' => 'email verified api middleware']);
});

Route::middleware(['auth:sanctum', 'password.confirm'])->delete('/user', function (Request $request) {
    return $request->user()->delete();
});

Route::post('/register', [UserController::class, 'create']);


