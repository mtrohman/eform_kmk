<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuaranteeStatusRequest;
use App\Models\GuaranteeStatus;
use Exception;

class GuaranteeStatusController extends Controller
{
    public function __construct()
    {
        parent::__construct('guarantee_status');
    }

    public function index()
    {
        $data['guaranteeStatuses'] = GuaranteeStatus::latest()->paginate(10);
        return view('admin.guarantee_status.index', $data);
    }

    public function create()
    {
        return view('admin.guarantee_status.create');
    }

    public function store(GuaranteeStatusRequest $request)
    {
        try{
            $guaranteeStatus = GuaranteeStatus::create($request->all());

            $notification = array(
                'message' => 'Guarantee Status saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.guarantee-statuses.index')->with($notification);

        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );

            return redirect()->route('admin.guarantee-statuses.index')->with($notification);
        }
    }

    public function show(GuaranteeStatus $guaranteeStatus)
    {
        //
    }

    public function edit(GuaranteeStatus $guaranteeStatus)
    {
        $data['guaranteeStatus'] = $guaranteeStatus;
        return view('admin.guarantee_status.edit', $data);
    }

    public function update(GuaranteeStatusRequest $request, GuaranteeStatus $guaranteeStatus)
    {
        try {
            $guaranteeStatus = $guaranteeStatus->update($request->all());

            $notification = array(
                'message' => 'Guarantee Status saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.guarantee-statuses.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.guarantee-statuses.index')->with($notification);
        }
    }

    public function destroy(GuaranteeStatus $guaranteeStatus)
    {
        try{
            GuaranteeStatus::find($guaranteeStatus->id)->delete();

            $notification = array(
                'message' => 'Guarantee Status deleted successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.guarantee-statuses.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.guarantee-statuses.index')->with($notification);
        }
    }
}
