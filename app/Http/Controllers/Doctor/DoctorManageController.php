<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;

class DoctorManageController extends Controller
{
    //index
    public function index()
    {
        // code to display the doctor page
        return view("admin.index", [
            "specializations" => Specialization::all(),
            "doctors" => Doctor::all(),
            "tag" => Doctor::all(),
        ]);
    }
    //create doctor with Speciazation
    public function create()
    {
        $attrbutes = request()->validate([
            'name' => 'required|string|max:255',
            // 'specializations' => 'required',
            'user_name' => 'required|string|max:255|unique:doctors,user_name',
            'email' => 'required|email|unique:doctors,email',
            'password' => 'required|max:80',
            'phone_number' => 'required|max:255',
            'address' => 'required|max:255',
        ]);

        $attrbutes['password'] = bcrypt($attrbutes['password']);

        $doctor = Doctor::create($attrbutes);
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
        // Doctor specialization
        // $doctor->specialization()->attach($spes['specializations']);
        return redirect(Route('admin.doctor.index'));
    }
    //update
    public function update(Doctor $doctor)
    {
        // TODO fix  code updaet
        $attrbutes = request()->validate([
            'name' => 'required|string|max:255',
            // 'specializations' => 'required',
            'user_name' => 'required|string|max:255',
            'email' => 'required|email|',
            'password' => 'required|max:80',
            'phone_number' => 'required|max:255',
            'address' => 'required|max:255',
        ]);

        $attrbutes['password'] = bcrypt($attrbutes['password']);

        $doctor->update($attrbutes);
        // var_dump($doctor);
        $specializations = request()->validate([
            'specializations' => 'required',
        ]);
        foreach ($specializations as $specialization_ids) {
            foreach ($specialization_ids as $specialization_id) {
                DB::table('doctor_specializations')->update([
                    'doctor_id' => $doctor->id,
                    'specialization_id' => intval($specialization_id)
                ]);
            }
        }
        // Doctor specialization
        // $doctor->specialization()->attach($spes['specializations']);
        return redirect(Route('admin.doctor.index'));
    }
    //Delete
    public function delete(Doctor $doctor)
    {
        $doctor->delete();
        return redirect(Route('admin.doctor.index'));
    }
    //store
    public function store()
    {
    }
}