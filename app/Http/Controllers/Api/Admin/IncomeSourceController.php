<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\IncomeSource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\IncomeSourceResource;

class IncomeSourceController extends Controller
{
    public function __construct()
    {
        parent::__construct('income_source', 1);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomeSources = IncomeSource::latest()->paginate(10);
        return IncomeSourceResource::collection($incomeSources);
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

        $incomeSource = IncomeSource::create($data);
        return new IncomeSourceResource($incomeSource);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IncomeSource  $incomeSource
     * @return \Illuminate\Http\Response
     */
    public function show(IncomeSource $incomeSource)
    {
        return new IncomeSourceResource($incomeSource);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IncomeSource  $incomeSource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IncomeSource $incomeSource)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $incomeSource->update($request->all());
        return new IncomeSourceResource($incomeSource);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncomeSource  $incomeSource
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncomeSource $incomeSource)
    {
        $incomeSource->delete();
        return new IncomeSourceResource($incomeSource);
    }

    /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        $incomeSources = IncomeSource::where('title', 'like', '%'.$title.'%')->get();
        return IncomeSourceResource::collection($incomeSources);
    }
}