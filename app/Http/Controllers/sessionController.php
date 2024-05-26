<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Doctor;
use App\Models\information\organization;
use App\Models\information\organizationType;
use App\Models\User;
use App\Models\Wilaya;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SessionController extends Controller
{


    // The index function
    public function index()
    {
        return view('welcome.index');
    }


    //This is register function

    public function register()
    {
        return view('auth.admin.register', [

            "permissions" => Permission::all(),
            "organization" => organization::all(),
            "wilaya" => Wilaya::all(),
            "baldya" => Commune::all(),
            "roles" => Role::all(),
            "tag" => Doctor::all(),
        ]);
    }
    public function display()
    {
        return view('auth.admin.login');
    }
    public function login(Request $reqest)
    {
        $user = $reqest->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|max:80'
        ]);
        if (auth('web')->attempt($user) && auth('web')->user()->is_active) {
            // remove The attached session
            session()->regenerate();
            return redirect("/admin");
            // return back()->withErrors($user);
        } else {
            return redirect("admin.login_post")->with('messeg', 'Your account is not active');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
        // var_dump(request()->all());
    }
    public function create(Request $reqest)
    {
        //   This is for regest
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
        // $role = request('role');
        $user = User::create([
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
        $user->assignRole("admin");

        return redirect()->route('admin.login_post');
    }
    // logout function
    public function destroy()
    {
        auth('web')->logout();
        return redirect('/');
    }
    public function updateContent()
    {
        return view('admin.index', [
            "tag" => Doctor::all(),
            "itemPermission" => Permission::all(),
            "typeOrg" => organizationType::all(),
            "wilaya" => Wilaya::all(),
            "permissions" => Permission::all(),
            "roles" => Role::all(),
            "users" => User::all(),
        ]);
    }
}
