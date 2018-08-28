<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use Image as Image;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $products = [
                [
                    'name' => 'REI Co-op Stuff Ruin Bag',
                    'image' => 'b-1-1.jpg',
                ],
                [
                    'name' => 'REI Co-op Stuff Travel Daypack',
                    'image' => 'b-2-1.jpg',
                ],
                [
                    'name' => 'REI Co-op Stuff Len Bag',
                    'image' => 'b-3-1.jpg',
                ],
                [
                    'name' => 'REI Co-op Stuff Most Daypack',
                    'image' => 'b-4-1.jpg',
                ]
            ];

            $category = Category::first();
            
            \DB::beginTransaction();
            $folder_path = public_path('storage/product_images/');

            if (!file_exists($folder_path)) {
                mkdir($folder_path, 0777);
            }
            foreach ($products as $key => $value) {
                
                $product = Product::create([
                    'product_code' => 'R0104081800'.++$key,
                    'name' => $value['name'],
                    'description' => 'Durable lightweight ripstop nylon compacts easily for packing or storage but is hardy enough for the rigors of travel. Rucksack-style pack with top pocket and drawcord. Pack folds up into its own zippered stuff pocket for easy transport or storage. Side mesh pockets with elastic closures hold water bottles and allow easy access to small essentials.',
                    'price' => '200000',
                    'discount' => '20',
                    'stock' => '20',
                    'category_id' => $category['id'],
                ]);

                ProductImage::create([
                    'product_id' => $product['id'],
                    'image' => $value['image'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $img = Image::make(public_path('assets/front/img/product-img/').$value['image'])->resize(450, null, function($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($folder_path.$value['image']);
            }
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();     
        }
    }
}
