<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\CreditTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CreditTimeResource;

class CreditTimeController extends Controller
{
    public function __construct()
    {
        parent::__construct('credit_time', 1);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creditTimes = CreditTime::latest()->paginate(10);
        return CreditTimeResource::collection($creditTimes);
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

        $creditTime = CreditTime::create($data);
        return new CreditTimeResource($creditTime);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CreditTime  $creditTime
     * @return \Illuminate\Http\Response
     */
    public function show(CreditTime $creditTime)
    {
        return new CreditTimeResource($creditTime);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CreditTime  $creditTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CreditTime $creditTime)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $creditTime->update($request->all());
        return new CreditTimeResource($creditTime);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CreditTime  $creditTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreditTime $creditTime)
    {
        $creditTime->delete();
        return new CreditTimeResource($creditTime);
    }

    /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        $creditTimes = CreditTime::where('title', 'like', '%'.$title.'%')->get();
        return CreditTimeResource::collection($creditTimes);
    }
}