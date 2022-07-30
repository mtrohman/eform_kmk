<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\PurposeUsage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PurposeUsageResource;

class PurposeUsageController extends Controller
{
    public function __construct()
    {
        parent::__construct('purpose_usage', 1);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purposeUsages = PurposeUsage::latest()->paginate(10);
        return PurposeUsageResource::collection($purposeUsages);
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

        $purposeUsage = PurposeUsage::create($data);
        return new PurposeUsageResource($purposeUsage);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurposeUsage  $purposeUsage
     * @return \Illuminate\Http\Response
     */
    public function show(PurposeUsage $purposeUsage)
    {
        return new PurposeUsageResource($purposeUsage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurposeUsage  $purposeUsage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurposeUsage $purposeUsage)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $purposeUsage->update($request->all());
        return new PurposeUsageResource($purposeUsage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurposeUsage  $purposeUsage
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurposeUsage $purposeUsage)
    {
        $purposeUsage->delete();
        return new PurposeUsageResource($purposeUsage);
    }

    /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        $purposeUsages = PurposeUsage::where('title', 'like', '%'.$title.'%')->get();
        return PurposeUsageResource::collection($purposeUsages);
    }
}