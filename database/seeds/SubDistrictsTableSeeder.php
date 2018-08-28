<?php

use Illuminate\Database\Seeder;
use App\Models\City;

class SubDistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate Table
        \DB::table('sub_districts')->truncate();

        $city = City::first();
        
        $sub_districts = [
            [ 'city_id' => $city['id'], 'name'  => 'Panyileukan', 'charges' => 10000, 'est' => 1 ],
            [ 'city_id' => $city['id'], 'name'  => 'Cinambo', 'charges' => 10000, 'est' => 1 ],
            [ 'city_id' => $city['id'], 'name'  => 'Ujung Berung', 'charges' => 10000, 'est' => 1 ],
        ];

        \DB::table('sub_districts')->insert($sub_districts);
    }
}
