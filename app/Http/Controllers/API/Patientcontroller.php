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
        }
        $token = $user->createToken(request("email"))->plainTextToken;

        $wilaya = Wilaya::find($user->id_wilaya);
        $commune = Commune::where('wilaya_id', $user->id_commune)->first();
        return response()->json([
            'token' => $token,

            'patient' => array_merge($user->only(['id', 'firstname', 'lastname', 'phone', 'address', 'email']), ['wilaya' => $wilaya, 'commune' => $commune]),

        ]);
    }
}
