<?php

namespace App\Modules\Authentication\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Sentinel;

class RegisterController extends Controller
{
    /**
     * Handle request register, redirect to register page.
     *
     * @return view
     **/
    public function register()
    {
        return view('authentication::register');
    }

    /**
     * Handle post register of user.
     *
     *
     * @param Illuminate\Http\Request $request.
     * @return view
     **/
    public function postRegister(Request $request)
    {
        $user = Sentinel::registerAndActivate($request->all());
        dd($user);
    }
}
