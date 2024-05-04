<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Spatie\Permission\Models\Role;
use App\Models\information\organization;
use App\Models\information\organizationType;
use Spatie\Permission\Models\Permission;
use App\Models\Wilaya;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    //
    public function index()
    {
        return view('admin.index', [
            "tag" => Doctor::all(),
            "typeOrg" => organizationType::all(),
            "wilaya" => Wilaya::all(),
            "permissions" => Permission::all(),
            "roles" => Role::all(),
        ]);
    }
    public function create(Request $request)
    {
        $data = $request->validate([
            "org_name" => "required",
            "org_email" => "required|email",
            "org_phone" => "required",
            "org_address" => "required",
            "wilayaId" => "required",
            "baldyaid" => "required",
            "org_type" => "required",
        ]);;
        organization::create(
            [
                "org_name" => $data["org_name"],
                "org_email" => $data["org_email"],
                "org_phone" => $data["org_phone"],
                "org_address" => $data["org_address"],
                "org_wilaya" => $data["wilayaId"],
                "org_baldya" => $data["baldyaid"],
                "org_type" => $data["org_type"]
            ]
        );
        return redirect()->back()->with("success", "Organization Created Successfully");
    }
    public function createType(Request $request)
    {
        $data = $request->validate([
            "nameOge" => "required",
            "Oganzation" => "required"

        ]);
        organizationType::create(
            [
                "type_name" => $data["nameOge"],
                "type_des" => $data["Oganzation"]
            ]
        );
        return redirect()->back()->with("success", "Organization Type Created Successfully");
    }
    // TODO : Add Update and Delete Functions
    // TODO : Add permmistion  CRUD
}
