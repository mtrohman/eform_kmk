<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomeFacilityRequest;
use App\Models\HomeFacility;
use Exception;

class HomeFacilityController extends Controller
{
    public function __construct()
    {
        parent::__construct('home_facility');
    }

    public function index()
    {
        $data['homeFacilities'] = HomeFacility::latest()->paginate(10);
        return view('admin.home_facility.index', $data);
    }

    public function create()
    {
        return view('admin.home_facility.create');
    }

    public function store(HomeFacilityRequest $request)
    {
        try{
            $homeFacility = HomeFacility::create($request->all());

            $notification = array(
                'message' => 'Home Facility saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.home-facilities.index')->with($notification);

        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );

            return redirect()->route('admin.home-facilities.index')->with($notification);
        }
    }

    public function show(HomeFacility $homeFacility)
    {
        //
    }

    public function edit(HomeFacility $homeFacility)
    {
        $data['homeFacility'] = $homeFacility;
        return view('admin.home_facility.edit', $data);
    }

    public function update(HomeFacilityRequest $request, HomeFacility $homeFacility)
    {
        try {
            $homeFacility = $homeFacility->update($request->all());

            $notification = array(
                'message' => 'Home Facility saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.home-facilities.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.home-facilities.index')->with($notification);
        }
    }

    public function destroy(HomeFacility $homeFacility)
    {
        try{
            HomeFacility::find($homeFacility->id)->delete();

            $notification = array(
                'message' => 'Home Facility deleted successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.home-facilities.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.home-facilities.index')->with($notification);
        }
    }
}
