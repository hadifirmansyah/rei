<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Purchasing;

class PurchasingController extends Controller
{
    /**
     * Show index page of purchasing.
     *
     * @return view
     **/
    public function index()
    {
        $purchasings = Purchasing::all();
        return view('admin::purchasings.index')->with([
            'purchasings' => $purchasings
        ]);
    }

    public function show(Purchasing $purchasing)
    {
        return view('admin::purchasings.show')->with([
            'purchasing' => $purchasing
        ]);
    }

    public function pay(Request $request)
    {
        $purchasing = Purchasing::where('id', $request['id'])->update([
            'status' => 1
        ]);
        return response()->default(200, 'Status Successfully Updated');  
    }

    public function print($month)
    {
        $purchasings = Purchasing::whereMonth('created_at', $month)->get();
        return view('admin::purchasings.general_report', compact(['purchasings', 'month']));
    }
}
