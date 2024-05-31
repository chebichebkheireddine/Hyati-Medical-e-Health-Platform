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
        $users = User::latest()->role('admin')->where('is_active', 1)->get();
        $usersNoActive = User::latest()->role('admin')->where('is_active', 0)->get();
        // We can use this code to get the user with the role

        return view("admin.index", [
            "userNoActive" => $usersNoActive,
            "users" => $users,
            "permissions" => Permission::all(),
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
            'picture' => 'required|image',
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
        $picture = base64_encode(file_get_contents($data['picture']->getPathname()));
        $role = request('role');
        $user = User::create([
            'orgID' => $data['orgId'],
            'nationalID' => $data['nationalID'],
            'picture' => $picture,
            'firstName' => $data['firstName'],
            'lastname' => $data['lastname'],
            'username' => $data['username'],
            'is_active' => 1,
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

    public function update(User $user)
    {
        $data = request()->validate([
            'nationalID' => 'required|min:3|numeric',
            'picture' => 'image',
            'firstName' => 'required',
            'lastname' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'wilayaId' => '',
            'baldyaid' => '',
            'orgId' => 'required',
        ]);
        if (request('picture')) {
            $picture = base64_encode(file_get_contents($data['picture']->getPathname()));
        } else {
            $picture = $user->picture;
        }
        $role = request('role');
        $user->update([
            'orgID' => $data['orgId'],
            'nationalID' => $data['nationalID'],
            'picture' => $picture,
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
        // If you want to use milible role just use all
        if ($role) {
            $user->syncRoles($role);
        }
        return redirect()->route('admin.users.index');
    }
    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
    public function assignPermission(User $user)
    {
        $data = request()->validate([
            'permestions' => 'required',
        ]);
        $user->givePermissionTo($data['permestions']);
        return redirect()->route('admin.users.index');
    }

    public function syncPermission(User $user)
    {
        $action = request()->input('action');
        $data = request()->validate([
            'permestionsA' => 'required',
        ]);

        if ($action === 'update') {
            // Handle add action
            $user->syncPermissions($data['permestionsA']);
            return redirect()->back()->with('success', 'Permissions update successfully.');
        } elseif ($action === 'delete') {
            // Handle delete action
            $user->revokePermissionTo($data['permestionsA']);
            return redirect()->back()->with('success', 'Permissions deleted successfully.');
            // return ddd('delete');
        }
        // return redirect()->route('admin.users.index');

        // This for acsept user
    }
    public function acceptuser(User $user)
    {
        $user->update(
            ['is_active' => 1]
        );
        return redirect()->back()->with('success', 'User active successfully.');
    }
    public function removeacceptuser(User $user)
    {
        $user->update(
            ['is_active' => 0]
        );
        return redirect()->back()->with('success', 'User deactive active successfully.');
    }
}
