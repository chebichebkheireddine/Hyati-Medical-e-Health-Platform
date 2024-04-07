<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    // Doctor session controller
    public function index()
    {
        return view('auth.doctor.doctor_login');
    }
}
