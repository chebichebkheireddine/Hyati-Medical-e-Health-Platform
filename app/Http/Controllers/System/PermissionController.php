<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use League\CommonMark\Node\Block\Document;

class PermissionController extends Controller
{
    //
    public function create(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
        ]);
        Permission::create([
            "name" => $data["name"],
        ]);
        return redirect()->back()->with("success", "Permission Created Successfully");
    }
    public function update(Request $request, Permission $permissions)
    {
        $dat = $request->validate([
            "name" => "required",
        ]);
        $permissions->update([
            "name" => $dat['name'],
        ]);
        return redirect()->back();
    }
    public function delete(Permission $permissions)
    {
        $permissions->delete();
        return redirect()->back()->with("success", "Permission Deleted Successfully");
    }
    public function index()
    {
        $ddoc = new Document();
    }
}
