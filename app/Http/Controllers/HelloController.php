<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HelloController extends Controller
{
    public function index ()
    {
        $user = Auth::user();
        Log::debug("Hello Log");
        return view('hello/index');
    }
}
