<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomeOwnershipStatusRequest;
use App\Models\HomeOwnershipStatus;
use Exception;

class HomeOwnershipStatusController extends Controller
{
    public function __construct()
    {
        parent::__construct('home_ownership_status');
    }

    public function index()
    {
        $data['homeOwnershipStatuses'] = HomeOwnershipStatus::latest()->paginate(10);
        return view('admin.home_ownership_status.index', $data);
    }

    public function create()
    {
        return view('admin.home_ownership_status.create');
    }

    public function store(HomeOwnershipStatusRequest $request)
    {
        try{
            $homeOwnershipStatus = HomeOwnershipStatus::create($request->all());

            $notification = array(
                'message' => 'Home Ownership Status saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.home-ownership-statuses.index')->with($notification);

        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );

            return redirect()->route('admin.home-ownership-statuses.index')->with($notification);
        }
    }

    public function show(HomeOwnershipStatus $homeOwnershipStatus)
    {
        //
    }

    public function edit(HomeOwnershipStatus $homeOwnershipStatus)
    {
        $data['homeOwnershipStatus'] = $homeOwnershipStatus;
        return view('admin.home_ownership_status.edit', $data);
    }

    public function update(HomeOwnershipStatusRequest $request, HomeOwnershipStatus $homeOwnershipStatus)
    {
        try {
            $homeOwnershipStatus = $homeOwnershipStatus->update($request->all());

            $notification = array(
                'message' => 'Home Ownership Status saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.home-ownership-statuses.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.home-ownership-statuses.index')->with($notification);
        }
    }

    public function destroy(HomeOwnershipStatus $homeOwnershipStatus)
    {
        try{
            HomeOwnershipStatus::find($homeOwnershipStatus->id)->delete();

            $notification = array(
                'message' => 'Home Ownership Status deleted successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.home-ownership-statuses.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.home-ownership-statuses.index')->with($notification);
        }
    }
}
