<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\IncomeSourceRequest;
use App\Models\IncomeSource;
use Exception;

class IncomeSourceController extends Controller
{
    public function __construct()
    {
        parent::__construct('income_source');
    }

    public function index()
    {
        $data['incomeSources'] = IncomeSource::latest()->paginate(10);
        return view('admin.income_source.index', $data);
    }

    public function create()
    {
        return view('admin.income_source.create');
    }

    public function store(IncomeSourceRequest $request)
    {
        try{
            $incomeSource = IncomeSource::create($request->all());

            $notification = array(
                'message' => 'Income Source saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.income-sources.index')->with($notification);

        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );

            return redirect()->route('admin.income-sources.index')->with($notification);
        }
    }

    public function show(IncomeSource $incomeSource)
    {
        //
    }

    public function edit(IncomeSource $incomeSource)
    {
        $data['incomeSource'] = $incomeSource;
        return view('admin.income_source.edit', $data);
    }

    public function update(IncomeSourceRequest $request, IncomeSource $incomeSource)
    {
        try {
            $incomeSource = $incomeSource->update($request->all());

            $notification = array(
                'message' => 'Income Source saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.income-sources.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.income-sources.index')->with($notification);
        }
    }

    public function destroy(IncomeSource $incomeSource)
    {
        try{
            IncomeSource::find($incomeSource->id)->delete();

            $notification = array(
                'message' => 'Income Source deleted successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.income-sources.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.income-sources.index')->with($notification);
        }
    }
}
