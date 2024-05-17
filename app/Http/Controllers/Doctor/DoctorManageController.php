<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Models\Doctor;
use App\Models\information\organization;
use App\Models\System\Permission;
use App\Models\Wilaya;
use Illuminate\Support\Facades\DB;
use Kreait\Firebase\Factory;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Illuminate\Support\Facades\Hash;

class DoctorManageController extends Controller
{
    // This constructor is used to setpe Auth for feierbase
    protected $auth;
    protected $firestore;

    public function __construct(Factory $factory)
    {
        $this->auth = Firebase::auth();
        $this->firestore = $factory->withServiceAccount("D:\Laravel Project\Hyati_med\demo-hyati\key.json")->createFirestore();
    }
    //
    public function index()
    {
        // code to display the doctor page
        return view("admin.index", [
            "specializations" => Specialization::all(),
            "doctors" => Doctor::all(),
            "tag" => Doctor::all(),
            "permissions" => Permission::all(),
            "wilaya" => Wilaya::all(),
            "organization" => organization::all(),
        ]);
    }
    //create doctor with Speciazation
    public function create(Request $request, Factory $factory)
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
                'password' =>  Hash::make($attributes['password']),
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
            if (isset($specializations)) {

                foreach ($specializations as $specialization_ids) {
                    foreach ($specialization_ids as $specialization_id) {
                        DB::table('doctor_specializations')->insert([
                            'doctor_id' => $doctor->sysId,
                            'specialization_id' => intval($specialization_id)
                        ]);
                    }
                }
            }
            if ($createdUser) {

                // Set fierstore Informtion

                // $firestore = $this->firestore->withServiceAccount("D:\Laravel Project\Hyati_med\demo-hyati\key.json")->createFirestore();
                $database = $this->firestore->database();
                $collection = $database->collection('doctors')->document($uid);
                $collection->set([
                    'nationalId' => $attributes['nationalId'],
                    'orgId' => $attributes['organization'],
                    'firstName' => $attributes['firstName'],
                    'lastName' => $attributes['lastName'],
                    'email' => $attributes['email'],
                    'speciality' => $doctor->specialization->pluck('specialization_name')->toArray(),
                    'picture' => $picture,
                    'phoneNumber' => $attributes['phone'],
                    'street' => $attributes['address'],
                    'town' => $wilaya->name,
                    'municipality' => $baldya->name,
                ]);
            }
        } catch (\Kreait\Firebase\Exception\FirebaseException $e) {
            return redirect()->route('admin.doctor.index')->with('error', 'Error creating doctor: ' . $e->getMessage());
        }

        return redirect(Route('admin.doctor.index'))->with('success', 'Doctor ' . $attributes['firstName'] . ' created successfully.');
    }
    //update
    public function update(Doctor $doctor, Request $request)
    {
        // TODO fix  code updaet
        $attributes = $request->validate([
            'picture' => "",
            'nationalId' => 'string|max:255',
            'organization' => 'string|max:255',
            'firstName' => 'string|max:150',
            'lastName' => 'string|max:150',
            'username' => 'string|max:255',
            'email' => 'email',
            'password' => 'max:80',
            'phone' => 'max:255',
            'address' => 'max:255',
            "wilayaId" => "",
            "baldyaid" => "",
        ]);

        // Firebase Auth and fierstore Informtion
        try {
            $doctorProperties = [
                'email' => $request->email,
                'password' => $request->password,
            ];

            $createdUser = $this->auth->updateUser($doctor->uid, $doctorProperties);
            // Store image to variable
            if ($request->has('picture')) {
                $picture = base64_encode(file_get_contents($attributes['picture']->getPathname()));
            } else {
                $picture = $doctor->picture;
            }

            $uid = $createdUser->uid;
            // Here create table doctor
            $doctor->update([
                'uid' => $uid,
                'picture' => $picture, // 'data:image/jpeg;base64,
                'nationalId' => $attributes['nationalId'],
                'orgId' => $attributes['organization'],
                'firstName' => $attributes['firstName'],
                'lastName' => $attributes['lastName'],
                'username' => $attributes['username'],
                'email' => $attributes['email'],
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
                    'phoneNumber' => $attributes['phone'],
                    'street' => $attributes['address'],
                    'town' => $wilaya->name,
                    'municipality' => $baldya->name,
                ]);
            }
        } catch (\Kreait\Firebase\Exception\FirebaseException $e) {
            return redirect()->route('admin.doctor.index')->with('error', 'Error creating doctor: ' . $e->getMessage());
        }

        return redirect(Route('admin.doctor.index'))->with('success', 'Doctor ' . $attributes['firstName'] . ' update successfully.');
    }
    //Delete
    public function delete(Doctor $doctor)
    {

        try {
            $this->auth->deleteUser($doctor->uid);
            // $firestore = $factory->withServiceAccount("D:\Laravel Project\Hyati_med\demo-hyati\key.json")->createFirestore();
            $database = $this->firestore->database();
            $database->collection('doctors')->document($doctor->uid)->delete();
            $doctor->delete();
        } catch (\Kreait\Firebase\Exception\FirebaseException $e) {
            return redirect()->route('admin.doctor.index')->with('error', 'Error deleting doctor: ' . $e->getMessage());
        }

        return redirect(Route('admin.doctor.index'));
    }
    //store
    public function store()
    {
    }
}
