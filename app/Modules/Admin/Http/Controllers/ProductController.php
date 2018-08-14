<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use Image;

class ProductController extends Controller
{
    /**
     * Show index page of products.
     *
     * @return view
     **/
    public function index()
    {
        $products = Product::all();
        return view('admin::products.index')->with([
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating new product.
     *
     * @return view
     **/
    public function create()
    {
        $categories = Category::pluck('name', 'id')->toArray();
        return view('admin::products.create')->with([
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created product in storage.
     *
     * @return Response
     **/
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $name = date('Y_m_d_His').'_'.$image->getClientOriginalName();
                $images[] = [
                    'product_id' => $product['id'],
                    'image' => $name,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                $folder_path = public_path('storage/product_images/');
                if (!file_exists($folder_path)) {
                    mkdir($folder_path, 0777);
                }
                $img = Image::make($image->getRealPath())->resize(450, null, function($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($folder_path.$name);
            }
            ProductImage::insert($images);
        };
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('name', 'id')->toArray();
        
        return view('admin::products.edit')->with([
            'categories' => $categories,
            'product' => $product
        ]);
    }

    /**
     * Update the specified product in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Product $product, Request $request)
    {        
        try {
            \DB::beginTransaction();
            $param = $request->except('_token', '_method');            
            $product->update($param);
            $images = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $name = date('Y_m_d_His').'_'.$image->getClientOriginalName();
                    $images[] = [
                        'product_id' => $product['id'],
                        'image' => $name,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                    $folder_path = public_path('storage/product_images/');
                    if (!file_exists($folder_path)) {
                        mkdir($folder_path, 0777);
                    }
                    $img = Image::make($image->getRealPath())->resize(450, null, function($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save($folder_path.$name);
                }
                ProductImage::insert($images);
            };
            if (!empty($param['deleted_images'])) {
                ProductImage::destroy($param['deleted_images']);
            }
            \DB::commit();
            return response()->default(200, 'Update Succesfully');
        } catch (\Exception $e) {
            \DB::rollback();     
            return response()->default(400, $e->getMessage());                               
        }
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');        
    }
}
