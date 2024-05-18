<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Kreait\Firebase\Factory;
use Kreait\Laravel\Firebase\Facades\Firebase;

class AuthPatientController extends Controller
{
    protected $auth;

    public function __construct()
    {
        $this->auth = Firebase::auth();
    }


    public function store(Request $request, Factory $factory)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $nameInput = $request->name;
        $hashedPassword = Hash::make($request->password);

        try {
            $userProperties = [
                'email' => $request->email,
                'password' => $hashedPassword,
            ];

            $createdUser = $this->auth->createUser($userProperties);

            if ($createdUser) {
                $uid = $createdUser->uid;

                $firestore = $factory->withServiceAccount("D:\Laravel Project\Hyati_med\demo-hyati\key.json")->createFirestore();
                $database = $firestore->database();
                $collection = $database->collection('users')->document($uid);
                $collection->set([
                    'name' => $nameInput,
                    'email' => $request->email,
                    'password' => $hashedPassword,
                ]);

                return redirect()->route('admin.patients.index')->with('success', 'Patient ' . $request->name . ' created successfully.');
            }
        } catch (\Kreait\Firebase\Exception\FirebaseException $e) {
            return redirect()->route('admin.patients.index')->with('error', 'Error creating patient: ' . $e->getMessage());
        }
    }
    public function createFirestoreDocument()
    {

        return 'Document created';
    }
}
