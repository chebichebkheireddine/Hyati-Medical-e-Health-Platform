<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Commune;
use App\Models\Doctor;
use App\Models\information\organization;
use App\Models\Specialization;
use App\Models\Wilaya;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SessionDoctorController extends Controller
{
    protected $auth;
    protected $firestore;

    public function __construct(Factory $factory)
    {
        $this->auth = Firebase::auth();
        $this->firestore = $factory->withServiceAccount("D:\Laravel Project\Hyati_med\demo-hyati\key.json")->createFirestore();
    }
    // Doctor session controller
    public function index()
    {
        return view('auth.doctor.doctor_login');
    }
    public function regesterpage()
    {

        return view('auth.doctor.doctor_register', [

            "permissions" => Permission::all(),
            "organization" => organization::all(),
            "specializations" => Specialization::all(),
            "wilaya" => Wilaya::all(),
            "baldya" => Commune::all(),
            "roles" => Role::all(),
            "tag" => Doctor::all(),
        ]);
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:doctors,email',
            'password' => 'required|min:6|max:80'
        ]);

        if (auth('doctor')->attempt($credentials) && auth('doctor')->user()->is_active) {
            session()->regenerate();
            return redirect("/hethecare/doctor");
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->with('alert', 'this acount is not Active ');
        }
    }
    public function destroy()
    {
        auth('doctor')->logout();
        return redirect('/');
    }
    public function regester(Request $request)
    {
        $attributes = $request->validate([
            'picture' => 'required|image',
            'nationalId' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'firstName' => 'required|string|max:150',
            'lastName' => 'required|string|max:150',
            'username' => 'required|string|max:255|unique:doctors,username',
            'email' => 'required|email|unique:doctors,email',
            'password' => 'required|max:80',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
            "wilayaId" => "required",
            "baldyaid" => "required",
        ]);

        // Firebase Auth and fierstore Informtion
        try {
            $doctorProperties = [
                'email' => $request->email,
                'password' => $request->password,
            ];

            $createdUser = $this->auth->createUser($doctorProperties);
            // Store image to variable

            $picture = base64_encode(file_get_contents($attributes['picture']->getPathname()));
            $uid = $createdUser->uid;
            // Here create table doctor
            $doctor = Doctor::create([
                'uid' => $uid,
                'picture' => $picture, // 'data:image/jpeg;base64,
                'nationalId' => $attributes['nationalId'],
                'orgId' => $attributes['organization'],
                'firstName' => $attributes['firstName'],
                'lastName' => $attributes['lastName'],
                'username' => $attributes['username'],
                'email' => $attributes['email'],
                'is_active' => 0,
                'password' =>  bcrypt($attributes['password']),
                'phone_number' => $attributes['phone'],
                'address' => $attributes['address'],
                'id_wilaya' => $attributes['wilayaId'],
                'id_commune' => $attributes['baldyaid'],

            ]);
            $wilaya = Wilaya::find($attributes['wilayaId']);
            $baldya = $wilaya->communes()->find($attributes['baldyaid']);


            $specializations = request()->validate([
                'specializations' => 'required',
            ]);
            foreach ($specializations as $specialization_ids) {
                foreach ($specialization_ids as $specialization_id) {
                    DB::table('doctor_specializations')->update([
                        'doctor_id' => $doctor->sysId,
                        'specialization_id' => intval($specialization_id)
                    ]);
                }
            }

            if ($createdUser) {

                // Set fierstore Informtion

                // $firestore = $this->firestore->withServiceAccount("D:\Laravel Project\Hyati_med\demo-hyati\key.json")->createFirestore();
                $database = $this->firestore->database();
                $collection = $database->collection('doctors')->document($doctor->uid);
                $collection->set([
                    'nationalId' => $attributes['nationalId'],
                    'orgId' => $attributes['organization'],
                    'firstName' => $attributes['firstName'],
                    'lastName' => $attributes['lastName'],
                    'email' => $attributes['email'],
                    'speciality' => $doctor->specialization->pluck('specialization_name')->toArray(),
                    'picture' => $picture,
                    'is_active' => 0,
                    'phoneNumber' => $attributes['phone'],
                    'street' => $attributes['address'],
                    'town' => $wilaya->name,
                    'municipality' => $baldya->name,
                ]);
            }
        } catch (\Kreait\Firebase\Exception\FirebaseException $e) {
            return redirect()->route('/')->with('error', 'Error creating doctor: ' . $e->getMessage());
        }

        return redirect(Route('doctor.login'))->with('success', 'Doctor ' . $attributes['firstName'] . ' update successfully.');
    }
}
