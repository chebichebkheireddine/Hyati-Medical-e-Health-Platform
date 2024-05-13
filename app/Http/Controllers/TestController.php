<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Spatie\Permission\Models\Role;
use App\Models\information\organization;
use App\Models\information\organizationType;
use Spatie\Permission\Models\Permission;
use App\Models\Wilaya;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function index()
    {
        return view('admin.index', [
            "tag" => Doctor::all(),
            "itemPermission" => Permission::all(),
            "typeOrg" => organizationType::all(),
            "wilaya" => Wilaya::all(),
            "permissions" => Permission::all(),
            "roles" => Role::all(),
        ]);
    }
}
