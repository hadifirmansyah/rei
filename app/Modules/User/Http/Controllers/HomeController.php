<?php

namespace App\Modules\User\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Show landing page.
     *
     * @return view
     **/
    public function index()
    {
        return view('user::general.home');
    }

    /**
     * Show main shop page.
     *
     * @return view
     **/
    public function shop()
    {
        $products = Product::all();
        return view('user::general.shop', compact(['products']));
    }
}
