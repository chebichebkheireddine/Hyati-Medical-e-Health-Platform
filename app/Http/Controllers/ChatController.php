<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Doctor;
use App\Models\information\organization;
use App\Models\User;
use App\Models\Wilaya;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ChatController extends Controller
{
    //
    public function index()
    {
        return view("admin.index", [
            "users" => User::all(),
            "permissions" => Permission::all(),
            "organization" => organization::all(),
            "wilaya" => Wilaya::all(),
            "baldya" => Commune::all(),
            "roles" => Role::all(),
            "tag" => Doctor::all(),
        ]);
    }
}