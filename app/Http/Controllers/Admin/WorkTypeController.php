<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkTypeRequest;
use App\Models\WorkType;
use Exception;

class WorkTypeController extends Controller
{
    public function __construct()
    {
        parent::__construct('work_type');
    }

    public function index()
    {
        $data['workTypes'] = WorkType::latest()->paginate(10);
        return view('admin.work_type.index', $data);
    }

    public function create()
    {
        return view('admin.work_type.create');
    }

    public function store(WorkTypeRequest $request)
    {
        try{
            $workType = WorkType::create($request->all());

            $notification = array(
                'message' => 'WorkType saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.work-types.index')->with($notification);

        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );

            return redirect()->route('admin.work-types.index')->with($notification);
        }
    }

    public function show(WorkType $workType)
    {
        //
    }

    public function edit(WorkType $workType)
    {
        $data['workType'] = $workType;
        return view('admin.work_type.edit', $data);
    }

    public function update(WorkTypeRequest $request, WorkType $workType)
    {
        try {
            $workType = $workType->update($request->all());

            $notification = array(
                'message' => 'WorkType saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.work-types.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.work-types.index')->with($notification);
        }
    }

    public function destroy(WorkType $workType)
    {
        try{
            WorkType::find($workType->id)->delete();

            $notification = array(
                'message' => 'WorkType deleted successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.work-types.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.work-types.index')->with($notification);
        }
    }
}
