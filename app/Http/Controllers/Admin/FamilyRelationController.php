<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FamilyRelationRequest;
use App\Models\FamilyRelation;
use Exception;

class FamilyRelationController extends Controller
{
    public function __construct()
    {
        parent::__construct('family_relation');
    }

    public function index()
    {
        $data['familyRelations'] = FamilyRelation::latest()->paginate(10);
        return view('admin.family_relation.index', $data);
    }

    public function create()
    {
        return view('admin.family_relation.create');
    }

    public function store(FamilyRelationRequest $request)
    {
        try{
            $familyRelation = FamilyRelation::create($request->all());

            $notification = array(
                'message' => 'Family Relation saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.family-relations.index')->with($notification);

        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );

            return redirect()->route('admin.family-relations.index')->with($notification);
        }
    }

    public function show(FamilyRelation $familyRelation)
    {
        //
    }

    public function edit(FamilyRelation $familyRelation)
    {
        $data['familyRelation'] = $familyRelation;
        return view('admin.family_relation.edit', $data);
    }

    public function update(FamilyRelationRequest $request, FamilyRelation $familyRelation)
    {
        try {
            $familyRelation = $familyRelation->update($request->all());

            $notification = array(
                'message' => 'Family Relation saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.family-relations.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.family-relations.index')->with($notification);
        }
    }

    public function destroy(FamilyRelation $familyRelation)
    {
        try{
            FamilyRelation::find($familyRelation->id)->delete();

            $notification = array(
                'message' => 'Family Relation deleted successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.family-relations.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.family-relations.index')->with($notification);
        }
    }
}
