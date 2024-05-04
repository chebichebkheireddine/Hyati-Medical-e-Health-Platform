<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function create()
    {
        // ddd(request()->all());
        $data = request()->validate([
            'name' => 'required|min:3|max:255',
        ]);
        Role::create($data);
        return back();
    }
    public function update(Role $role)
    {
        $data = request()->validate([
            'name' => 'required|min:3|max:255',
        ]);
        $role->update($data);
        return back();
    }
}
