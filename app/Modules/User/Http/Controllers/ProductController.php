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
    public function index(Request $request, Product $products)
    {
        $param = $request->all();
        if (!empty($param['category_name'])) {
            $products = $products->whereHas('category', function($query) use ($param) {
                $query->where('name', 'like', '%'. $param['category_name'] .'%');
            });
        }

        if (!empty($param['q'])) {
            $products = $products->search($param['q']);
        }

        $products = $products->get();

        if ($request->ajax()) {
            return view('user::products.list', compact(['products']));            
        }
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
