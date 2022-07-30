<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\FamilyRelation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\FamilyRelationResource;

class FamilyRelationController extends Controller
{
    public function __construct()
    {
        parent::__construct('family_relation', 1);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $familyRelations = FamilyRelation::latest()->paginate(10);
        return FamilyRelationResource::collection($familyRelations);
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

        $familyRelation = FamilyRelation::create($data);
        return new FamilyRelationResource($familyRelation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FamilyRelation  $familyRelation
     * @return \Illuminate\Http\Response
     */
    public function show(FamilyRelation $familyRelation)
    {
        return new FamilyRelationResource($familyRelation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FamilyRelation  $familyRelation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FamilyRelation $familyRelation)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $familyRelation->update($request->all());
        return new FamilyRelationResource($familyRelation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FamilyRelation  $familyRelation
     * @return \Illuminate\Http\Response
     */
    public function destroy(FamilyRelation $familyRelation)
    {
        $familyRelation->delete();
        return new FamilyRelationResource($familyRelation);
    }

    /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        $familyRelations = FamilyRelation::where('title', 'like', '%'.$title.'%')->get();
        return FamilyRelationResource::collection($familyRelations);
    }
}