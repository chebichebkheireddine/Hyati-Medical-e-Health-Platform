<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class sessionController extends Controller
{


    // The index function
    public function index()
    {
        return view('welcome.index');
    }


    //This is register function

    public function register()
    {
        return view('auth.admin.register');
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
        if (auth()->attempt($user)) {
            // remove The attached session
            session()->regenerate();
            return redirect("/admin");
            // return back()->withErrors($user);
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
        // var_dump(request()->all());
    }
    public function store(Request $reqest)
    {
        $user = $reqest->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:80'
        ]);
        $user['role_id'] = 0;
        $user['password'] = bcrypt($user['password']);
        $users = User::create($user);
        auth()->login($users);
        return redirect("admin");
    }
    // logout function
    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }
}
