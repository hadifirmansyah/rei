<?php

namespace App\Modules\User\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Show main products page.
     *
     * @return view
     **/
    public function index()
    {
        $products = Product::all();
        return view('user::products.index', compact(['products']));
    }

    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Product $product)
    {
        return view('user::products.show', compact(['product']));        
    }
}
