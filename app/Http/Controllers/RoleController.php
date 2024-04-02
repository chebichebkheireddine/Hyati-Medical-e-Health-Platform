<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function create()
    {
        // ddd(request()->all());
        $role = request()->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:25|max:500'
        ]);
        Role::create($role);
        return back();
    }
}
