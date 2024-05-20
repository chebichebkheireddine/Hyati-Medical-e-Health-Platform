<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

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
        return back()->with('message', 'The role has been created')->with('time', now());
    }
    public function update(Role $roles)
    {
        $data = request()->validate([
            'name' => 'required|min:3|max:255',
        ]);
        $roles->update($data);
        return back()->with('message', 'The role has been updated')->with('time', now());
    }
    public function delete(Role $roles)
    {
        $roles->delete();
        return back()->with('message', 'The role has been deleted')->with('time', now());
    }
    public function assignPermission(Role $role)
    {
        // This request is for the permestion it work just for name
        $data = request()->validate([
            'permestions' => 'required',
        ]);
        foreach ($data['permestions'] as $permission) {
            $role->givePermissionTo($permission);
        }
        return back()->with('message', 'The permissions have been assigned')->with('time', now());
    }
    public function syncPermission(Role $role)
    {
        // This request is for the permission it work just for name
        $data = request()->validate([
            'permissions' => 'required',
        ]);

        // Sync all permissions at once
        $role->syncPermissions($data['permissions']);

        return back()->with('message', 'The permissions have been synced')->with('time', now());
    }
    public function deletePermission(Role $role)
    {
        // This request is for the permission it work just for name
        $data = request()->validate([
            'permissions' => 'required',
        ]);

        // Sync all permissions at once
        $role->revokePermissionTo($data['permissions']);

        return back()->with('message', 'The permissions have been deleted')->with('time', now());
    }
}
