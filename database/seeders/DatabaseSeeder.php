<?php

namespace Database\Seeders;

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
        // $this->call([
        //     RoleAndPermissionSeeder::class,
        // ]);
        // this is old way to create

        Permission::create(['name' => 'create-admin']);
        Permission::create(['name' => 'edit-admin']);
        Permission::create(['name' => 'delete-admin']);
        // doctor
        Permission::create(['name' => 'create-doctor']);
        Permission::create(['name' => 'edit-doctor']);
        Permission::create(['name' => 'delete-doctor']);


        $superadminRole = Role::create(['name' => 'super-admin']);
        $adminRole = Role::create(['name' => 'admin']);

        $superadminRole->givePermissionTo([
            'create-admin',
            'edit-admin',
            'delete-admin',
            'create-doctor',
            'edit-doctor',
            'delete-doctor',
        ]);

        $adminRole->givePermissionTo([
            'edit-doctor',
            'delete-doctor',
        ]);
        $password = bcrypt('1234567890');
        User::factory()->create(["name" => "chebicheb", "username" => "khiro", "email" => "test@gmail.com", "password" => $password]);
        // \App\Models\User::factory(10)->create();
    }
}
