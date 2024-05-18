<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Spatie\Permission\Models\Role;

use App\Models\information\organizationType;
use Spatie\Permission\Models\Permission;
use App\Models\Wilaya;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Factory;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PatientController extends Controller
{
    //
    protected $auth;
    protected $firestore;
    protected $healthId;
    protected $picture;
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $phoneNumber;
    protected $birthDate;
    protected $gender;
    protected $town;
    protected $municipality;
    protected $street;
    protected $generalMedicalRecord;
    protected $healthCard;
    public function __construct(Factory $factory)
    {
        $this->auth = Firebase::auth();
        $this->firestore = $factory->withServiceAccount("D:\Laravel Project\Hyati_med\demo-hyati\key.json")->createFirestore();
    }
    public function index()
    {
        return view('admin.index', [
            "tag" => Doctor::all(),
            "itemPermission" => Permission::all(),
            "typeOrg" => organizationType::all(),
            "wilaya" => Wilaya::all(),
            "permissions" => Permission::all(),
            "roles" => Role::all(),
        ]);
    }
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'picture' => 'required|image',
            'healthId' => 'required|string|max:255',
            'birthDate' => 'required|date',
            'gender' => 'required|string',
            'firstName' => 'required|string|max:150',
            'lastName' => 'required|string|max:150',
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|max:80',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
            "wilayaId" => "required",
            "baldyaid" => "required",
        ]);
        $birthdateMillis = strtotime($attributes['birthDate']) * 1000;

        $patientProperties = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $wilaya = Wilaya::find($attributes['wilayaId']);
        $baldya = $wilaya->communes()->find($attributes['baldyaid']);
        $picture = base64_encode(file_get_contents($attributes['picture']->getPathname()));

        $patient = $this->auth->createUser($patientProperties);
        $uid = $patient->uid;
        if ($patient) {
            // $firestore = $this->firestore->withServiceAccount("D:\Laravel Project\Hyati_med\demo-hyati\key.json")->createFirestore();
            // Data
            $database = $this->firestore->database();
            $creationDate = round(microtime(true) * 1000);
            $password = bin2hex(random_bytes(10)); // Random 20-character string
            $qrCodeFile = QrCode::generate($attributes['healthId']);
            $qrCodeData = base64_encode($qrCodeFile); // QR code with the user's ID
            do {
                $pinCode = rand(1000, 9999); // Random 4-digit number

                // Check if the pin code already exists in the database
                $existingPinCode = $database->collection('Patient Test')
                    ->where('patientInformation.healthCard.pinCode', '=', $pinCode)
                    ->documents()
                    ->rows();
            } while (!empty($existingPinCode));

            // $pinCode = rand(1000, 9999); // Random 4-digit number
            // end
            $database = $this->firestore->database();
            $collection = $database->collection('Patient Test')->document($uid);
            $collection->set([
                "patientInformation" => [
                    'sysId' => $uid,
                    'healthId' => $attributes['healthId'],
                    'picture' => $picture,
                    'firstName' => $attributes['firstName'],
                    'lastName' => $attributes['lastName'],
                    'email' => $attributes['email'],
                    'phoneNumber' => $attributes['phone'],
                    'birthDate' => $birthdateMillis,
                    'gender' => $attributes['gender'],
                    'town' => $wilaya->name,
                    'municipality' => $baldya->name,
                    'street' => $attributes['address'],
                    'generalMedicalRecord' => ['emty'],
                    'healthCard' => [
                        'creationDate' => $creationDate,
                        'password' => $password,
                        'qrCodeData' => $qrCodeData,
                        'pinCode' => $pinCode,
                    ],

                ]
            ]);
            return redirect()->route('admin.patient.add')->with('success', 'Patient added successfully');
        }
    }
}