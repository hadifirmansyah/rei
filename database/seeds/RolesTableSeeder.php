<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate Table
        DB::table('role_users')->truncate();
        DB::table('roles')->truncate();

        // 
        DB::table('roles')->insert([
            [
                'name' => 'Super Administrator',
                'slug' => 'super-administrator',
            ],
            [
                'name' => 'User',
                'slug' => 'user',
            ]
        ]);
    }
}
