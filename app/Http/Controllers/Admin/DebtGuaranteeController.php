<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DebtGuaranteeRequest;
use App\Models\DebtGuarantee;
use Exception;

class DebtGuaranteeController extends Controller
{
    public function __construct()
    {
        parent::__construct('debt_guarantee');
    }

    public function index()
    {
        $data['debtGuarantees'] = DebtGuarantee::latest()->paginate(10);
        return view('admin.debt_guarantee.index', $data);
    }

    public function create()
    {
        return view('admin.debt_guarantee.create');
    }

    public function store(DebtGuaranteeRequest $request)
    {
        try{
            $debtGuarantee = DebtGuarantee::create($request->all());

            $notification = array(
                'message' => 'Debt Guarantee saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.debt-guarantees.index')->with($notification);

        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );

            return redirect()->route('admin.debt-guarantees.index')->with($notification);
        }
    }

    public function show(DebtGuarantee $debtGuarantee)
    {
        //
    }

    public function edit(DebtGuarantee $debtGuarantee)
    {
        $data['debtGuarantee'] = $debtGuarantee;
        return view('admin.debt_guarantee.edit', $data);
    }

    public function update(DebtGuaranteeRequest $request, DebtGuarantee $debtGuarantee)
    {
        try {
            $debtGuarantee = $debtGuarantee->update($request->all());

            $notification = array(
                'message' => 'Debt Guarantee saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.debt-guarantees.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.debt-guarantees.index')->with($notification);
        }
    }

    public function destroy(DebtGuarantee $debtGuarantee)
    {
        try{
            DebtGuarantee::find($debtGuarantee->id)->delete();

            $notification = array(
                'message' => 'Debt Guarantee deleted successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.debt-guarantees.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.debt-guarantees.index')->with($notification);
        }
    }
}
