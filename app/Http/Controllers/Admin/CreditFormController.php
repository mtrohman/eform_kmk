<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreditFormRequest;
use App\Models\CreditForm;
use Exception;

class CreditFormController extends Controller
{
    public function __construct()
    {
        parent::__construct('credit_form');
    }

    public function index()
    {
        $data['creditForms'] = CreditForm::latest()->paginate(10);
        return view('admin.credit_form.index', $data);
    }

    public function create()
    {
        return view('admin.credit_form.create');
    }

    public function store(CreditFormRequest $request)
    {
        // return $request->all();
        try{
            $creditForm = CreditForm::create($request->all());

            $notification = array(
                'message' => 'Credit Form saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.credit-forms.index')->with($notification);

        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );

            return redirect()->route('admin.credit-forms.index')->with($notification);
        }
    }

    public function show(CreditForm $creditForm)
    {
        return $creditForm;
    }

    public function edit(CreditForm $creditForm)
    {
        $data['creditForm'] = $creditForm;
        return view('admin.credit_form.edit', $data);
    }

    public function update(CreditFormRequest $request, CreditForm $creditForm)
    {
        try {
            $creditForm = $creditForm->update($request->all());

            $notification = array(
                'message' => 'Credit Form saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.credit-forms.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.credit-forms.index')->with($notification);
        }
    }

    public function destroy(CreditForm $creditForm)
    {
        try{
            CreditForm::find($creditForm->id)->delete();

            $notification = array(
                'message' => 'Credit Form deleted successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.credit-forms.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.credit-forms.index')->with($notification);
        }
    }
}
