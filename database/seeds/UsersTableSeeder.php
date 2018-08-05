<?php

use Illuminate\Database\Seeder;
use Sentinel as Sentinel;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate Table
        DB::table('activations')->truncate();
        DB::table('persistences')->truncate();
        DB::table('reminders')->truncate();
        DB::table('role_users')->truncate();
        DB::table('throttle')->truncate();
        DB::table('users')->truncate();

        // 
        $superadmin = Sentinel::registerAndActivate([
            'email' => 'admin@rei.apps',
            'password' => '12345678',
            'first_name' => 'Admin',
            'last_name' => 'Rei',
            'phone_number'=>'082216912584',
        ]);

        Sentinel::findRoleBySlug('super-administrator')->users()->attach(Sentinel::findById($superadmin->id));
    }
}
