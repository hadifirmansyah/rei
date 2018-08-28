<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    // Provinces name to insert
    protected $provinces = ['Jawa Barat', 'Jawa Tengah', 'Jawa Timur', 'DKI Jakarta'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate Table
        \DB::table('provinces')->truncate();

        foreach($this->provinces as $province){
            \DB::table('provinces')->insert([
                'name' => $province
            ]);
        }
    }
}
