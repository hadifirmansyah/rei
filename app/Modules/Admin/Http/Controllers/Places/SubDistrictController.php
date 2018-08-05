<?php

namespace App\Modules\Admin\Http\Controllers\Places;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\SubDistrict;
use App\Http\Requests\SubDistrictRequest;

class SubDistrictController extends Controller
{
    /**
     * Show index page of cities.
     *
     * @return view
     **/
    public function index()
    {
        $sub_districts = SubDistrict::all();
        return view('admin::places.sub_districts.index')->with([
            'sub_districts' => $sub_districts
        ]);
    }

    /**
     * Show the form for creating new sub_districts.
     *
     * @return view
     **/
    public function create()
    {
        $cities = City::pluck('name', 'id')->toArray();        
        return view('admin::places.sub_districts.create')->with([
            'cities' => $cities
        ]);
    }

    /**
     * Store a newly created sub_districts in storage.
     *
     * @return Response
     **/
    public function store(SubDistrictRequest $request)
    {        
        $sub_district = SubDistrict::create($request->all());
        return redirect()->route('admin.places.sub_districts.index');
    }

    /**
     * Display the specified city.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified sub_districts.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(SubDistrict $sub_district)
    {
        $cities = City::pluck('name', 'id')->toArray();                
        return view('admin::places.sub_districts.edit')->with([
            'cities' => $cities,
            'sub_district' => $sub_district
        ]);
    }

    /**
     * Update the specified sub_districts in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(SubDistrictRequest $request, SubDistrict $sub_district)
    {
        $sub_district->update($request->all());
        return redirect()->route('admin.places.sub_districts.index');
    }

    /**
     * Remove the specified sub_districts from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(SubDistrict $sub_district)
    {
        $sub_district->delete();
        return redirect()->route('admin.places.sub_districts.index');  
    }

    /**
     * Search sub districts for select2.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws $exception 
     */
    public function find(Request $request, SubDistrict $sub_districts)
    {
        try {
            $sub_districts = $sub_districts->select('id', 'name', 'charges')
                ->where('city_id', $request->id)->get();

            return response()->json($sub_districts);
        } catch (\Exception $exception) {
            return response()->default(400, $exception->getMessage());
        }
    }
}
