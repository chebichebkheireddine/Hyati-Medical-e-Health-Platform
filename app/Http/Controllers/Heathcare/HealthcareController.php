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

class HealthcareController extends Controller
{
    //
    public function index()
    {
        return view("admin.index", [
            "specializations" => Specialization::all(),
            "doctors" => Doctor::all(),
            "tag" => Doctor::all(),
            "permissions" => Permission::all(),
            "wilaya" => Wilaya::all(),
            "organization" => organization::all(),
        ]);
    }
}