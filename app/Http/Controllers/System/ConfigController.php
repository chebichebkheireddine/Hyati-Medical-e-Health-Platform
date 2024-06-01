<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Spatie\Permission\Models\Role;
use App\Models\information\organization;
use App\Models\information\organizationType;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use App\Models\Wilaya;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Laravel\Firebase\Facades\Firebase;
use PhpParser\Node\Stmt\TryCatch;

class ConfigController extends Controller
{
    //Add fierbase to the project
    protected $auth;
    protected $firestore;

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
            "users" => User::all(),
            "organizations" => organization::all()
        ]);
    }
    public function create(Request $request)
    {
        $data = $request->validate([
            "org_name" => "required",
            "org_email" => "required|email",
            "org_phone" => "required",
            "org_address" => "required",
            "wilayaId" => "required",
            "baldyaid" => "required",
            "org_type" => "required",
        ]);;
        $oganization = organization::create(
            [
                "org_name" => $data["org_name"],
                "org_email" => $data["org_email"],
                "org_phone" => $data["org_phone"],
                "org_address" => $data["org_address"],
                "org_wilaya" => $data["wilayaId"],
                "org_baldya" => $data["baldyaid"],
                "org_type" => $data["org_type"]
            ]
        );
        $wilaya = Wilaya::find($data['wilayaId']);
        $baldya = $wilaya->communes()->find($data['baldyaid']);
        $type = organizationType::find($data['org_type']);


        $uid = $oganization->org_id . " Nme: " . $oganization->org_name;
        try {

            $database = $this->firestore->database();
            $collection = $database->collection('organization')->document($uid);
            $collection->set([
                'name' => $data["org_name"],
                'email' => $data["org_email"],
                'phone' => $data["org_phone"],
                'address' => $data["org_address"],
                'type' => $type->type_name,
                'town' => $wilaya->name,
                'municipality' => $baldya->name,
            ]);
        } catch (\Kreait\Firebase\Exception\FirebaseException $e) {
            return redirect()->route('admin.config.index')->with('error', 'Error creating Oganization: ' . $e->getMessage());
        }
        return redirect()->back()->with("success", "Organization Created Successfully");
    }
    public function update(organization $org)
    {
        $data = request()->validate([
            "org_name" => "required",
            "org_email" => "required|email",
            "org_phone" => "required",
            "org_address" => "required",
            "wilayaId" => "required",
            "baldyaid" => "required",
            "org_type" => "required",
        ]);
        $org->update(
            [
                "org_name" => $data["org_name"],
                "org_email" => $data["org_email"],
                "org_phone" => $data["org_phone"],
                "org_address" => $data["org_address"],
                "org_wilaya" => $data["wilayaId"],
                "org_baldya" => $data["baldyaid"],
                "org_type" => $data["org_type"]
            ]
        );
        $wilaya = Wilaya::find($data['wilayaId']);
        $baldya = $wilaya->communes()->find($data['baldyaid']);
        $type = organizationType::find($data['org_type']);
        $uid = $org->org_id . " Nme: " . $org->org_name;
        try {
            $database = $this->firestore->database();
            $collection = $database->collection('organizatio')->document($uid);
            $collection->set([
                'name' => $data["org_name"],
                'email' => $data["org_email"],
                'phone' => $data["org_phone"],
                'address' => $data["org_address"],
                'type' => $type->type_name,
                'town' => $wilaya->name,
                'municipality' => $baldya->name,
            ]);
        } catch (\Kreait\Firebase\Exception\FirebaseException $e) {
            return redirect()->route('admin.config.index')->with('error', 'Error updating Oganization: ' . $e->getMessage());
        }
        return redirect()->back()->with("success", "Organization Updated Successfully");
    }
    public function delete(organization $org)
    {
        $uid = $org->org_id . " Nme: " . $org->org_name;
        try {
            $database = $this->firestore->database();
            $collection = $database->collection('organization')->document($uid);
            $collection->delete();
        } catch (\Kreait\Firebase\Exception\FirebaseException $e) {
            return redirect()->route('admin.config.index')->with('error', 'Error deleting Oganization: ' . $e->getMessage());
        }
        $org->delete();
        return redirect()->back()->with("success", "Organization Deleted Successfully");
    }
    public function createType(Request $request)
    {
        $data = $request->validate([
            "nameOge" => "required",
            "descriptionOrg" => "required"

        ]);
        organizationType::create(
            [
                "type_name" => $data["nameOge"],
                "type_des" => $data["descriptionOrg"]
            ]
        );
        return redirect()->back()->with("success", "Organization Type Created Successfully");
    }
    // TODO : Add Update and Delete Functions

    public function updteType(organizationType $type, Request $request)

    {
        $data = $request->validate([
            "nameOge" => "required",
            "descriptionOrg" => "required"

        ]);
        $type->update([
            "type_name" => $data["nameOge"],
            "type_des" => $data["descriptionOrg"]
        ]);
        return redirect()->back()->with("success", "Organization Type Updated Successfully");
    }
    public function deleteType(organizationType $type)
    {
        $type->delete();
        return redirect()->back()->with("success", "Organization Type Deleted Successfully");
    }
    // TODO : Add permmistion  CRUD
}
