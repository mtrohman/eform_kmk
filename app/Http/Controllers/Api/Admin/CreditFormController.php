<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\CreditForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CreditFormResource;

class CreditFormController extends Controller
{
    public function __construct()
    {
        parent::__construct('credit_form', 1);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creditForms = CreditForm::latest()->paginate(10);
        return CreditFormResource::collection($creditForms);
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

        $creditForm = CreditForm::create($data);
        return new CreditFormResource($creditForm);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CreditForm  $creditForm
     * @return \Illuminate\Http\Response
     */
    public function show(CreditForm $creditForm)
    {
        return new CreditFormResource($creditForm);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CreditForm  $creditForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CreditForm $creditForm)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $creditForm->update($request->all());
        return new CreditFormResource($creditForm);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CreditForm  $creditForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreditForm $creditForm)
    {
        $creditForm->delete();
        return new CreditFormResource($creditForm);
    }

    /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        $creditForms = CreditForm::where('title', 'like', '%'.$title.'%')->get();
        return CreditFormResource::collection($creditForms);
    }
}