<?php

namespace App\Modules\User\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Purchasing;
use App\Models\PurchasingDetail;
use App\Models\Confirmation;
use Image;

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
            send_email('user::emails.confirmation', $purchasing, 'Confirmation Order');
            \DB::commit();                   
        } catch (\Exception $e) {
            \DB::rollback();                        
            dd($e->getMessage());
        }
        return redirect()->route('home');  
    }

    public function confirmation(Purchasing $purchasing)
    {
        return view('user::purchasing.confirmation', compact(['purchasing']));
    }

    public function postConfirmation(Request $request)
    {
        try {
            \DB::beginTransaction();
            $param = $request->except('_token');
            if ($request->hasFile('image')) {
                $param['image'] = date('Y_m_d_His').'_'.$request->image->getClientOriginalName();
                $folder_path = public_path('storage/confirmation_images/');
                if (!file_exists($folder_path)) {
                    mkdir($folder_path, 0777, TRUE);
                }
                $img = Image::make($request->image->getRealPath())->resize(450, null, function($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($folder_path.$param['image']);
            };
            $confirmation = Confirmation::create($param);
            \DB::commit();    
            return response()->default(200, 'Confirmation Successfully Saved');                             
        } catch (\Exception $e) {
            \DB::rollback();                        
            dd($e->getMessage());
        }
    }
}
