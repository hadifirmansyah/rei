<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Modules\Authentication\Models\User;
use App\Http\Requests\UserRequest;
use Sentinel;

class UserController extends Controller
{
    /**
     * Show index page of users.
     *
     * @return view
     **/
    public function index()
    {
        $users = User::all();
        return view('admin::users.index')->with([
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating new user.
     *
     * @return view
     **/
    public function create()
    {
        return view('admin::users.create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @return Response
     **/
    public function store(UserRequest $request)
    {
        $param = $request->except('_token');
        $param['password'] = User::DEFAULT_PASSWORD;
        $user = Sentinel::registerAndActivate($param);
        if ($user) {
            $role = Sentinel::findRoleBySlug('super-administrator');
            $role->users()->attach($user);
        }
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(User $user)
    {
        return view('admin::users.edit')->with([
            'user' => $user
        ]);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user = Sentinel::update($user, $request->all());
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(User $user)
    {
        if (!empty($user->roles[0])) {
            $role = Sentinel::findRoleById($user->roles[0]->id);
            $role->users()->detach($user);
        }
        $user->delete();
        return redirect()->route('admin.users.index');  
    }
}
