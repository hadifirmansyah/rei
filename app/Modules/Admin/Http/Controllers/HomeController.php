<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show dashboard.
     *
     * @return view
     **/
    public function index()
    {
        return view('admin::general.dashboard');
    }
}
