<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeOwnershipStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\HomeOwnershipStatusResource;

class HomeOwnershipStatusController extends Controller
{
    public function __construct()
    {
        parent::__construct('home_ownership_status', 1);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeOwnershipStatuses = HomeOwnershipStatus::latest()->paginate(10);
        return HomeOwnershipStatusResource::collection($homeOwnershipStatuses);
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

        $homeOwnershipStatus = HomeOwnershipStatus::create($data);
        return new HomeOwnershipStatusResource($homeOwnershipStatus);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeOwnershipStatus  $homeOwnershipStatus
     * @return \Illuminate\Http\Response
     */
    public function show(HomeOwnershipStatus $homeOwnershipStatus)
    {
        return new HomeOwnershipStatusResource($homeOwnershipStatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeOwnershipStatus  $homeOwnershipStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeOwnershipStatus $homeOwnershipStatus)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $homeOwnershipStatus->update($request->all());
        return new HomeOwnershipStatusResource($homeOwnershipStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeOwnershipStatus  $homeOwnershipStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeOwnershipStatus $homeOwnershipStatus)
    {
        $homeOwnershipStatus->delete();
        return new HomeOwnershipStatusResource($homeOwnershipStatus);
    }

    /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        $homeOwnershipStatuses = HomeOwnershipStatus::where('title', 'like', '%'.$title.'%')->get();
        return HomeOwnershipStatusResource::collection($homeOwnershipStatuses);
    }
}