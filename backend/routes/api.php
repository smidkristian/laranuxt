<?php

use App\Http\Controllers\PermissionController;
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

// backend check if the user is verified through email
Route::middleware(['auth:sanctum', 'verified'])->get('website/dashboard', function () {
    return response()->json(['message' => 'email verified api middleware']);
});

// returns 423 first, only after the user confirms password the account is deleted
Route::middleware(['auth:sanctum', 'password.confirm'])->delete('/user', function (Request $request) {
    return $request->user()->delete();
});

// custom user registration
Route::post('/register', [UserController::class, 'create']);

// roles and permissions
Route::middleware('auth:sanctum')->post('/create-permission', [PermissionController::class, 'createPermission']);
Route::middleware('auth:sanctum')->post('/create-role', [PermissionController::class, 'createRole']);


