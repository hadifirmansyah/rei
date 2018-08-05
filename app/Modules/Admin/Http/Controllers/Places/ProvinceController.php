<?php

namespace App\Modules\Admin\Http\Controllers\Places;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProvinceRequest;
use App\Models\Province;

class ProvinceController extends Controller
{
    /**
     * Show index page of provinces.
     *
     * @return view
     **/
    public function index()
    {
        $provinces = Province::all();
        return view('admin::places.provinces.index')->with([
            'provinces' => $provinces
        ]);
    }

    /**
     * Show the form for creating new province.
     *
     * @return view
     **/
    public function create()
    {
        return view('admin::places.provinces.create');
    }

    /**
     * Store a newly created province in storage.
     *
     * @return Response
     **/
    public function store(ProvinceRequest $request)
    {
        $province = Province::create($request->all());
        return redirect()->route('admin.places.provinces.index');
    }

    /**
     * Display the specified province.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified province.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Province $province)
    {
        return view('admin::places.provinces.edit')->with([
            'province' => $province
        ]);
    }

    /**
     * Update the specified province in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(ProvinceRequest $request, Province $province)
    {
        $province->update($request->all());
        return redirect()->route('admin.places.provinces.index');
    }

    /**
     * Remove the specified province from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Province $province)
    {
        $province->delete();
        return redirect()->route('admin.places.provinces.index');  
    }
}
