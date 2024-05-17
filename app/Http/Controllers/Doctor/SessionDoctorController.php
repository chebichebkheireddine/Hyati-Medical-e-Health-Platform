<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SessionDoctorController extends Controller
{
    // Doctor session controller
    public function index()
    {
        return view('auth.doctor.doctor_login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:doctors,email',
            'password' => 'required|min:6|max:80'
        ]);

        if (auth('doctor')->attempt($credentials)) {
            return redirect("/hethecare/doctor");
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }
}
