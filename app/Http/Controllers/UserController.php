<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
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

    public function add()
    {
        $att = request()->validate([
            'name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255|unique:doctors,user_name',
            'email' => 'required|email|unique:doctors,email',
            'password' => 'required|max:80',
            'phone_number' => 'required|max:255',
            'address' => 'required|max:255',
        ]);
        $att['password'] = bcrypt($att['password']);
        Doctor::create($att);
        return redirect("admin");
    }
    public function make()
    {
        $att = request()->validate([
            'specialization_name' => 'required|string|max:255',
            'specialization_description' => 'required|string|max:255',
        ]);
        Specialization::create($att);
        return redirect("/");
    }
}
