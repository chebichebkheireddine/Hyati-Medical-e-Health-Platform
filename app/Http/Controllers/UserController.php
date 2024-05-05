<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Doctor;
use App\Models\information\organization;
use Spatie\Permission\Models\Role;
use App\Models\Specialization;
use App\Models\System\Permission;
use App\Models\User;
use App\Models\Wilaya;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // TODO: change role use
    //This is genaral code to use it
    public function index()
    {
        // TDO: Add the ability to filter users by role
        // $users = User::role('admin')->get();
        $users = User::latest()->role('admin')->get();
        return view("admin.index", [
            "users" => $users,
            "itemPermission" => Permission::all(),
            "organization" => organization::all(),
            "wilaya" => Wilaya::all(),
            "baldya" => Commune::all(),
            "roles" => Role::all(),
            "tag" => Doctor::all(),
        ]);
    }

    // Function to add doctor

    public function create()
    {
        $data = request()->validate([
            'nationalID' => 'required|min:3|numeric',
            'firstName' => 'required',
            'lastname' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'wilayaId' => 'required',
            'baldyaid' => 'required',
            'orgId' => 'required',
        ]);
        $role = request('role');
        $user = User::create([
            'orgID' => $data['orgId'],
            'nationalID' => $data['nationalID'],
            'firstName' => $data['firstName'],
            'lastname' => $data['lastname'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'address' => $data['address'],
            'id_wilaya' => $data['wilayaId'],
            'id_commune' => $data['baldyaid'],
        ]);
        if ($role) {

            $user->assignRole($role);
        }
        return redirect()->route('admin.users.index');
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}
