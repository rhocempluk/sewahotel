<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $permission1 = Permission::create(['name' => 'create users']);
        // $permission2 = Permission::create(['name' => 'edit users']);
        // $permission3 = Permission::create(['name' => 'delete users']);

        // $permission4 = Permission::create(['name' => 'create posts']);
        // $permission5 = Permission::create(['name' => 'edit posts']);
        // $permission6 = Permission::create(['name' => 'delete posts']);
        
        $adminRole = Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        $resepsionisRole = Role::create([
            'name' => 'resepsionis',
            'guard_name' => 'web'
        ]);

        $userRole = Role::create([
            'name' => 'user',
            'guard_name' => 'web'
        ]);

        // $adminRole->givePermissionTo(
        //     $permission1, $permission2
        // );

        // $resepsionisRole->givePermissionTo(
        //     $permission3, $permission4
        // );

        // $userRole->givePermissionTo(
        //     $permission1, $permission2
        // );
    }
}
