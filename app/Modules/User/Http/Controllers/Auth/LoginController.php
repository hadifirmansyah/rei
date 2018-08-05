<?php

namespace App\Modules\User\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Sentinel;

class LoginController extends Controller
{
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
                return response()->json([
                    'code' => 400,
                    'error' => true,
                    'message' => "Email or Password is incorrect!"
                ], 400);
            } else {
                if ($user->inRole('super-administrator')) {
                    Sentinel::logout();
                    return response()->json([
                        'code' => 400,
                        'error' => true,
                        'message' => "You're not granted"
                    ], 400);
                }
                return response()->json([
                    'code' => 200,
                    'error' => false,
                    'message' => "Login Success"
                ], 200);
            }
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

        return redirect()->route('home');
    }
}
