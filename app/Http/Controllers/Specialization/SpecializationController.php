<?php

namespace App\Http\Controllers\Specialization;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\information\organization;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Models\User;
use App\Models\Wilaya;
use Spatie\Permission\Models\Permission;

class SpecializationController extends Controller
{
    // index
    public function index()
    {
        return view('admin.index', [
            "specializations" => Specialization::all(),
            "doctors" => Doctor::all(),
            "tag" => Doctor::all(),
            "permissions" => Permission::all(),
            "wilaya" => Wilaya::all(),
            "organization" => organization::all(),
            "users" => User::all(),
        ]);
    }
    // create
    public function create()
    {
        $attrbutes = request()->validate([
            'specialization_name' => 'required|string|max:255',
            'specialization_description' => 'required|string|max:255',
        ]);
        Specialization::create($attrbutes);
        return redirect(Route('admin.doctor.index.config'));
    }
    // update
    public function update(Specialization $specialization)
    {
        $attrbutes = request()->validate([
            'specialization_name' => 'required|string|max:255',
            'specialization_description' => 'required|string|max:255',
        ]);
        $specialization->update($attrbutes);
        return redirect(Route('admin.doctor.index.config'));
    }
    //delete
    public function delete(Specialization $specialization)
    {
        // This function will delete the specialization
        $specialization->delete();
        return redirect(Route('admin.doctor.index.config'));
    }
}