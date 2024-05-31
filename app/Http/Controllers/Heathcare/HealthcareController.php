<?php

namespace App\Http\Controllers\Heathcare;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Models\Doctor;
use App\Models\information\organization;
use App\Models\System\Permission;
use App\Models\Wilaya;
use Illuminate\Support\Facades\DB;
use Kreait\Firebase\Factory;
use Kreait\Laravel\Firebase\Facades\Firebase;
use App\Models\Document;
use App\Models\User;

class HealthcareController extends Controller
{
    //
    public function index()
    {
        $doctorNotActive = Doctor::all()->where('is_activ', 0);
        return view("admin.index", [
            "specializations" => Specialization::all(),
            "doctors" => Doctor::all(),
            "doctorNotActive" => $doctorNotActive,
            "tag" => Doctor::all(),
            "permissions" => Permission::all(),
            "wilaya" => Wilaya::all(),
            "organization" => organization::all(),
            "users" => User::all(),
        ]);
    }
}
