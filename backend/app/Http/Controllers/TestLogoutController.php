<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestLogoutController extends Controller
{
    public function test()
    {
        dd(config('app.client'));
    }
}
