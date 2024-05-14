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

class DoctorManageController extends Controller
{
    // This constructor is used to setpe Auth for feierbase
    protected $auth;

    public function __construct()
    {
        $this->auth = Firebase::auth();
    }
    //index
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
        $attrbutes = $request->validate([
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
        $doctor = Doctor::create([
            'nationalId' => $attrbutes['nationalId'],
            'orgId' => $attrbutes['organization'],
            'firstName' => $attrbutes['firstName'],
            'lastName' => $attrbutes['lastName'],
            'username' => $attrbutes['username'],
            'email' => $attrbutes['email'],
            'password' =>  bcrypt($attrbutes['password']),
            'phone_number' => $attrbutes['phone'],
            'address' => $attrbutes['address'],
            'id_wilaya' => $attrbutes['wilayaId'],
            'id_commune' => $attrbutes['baldyaid'],

        ]);
        $wilaya = Wilaya::find($attrbutes['wilayaId']);
        $baldya = $wilaya->communes()->find($attrbutes['baldyaid']);


        $specializations = request()->validate([
            'specializations' => 'required',
        ]);
        foreach ($specializations as $specialization_ids) {
            foreach ($specialization_ids as $specialization_id) {
                DB::table('doctor_specializations')->insert([
                    'doctor_id' => $doctor->sysId,
                    'specialization_id' => intval($specialization_id)
                ]);
            }
        }
        $specializationNames = [];
foreach ($doctor->specialization as $speT) {
    
        $specializationNames[] = $speT->specialization_name;
    
}
        // Firebase Auth and fierstore Informtion
        try {
            $doctorProperties = [
                'email' => $request->email,
                'password' => $request->password,
            ];

            $createdUser = $this->auth->createUser($doctorProperties);

            if ($createdUser) {
                $uid = $createdUser->uid;
                $firestore = $factory->withServiceAccount("D:\Laravel Project\Hyati_med\demo-hyati\key.json")->createFirestore();
                $database = $firestore->database();
                $collection = $database->collection('doctors')->document($uid);
                $collection->set([
                    'nationalId' => $request->nationalId,
                    'orgId' => $request->organization,
                    'firstName' => $request->firstName,
                    'lastName' => $request->lastName,
                    'email' => $request->email,
                    'specialization' => $specializationNames,
                    'password' => $request->password,
                    'phone' => $request->phone,
                    'street' => $request->address,
                    'town' => $wilaya->name,
                    'municipality' => $baldya->name,

                ]);
            }
        } catch (\Kreait\Firebase\Exception\FirebaseException $e) {
            return redirect()->route('admin.doctor.index')->with('error', 'Error creating doctor: ' . $e->getMessage());
        }

        return redirect(Route('admin.doctor.index'))->with('success', 'Doctor ' . $attrbutes['firstName'] . ' created successfully.');
    }
    //update
    public function update(Doctor $doctor)
    {
        // TODO fix  code updaet
        $attrbutes = request()->validate([
            'name' => 'required|string|max:255',
            // 'specializations' => 'required',
            'user_name' => 'required|string|max:255',
            'email' => 'required|email|',
            'password' => 'required|max:80',
            'phone_number' => 'required|max:255',
            'address' => 'required|max:255',
        ]);

        $attrbutes['password'] = bcrypt($attrbutes['password']);

        $doctor->update($attrbutes);
        // var_dump($doctor);
        $specializations = request()->validate([
            'specializations' => 'required',
        ]);
        foreach ($specializations as $specialization_ids) {
            foreach ($specialization_ids as $specialization_id) {
                DB::table('doctor_specializations')->update([
                    'doctor_id' => $doctor->id,
                    'specialization_id' => intval($specialization_id)
                ]);
            }
        }
        // Doctor specialization
        // $doctor->specialization()->attach($spes['specializations']);
        return redirect(Route('admin.doctor.index'));
    }
    //Delete
    public function delete(Doctor $doctor)
    {
        $doctor->delete();
        return redirect(Route('admin.doctor.index'));
    }
    //store
    public function store()
    {
    }
}