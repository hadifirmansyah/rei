<?php

namespace App\Modules\User\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Sentinel;

class RegisterController extends Controller
{
    /**
     * Show the form for creating new user.
     *
     * @return view
     **/
    public function register()
    {
        return view('user::auth.register');
    }

    /**
     * Handle post register of user.
     *
     *
     * @param Illuminate\Http\Request $request.
     * @return view
     **/
    public function postRegister(UserRequest $request)
    {
        $param = $request->except('_token');
        $user = Sentinel::registerAndActivate($param);
        if ($user) {
            $role = Sentinel::findRoleBySlug('user');
            $role->users()->attach($user);
        }
    }
}
