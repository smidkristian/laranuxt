<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function verify(EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect(config('app.client'));
    }

    public function resend (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return response()->json(['message' => 'Verification link sent!'], 200);
    }
}
