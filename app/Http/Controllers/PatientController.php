<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Spatie\Permission\Models\Role;

use App\Models\information\organizationType;
use App\Models\User;
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
        $patients = $this->firestore->database()->collection('patients ')->documents();
        $patientsArray = [];
        foreach ($patients as $patient) {
            $patientsArray[] = $patient->data();
        }
        return view('admin.index', [
            "tag" => Doctor::all(),
            "itemPermission" => Permission::all(),
            "typeOrg" => organizationType::all(),
            "wilaya" => Wilaya::all(),
            "permissions" => Permission::all(),
            "roles" => Role::all(),
            "users" => User::all(),
            "patients" => $patientsArray,
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'picture' => 'required|image',
            'healthId' => 'required|string|max:255',
            'birthDate' => 'required|date',
            'gender' => 'required|string',
            'bloodType' => 'required|string',
            'firstName' => 'required|string|max:150',
            'lastName' => 'required|string|max:150',
            'username' => 'required|string|max:255',
            'email' => 'required|email',
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
            $database = $this->firestore->database();
            $creationDate = round(microtime(true) * 1000);
            // Generate a random password
            function generatePassword($length = 10)
            {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
                $charactersLength = strlen($characters);
                $randomPassword = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomPassword .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomPassword;
            }
            $password = generatePassword(); // Random 20-character string
            // End of generating a random password

            do {
                $pinCode = rand(1000, 9999); // Random 4-digit number

                // Check if the pin code already exists in the database
                $existingPinCode = $database->collection('patients ')
                    ->where('patientInformation.healthCard.pinCode', '=', $pinCode)
                    ->documents()
                    ->rows();
            } while (!empty($existingPinCode));

            // $pinCode = rand(1000, 9999); // Random 4-digit number
            // end
            $database = $this->firestore->database();
            $collection = $database->collection('patients ')->document($uid);
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
                    'generalMedicalRecord' => [
                        'allergies' => [],
                        'bloodType' => $attributes['bloodType'],
                        'consultationRecords' => [],
                        'currentMedications' => [],
                        'emergencyContacts' => [],
                        'familyHistory' => "",
                        'fatherHealthId' => "",
                        'imagingRecords' => [],
                        'labRecords' => [],
                        'medicalHistory' => [],
                        'metrics' => [],
                        'motherHealthId' => "",
                        'vaccinations' => [],
                        'vitality' => true,
                    ],
                    'healthCard' => [
                        'creationDate' => $creationDate,
                        'password' => $password,
                        'qrCodeData' => $attributes['healthId'],
                        'pinCode' => $pinCode,
                    ],

                ]
            ]);
            return redirect()->route('admin.patients.index')->with('success', 'Patient added successfully');
        }
        return redirect()->back()->with('alart', 'Patient added successfully');
    }
}
        // $qrCodeFile = QrCode::generate();
            // $qrCodeData = base64_encode($qrCodeFile); // QR code with the user's ID