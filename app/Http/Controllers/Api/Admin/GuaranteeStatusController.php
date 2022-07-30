<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuaranteeStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\GuaranteeStatusResource;

class GuaranteeStatusController extends Controller
{
    public function __construct()
    {
        parent::__construct('guarantee_status', 1);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guaranteeStatuses = GuaranteeStatus::latest()->paginate(10);
        return GuaranteeStatusResource::collection($guaranteeStatuses);
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

        $guaranteeStatus = GuaranteeStatus::create($data);
        return new GuaranteeStatusResource($guaranteeStatus);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GuaranteeStatus  $guaranteeStatus
     * @return \Illuminate\Http\Response
     */
    public function show(GuaranteeStatus $guaranteeStatus)
    {
        return new GuaranteeStatusResource($guaranteeStatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GuaranteeStatus  $guaranteeStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GuaranteeStatus $guaranteeStatus)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $guaranteeStatus->update($request->all());
        return new GuaranteeStatusResource($guaranteeStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GuaranteeStatus  $guaranteeStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(GuaranteeStatus $guaranteeStatus)
    {
        $guaranteeStatus->delete();
        return new GuaranteeStatusResource($guaranteeStatus);
    }

    /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        $guaranteeStatuses = GuaranteeStatus::where('title', 'like', '%'.$title.'%')->get();
        return GuaranteeStatusResource::collection($guaranteeStatuses);
    }
}