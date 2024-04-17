<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //test
    public function test()
    {
        return view("admin.index", [
            "specializations" => Specialization::all(),
            "doctors" => Doctor::all(),
        ]);
    }

    // Function to add doctor

    public function add()
    {
        $att = request()->validate([
            'name' => 'required|string|max:255',
            // 'specializations' => 'required',
            'user_name' => 'required|string|max:255|unique:doctors,user_name',
            'email' => 'required|email|unique:doctors,email',
            'password' => 'required|max:80',
            'phone_number' => 'required|max:255',
            'address' => 'required|max:255',
        ]);

        $att['password'] = bcrypt($att['password']);

        $doctor = Doctor::create($att);
        // var_dump($doctor);
        $specializations = request()->validate([
            'specializations' => 'required',
        ]);
        foreach ($specializations as $specialization_ids) {
            foreach ($specialization_ids as $specialization_id) {
                DB::table('doctor_specializations')->insert([
                    'doctor_id' => $doctor->id,
                    'specialization_id' => intval($specialization_id)
                ]);
            }
        }

        // $doctor->specialization()->attach($spes['specializations']);
        return redirect(Route('admin.doctor.index'));
    }
    public function make()
    {
        $att = request()->validate([
            'specialization_name' => 'required|string|max:255',
            'specialization_description' => 'required|string|max:255',
        ]);
        Specialization::create($att);
        return redirect(Route('admin.doctor.index'));
    }
}
