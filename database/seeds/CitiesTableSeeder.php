<?php

use Illuminate\Database\Seeder;
use App\Models\Province;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate Table
        \DB::table('cities')->truncate();

        $province = Province::first();
        
        $cities = [
            [ 'province_id' => $province['id'], 'name'  => 'Bandung' ],
            [ 'province_id' => $province['id'], 'name'  => 'Cimahi' ],
            [ 'province_id' => $province['id'], 'name'  => 'Garut' ],
        ];

        \DB::table('cities')->insert($cities);
    }
}
