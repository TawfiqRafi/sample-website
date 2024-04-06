<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Super Admin
        $superAdmin = new User();
        $superAdmin->name = 'Super Admin';
        $superAdmin->email = 'superadmin@mx.dev';
        $superAdmin->password = bcrypt('password');
        $superAdmin->save();

        // Admin
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@mx.dev';
        $admin->password = bcrypt('password');
        $admin->save();
    }
}
