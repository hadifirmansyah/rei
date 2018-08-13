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
        try {
            $remember = (bool) $request->input('remember_me');
            $user = Sentinel::authenticate($request->all(), $remember);
            if (!$user) {
                flash()->error('User not registered!');
                return redirect()->route('auth.login')->withInput();
            } else {
                if (!$user->inRole('super-administrator')) {
                    Sentinel::logout();
                    flash()->error('You are not granted!');
                    return redirect()->route('auth.login')->withInput();
                }
            }
            return redirect()->route('admin.dashboard');
        } catch (ThrottlingException $e) {
            flash()->error('Too many attempts!');
        } catch (NotActivatedException $e) {
            flash()->error('Please activate your account before trying to log in.');
        }
    }

    /**
     * Handle logout request.
     * 
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Sentinel::logout();

        return redirect()->route('auth.login');
    }
}
