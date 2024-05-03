<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\information\organizationType;
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
        ]);
    }
    public function create(Request $request)
    {
        return ddd($request->all());
    }
    public function createType(Request $request)
    {
        return ddd($request->all());
    }
}
