<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeFacility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\HomeFacilityResource;

class HomeFacilityController extends Controller
{
    public function __construct()
    {
        parent::__construct('home_facility', 1);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeFacilities = HomeFacility::latest()->paginate(10);
        return HomeFacilityResource::collection($homeFacilities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $homeFacility = HomeFacility::create($data);
        return new HomeFacilityResource($homeFacility);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeFacility  $homeFacility
     * @return \Illuminate\Http\Response
     */
    public function show(HomeFacility $homeFacility)
    {
        return new HomeFacilityResource($homeFacility);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeFacility  $homeFacility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeFacility $homeFacility)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $homeFacility->update($request->all());
        return new HomeFacilityResource($homeFacility);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeFacility  $homeFacility
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeFacility $homeFacility)
    {
        $homeFacility->delete();
        return new HomeFacilityResource($homeFacility);
    }

    /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        $homeFacilities = HomeFacility::where('title', 'like', '%'.$title.'%')->get();
        return HomeFacilityResource::collection($homeFacilities);
    }
}