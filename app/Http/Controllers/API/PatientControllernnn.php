<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Apimodel\Patient;
use App\Models\Commune;
use App\Models\Wilaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    //

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email' => 'required|email', 'password' => 'required']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->make()()->getTTL() * 60
        ]);
    }

    // This is my code how it will work to do login
    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);
    //     $user = Patient::where('email', $request->email)->first();
    //     if (!$user || !Hash::check($request->password, $user->password)) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'Invalid credentials'
    //         ], 401);
    //     }

    //     $token = $user->createToken(request("email"))->plainTextToken;
    //     // query builder to attempt id wilaya and id commune

    //     // end

    //     return response()->json([
    //         'status' => 'success',
    //         'token' => $token,
    //         'message' => 'Login successful',
    //         'patient' => [
    //             'healthId' => $user->healthId,
    //             'firstName' => $user->firstName,
    //             'lastName' => $user->lastName,
    //             'email' => $user->email,
    //             'phone' => $user->phone,
    //             'street' => $user->street,
    //             'wilaya' => $user->wilaya,
    //             'baldya' => $user->baldya,
    //             'generalMedicalRecord' => $user->generalMedicalRecord,
    //             'card' => $user->card,
    //         ],
    //     ]);
    // }
}
