<?php

namespace Database\Seeders;

use App\Models\Apimodel\Patient;

use App\Models\MedicalRecords\CurrentMedication;
use App\Models\MedicalRecords\EmergencyContact;
use App\Models\MedicalRecords\family;
use App\Models\MedicalRecords\FamilyMember;
use App\Models\MedicalRecords\GeneralMedicalRecord;
use App\Models\Specialization;
use App\Models\User;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Create Permissions
        // Permission::create(['name' => 'create-admin']);
        Permission::create(['name' => 'create-admin']);
        Permission::create(['name' => 'edit-admin']);
        Permission::create(['name' => 'delete-admin']);
        // doctor
        Permission::create(['name' => 'create-doctor']);
        Permission::create(['name' => 'edit-doctor']);
        Permission::create(['name' => 'delete-doctor']);
        Permission::create(['name' => 'full-permission']);
        // Users
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);
        Permission::create(['name' => 'edit-admin-permission']);

        // Create Roles
        $superadminRole = Role::create(['name' => 'super admin']);
        $adminRole = Role::create(['name' => 'admin']);
        // Assign Permissions to Roles
        $superadminRole->givePermissionTo([
            'create-admin',
            'edit-admin',
            'delete-admin',
            'create-doctor',
            'edit-doctor',
            'delete-doctor',
            'create-users',
            'edit-users',
            'delete-users',
            'full-permission',
            'edit-admin-permission'
        ]);


        $adminRole->givePermissionTo([
            'edit-doctor',
            'delete-doctor',
            'create-users',
            'edit-users',
            'delete-users',
        ]);
        // Create a Role for user

        // $user->givePermissionTo('edit articles');


        $password = bcrypt('1234567890');
        User::factory()->create([
            "orgID" => 0,
            "firstName" => "chebicheb",
            "lastname" => "khiro",
            "username" => "khiro",
            "nationalID" => "1234567890",
            "email" => "test@gmail.com",
            "phone" => "0555555555",
            "address" => "test address",
            // "email_verified_at" => now(),
            "id_commune" => 1,
            "id_wilaya" => 1,
            "password" => $password
        ])->assignRole('super admin');

        Specialization::factory()->create([
            "specialization_name" => "Cardiology",
            "specialization_description" => "Heart Specialist"
        ]);

        Specialization::factory()->create([
            "specialization_name" => "Dermatology",
            "specialization_description" => "Skin Specialist"
        ]);

        Specialization::factory()->create([
            "specialization_name" => "Orthopedics",
            "specialization_description" => "Bone Specialist"
        ]);


        Patient::factory(10)->create();
        // Orge

        GeneralMedicalRecord::factory(1)->create();
        FamilyMember::factory(2)->create();
        EmergencyContact::factory(10)->create();
        CurrentMedication::factory(1)->create();
        family::factory()->create(["name" => 'father']);
        family::factory()->create(["name" => 'mother']);
        family::factory()->create(["name" => 'brother']);
        family::factory()->create(["name" => 'sisters']);
    }
}
