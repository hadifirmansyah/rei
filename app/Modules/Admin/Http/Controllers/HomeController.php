<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchasing;
use App\Modules\Authentication\Models\User;
use DB;

class HomeController extends Controller
{
    /**
     * Show dashboard.
     *
     * @return view
     **/
    public function index()
    {
        $data['count']['products'] = Product::count();
        $data['count']['purchasing'] = Purchasing::count();
        $data['count']['users'] = User::count();

        $data['monthly'] = Purchasing::selectRaw('MONTHNAME(created_at) as month, COUNT(*) as count')
                            ->groupBy(DB::raw('MONTHNAME(created_at)'))
                            ->get();

        return view('admin::general.dashboard')->with([
            'data' => $data
        ]);
    }
}
