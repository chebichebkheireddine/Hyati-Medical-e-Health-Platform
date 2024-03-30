<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class sessionController extends Controller
{
    //This is register function

    public function register()
    {
        return view('auth.register');
    }
    public function start()
    {
        return view('auth.login');
    }
    public function create(Request $reqest)
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
    public function registerSave(Request $reqest)
    {
        $user = $reqest->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:80'
        ]);
        $user['password'] = bcrypt($user['password']);
        $users = User::create($user);
        auth()->login($users);
        return redirect("admin");
    }
    // logout function
    public function logout()
    {
        auth()->logout();
        return redirect('login');
    }
}