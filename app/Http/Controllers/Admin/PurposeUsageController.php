<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurposeUsageRequest;
use App\Models\PurposeUsage;
use Exception;

class PurposeUsageController extends Controller
{
    public function __construct()
    {
        parent::__construct('purpose_usage');
    }

    public function index()
    {
        $data['purposeUsages'] = PurposeUsage::latest()->paginate(10);
        return view('admin.purpose_usage.index', $data);
    }

    public function create()
    {
        return view('admin.purpose_usage.create');
    }

    public function store(PurposeUsageRequest $request)
    {
        try{
            $purposeUsage = PurposeUsage::create($request->all());

            $notification = array(
                'message' => 'Purpose Usage saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.purpose-usages.index')->with($notification);

        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );

            return redirect()->route('admin.purpose-usages.index')->with($notification);
        }
    }

    public function show(PurposeUsage $purposeUsage)
    {
        //
    }

    public function edit(PurposeUsage $purposeUsage)
    {
        $data['purposeUsage'] = $purposeUsage;
        return view('admin.purpose_usage.edit', $data);
    }

    public function update(PurposeUsageRequest $request, PurposeUsage $purposeUsage)
    {
        try {
            $purposeUsage = $purposeUsage->update($request->all());

            $notification = array(
                'message' => 'Purpose Usage saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.purpose-usages.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.purpose-usages.index')->with($notification);
        }
    }

    public function destroy(PurposeUsage $purposeUsage)
    {
        try{
            PurposeUsage::find($purposeUsage->id)->delete();

            $notification = array(
                'message' => 'Purpose Usage deleted successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.purpose-usages.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.purpose-usages.index')->with($notification);
        }
    }
}
