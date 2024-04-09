<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //test
    public function test()
    {
        return view("admin.index", [
            "specializations" => Specialization::all(),
        ]);
    }

    // Function to add doctor
    public function create()
    {
        // $doctor = $request->validate([
        //     'email' => 'required|email|exists:users,email',
        //     'email' => 'required|email|exists:users,email',
        //     'password' => 'required|min:6|max:80'
        //     'password' => 'required|min:6|max:80'
        // ]);
        ddd(request()->all());
    }
}