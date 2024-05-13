<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Spatie\Permission\Models\Role;

use App\Models\information\organizationType;
use Spatie\Permission\Models\Permission;
use App\Models\Wilaya;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;

class TestController extends Controller
{
    //
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = "test";
    }
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // 'email' => 'required|email|max:255',
        ]);

        $postData = [
            'name' => $request->name,
            'email' => $request->test,
        ];

        $postRef = $this->database->getReference($this->tablename)->push($postData);

        return response()->json(['success' => true]);
    }
}