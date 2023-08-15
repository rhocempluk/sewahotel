<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([ 'name' => 'admin', 'email' => 'adminhotel@gmail.com', 'password' => bcrypt('1234567890'), ]); 
        $admin->assignRole('admin');

        $resepsionis = User::create([ 'name' => 'resepsionis', 'email' => 'resepsionishotel@gmail.com', 'password' => bcrypt('1234567890'), ]); 
        $resepsionis->assignRole('resepsionis');

        $user = User::create([ 'name' => 'user', 'email' => 'userhotel@gmail.com', 'password' => bcrypt('1234567890'), ]); 
        $user->assignRole('user');
    }
}
