<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    // Categories name to insert
    protected $categories = ['Bags','Jackets','T-Shirt','Hats'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate Table
        DB::table('categories')->truncate();

        foreach($this->categories as $category){
            DB::table('categories')->insert([
                'name' => $category
            ]);
        }
    }
}
