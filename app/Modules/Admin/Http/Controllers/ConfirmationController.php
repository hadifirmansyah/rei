<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Confirmation;

class ConfirmationController extends Controller
{
    /**
     * Show index page of confirmation.
     *
     * @return view
     **/
    public function index()
    {
        $confirmations = Confirmation::all();
        return view('admin::confirmations.index')->with([
            'confirmations' => $confirmations
        ]);
    }

    public function show(Confirmation $confirmation)
    {
        return view('admin::confirmations.show')->with([
            'confirmation' => $confirmation
        ]);
    }
}
