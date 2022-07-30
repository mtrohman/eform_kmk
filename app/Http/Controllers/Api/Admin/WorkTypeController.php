<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\WorkTypeResource;

class WorkTypeController extends Controller
{
    public function __construct()
    {
        parent::__construct('work_type', 1);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workTypes = WorkType::latest()->paginate(10);
        return WorkTypeResource::collection($workTypes);
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

        $workType = WorkType::create($data);
        return new WorkTypeResource($workType);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkType  $workType
     * @return \Illuminate\Http\Response
     */
    public function show(WorkType $workType)
    {
        return new WorkTypeResource($workType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkType  $workType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkType $workType)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $workType->update($request->all());
        return new WorkTypeResource($workType);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkType  $workType
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkType $workType)
    {
        $workType->delete();
        return new WorkTypeResource($workType);
    }

    /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        $workTypes = WorkType::where('title', 'like', '%'.$title.'%')->get();
        return WorkTypeResource::collection($workTypes);
    }
}