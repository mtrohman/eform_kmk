<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\DebtGuarantee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\DebtGuaranteeResource;

class DebtGuaranteeController extends Controller
{
    public function __construct()
    {
        parent::__construct('debt_guarantee', 1);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $debtGuarantees = DebtGuarantee::latest()->paginate(10);
        return DebtGuaranteeResource::collection($debtGuarantees);
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

        $debtGuarantee = DebtGuarantee::create($data);
        return new DebtGuaranteeResource($debtGuarantee);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DebtGuarantee  $debtGuarantee
     * @return \Illuminate\Http\Response
     */
    public function show(DebtGuarantee $debtGuarantee)
    {
        return new DebtGuaranteeResource($debtGuarantee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DebtGuarantee  $debtGuarantee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DebtGuarantee $debtGuarantee)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $debtGuarantee->update($request->all());
        return new DebtGuaranteeResource($debtGuarantee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DebtGuarantee  $debtGuarantee
     * @return \Illuminate\Http\Response
     */
    public function destroy(DebtGuarantee $debtGuarantee)
    {
        $debtGuarantee->delete();
        return new DebtGuaranteeResource($debtGuarantee);
    }

    /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        $debtGuarantees = DebtGuarantee::where('title', 'like', '%'.$title.'%')->get();
        return DebtGuaranteeResource::collection($debtGuarantees);
    }
}