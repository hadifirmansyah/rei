<?php

namespace App\Modules\User\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Purchasing;
use App\Models\PurchasingDetail;

class PurchasingController extends Controller
{
    /**
     * Store purchasing.
     *
     * @param  Request
     * @return Response
     */
    public function store(Request $request)
    {
        try {
            \DB::beginTransaction();
            $param = $request->except('_token');
            $purchasing = Purchasing::create($param); 
            $carts = Cart::where('user_id', $param['user_id']);
            foreach($carts->get() as $cart){
                $cart = $cart->only(['product_id', 'price', 'discount', 'quantity']);
                $cart['purchasing_id'] = $purchasing['id'];
                PurchasingDetail::create($cart);
            }
            $carts->delete();
            \DB::commit();                   
        } catch (\Exception $e) {
            \DB::rollback();                        
            dd($e->getMessage());
        }
        return redirect()->route('home');  
    }
}
