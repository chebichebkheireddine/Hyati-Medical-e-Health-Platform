<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;

class AuthControllerF extends Controller
{
    protected $auth;

    public function __construct()
    {
        $this->auth = Firebase::auth();
    }


    public function store(Request $request)
    {
        try {
            $userProperties = [
                'email' => $request->email,
                'password' => $request->Password,
            ];

            $createdUser = $this->auth->createUser($userProperties);

            // You can get the new user's UID like this:
            if ($createdUser) {

                $uid = $createdUser->uid;

                return redirect()->route('admin.patients.index')->with('success', 'Patient ' . $request->name . ' created successfully.');
            }
        } catch (\Kreait\Firebase\Exception\FirebaseException $e) {

            return redirect()->route('admin.patients.index')->with('success', 'Error creating patient: ' . $e->getMessage());
        }
        // return redirect()->route('admin.patients.index')->with('error', 'Error creating patient: ');
        // return dd($request->all());
    }
}
