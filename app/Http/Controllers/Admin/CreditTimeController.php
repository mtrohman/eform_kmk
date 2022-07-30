<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreditTimeRequest;
use App\Models\CreditTime;
use Exception;

class CreditTimeController extends Controller
{
    public function __construct()
    {
        parent::__construct('credit_time');
    }

    public function index()
    {
        $data['creditTimes'] = CreditTime::latest()->paginate(10);
        return view('admin.credit_time.index', $data);
    }

    public function create()
    {
        return view('admin.credit_time.create');
    }

    public function store(CreditTimeRequest $request)
    {
        try{
            $creditTime = CreditTime::create($request->all());

            $notification = array(
                'message' => 'Credit Time saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.credit-times.index')->with($notification);

        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );

            return redirect()->route('admin.credit-times.index')->with($notification);
        }
    }

    public function show(CreditTime $creditTime)
    {
        //
    }

    public function edit(CreditTime $creditTime)
    {
        $data['creditTime'] = $creditTime;
        return view('admin.credit_time.edit', $data);
    }

    public function update(CreditTimeRequest $request, CreditTime $creditTime)
    {
        try {
            $creditTime = $creditTime->update($request->all());

            $notification = array(
                'message' => 'Credit Time saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.credit-times.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.credit-times.index')->with($notification);
        }
    }

    public function destroy(CreditTime $creditTime)
    {
        try{
            CreditTime::find($creditTime->id)->delete();

            $notification = array(
                'message' => 'Credit Time deleted successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.credit-times.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.credit-times.index')->with($notification);
        }
    }
}
