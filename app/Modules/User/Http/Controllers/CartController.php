<?php

namespace App\Modules\User\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Province;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', user()->id)->get();
        return view('user::purchasing.cart', compact(['carts']));        
    }

    /**
     * Add product to cart.
     *
     * @param  Request
     * @return Response
     */
    public function store(Request $request)
    {
        $param = $request->except('_token');
        $cart = Cart::create($param);
        return response()->default(200, 'Product Successfully Added');  
    }

    /**
     * Count cart.
     *
     * @param  int $user_id
     * @return Response
     */
    public function count($id)
    {
        $count = Cart::where('user_id', $id)->count();
        return response()->default(200, 'Get Data Successfully', ['count' => $count]);  
    }

    public function checkout() {
        $carts = Cart::where('user_id', user()->id)->get();
        $provinces = Province::all();
        return view('user::purchasing.checkout', compact(['carts', 'provinces'])); 
    }

}
