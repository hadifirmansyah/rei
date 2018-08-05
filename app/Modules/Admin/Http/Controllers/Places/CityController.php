<?php

namespace App\Modules\Admin\Http\Controllers\Places;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Http\Requests\CityRequest;
use App\Models\City;

class CityController extends Controller
{
    /**
     * Show index page of cities.
     *
     * @return view
     **/
    public function index()
    {
        $cities = City::all();
        return view('admin::places.cities.index')->with([
            'cities' => $cities
        ]);
    }

    /**
     * Show the form for creating new city.
     *
     * @return view
     **/
    public function create()
    {
        $provinces = Province::pluck('name', 'id')->toArray();        
        return view('admin::places.cities.create')->with([
            'provinces' => $provinces
        ]);
    }

    /**
     * Store a newly created city in storage.
     *
     * @return Response
     **/
    public function store(CityRequest $request)
    {        
        $city = City::create($request->all());
        return redirect()->route('admin.places.cities.index');
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
     * Show the form for editing the specified city.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(City $city)
    {
        $provinces = Province::pluck('name', 'id')->toArray();                
        return view('admin::places.cities.edit')->with([
            'city' => $city,
            'provinces' => $provinces
        ]);
    }

    /**
     * Update the specified city in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(CityRequest $request, City $city)
    {
        $city->update($request->all());
        return redirect()->route('admin.places.cities.index');
    }

    /**
     * Remove the specified city from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('admin.places.cities.index');  
    }

    /**
     * Search city for select2.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws $exception 
     */
    public function find(Request $request, City $cities)
    {
        try {
            $cities = $cities->select('id', 'name')
                ->where('province_id', $request->id)->get();
            
            // $formatted_cities = [];
            // foreach ($cities as $city) {
            //     $formatted_cities[] = ['id' => $city->id, 'text' => $city->name];
            // }

            return response()->json($cities);
        } catch (\Exception $exception) {
            return response()->default(400, $exception->getMessage());
        }
    }
}
