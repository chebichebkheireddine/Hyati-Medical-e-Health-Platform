<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Apimodel\Patient;
use App\Models\Commune;
use App\Models\Wilaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Patientcontroller extends Controller
{
    //
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = Patient::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials'
            ], 401);
        }

        $token = $user->createToken(request("email"))->plainTextToken;
        // query builder to attempt id wilaya and id commune

        // end

        return response()->json([
            'status' => 'success',
            'token' => $token,
            'message' => 'Login successful',
            'patient' => [
                'healthId' => $user->healthId,
                'firstName' => $user->firstName,
                'lastName' => $user->lastName,
                'email' => $user->email,
                'phone' => $user->phone,
                'street' => $user->street,
                'wilaya' => $user->wilaya,
                'baldya' => $user->baldya,
                'generalMedicalRecord' => $user->generalMedicalRecord,
                'card' => $user->card,
            ],
        ]);
    }
}
