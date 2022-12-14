<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
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
        // Membuat role admin
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->save();
        // Membuat role member
        $memberRole = new Role();
        $memberRole->name = "staff";
        $memberRole->display_name = "Staff";
        $memberRole->save();
        // Membuat sample admin
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('qwerty');
        $admin->save();
        $admin->attachRole($adminRole);
        // Membuat sample member
        $member = new User();
        $member->name = "Staff";
        $member->email = 'staff@gmail.com';
        $member->password = bcrypt('qwerty');
        $member->save();
        $member->attachRole($memberRole);
   }
}
