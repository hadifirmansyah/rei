<?php

namespace App\Modules\Authentication\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Sentinel;

class LoginController extends Controller
{
    /**
     * Show login page.
     *
     * @return view
     **/
    public function login()
    {
        return view('authentication::login');        
    }

    /**
     * Handle post request when user login.
     *
     *
     * @param Illuminate\Http\Request $request.
     * @return view
     **/
    public function postLogin(Request $request)
    {
        Sentinel::authenticate($request->all());

        return Sentinel::check();
    }
}
