<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Http\Requests\RecipientRequest;
use App\Models\Recipient;
use Exception;

class RecipientController extends Controller
{
    public function __construct()
    {
        parent::__construct('recipient');
    }

    public function index()
    {
        $data['recipients'] = Recipient::latest()->paginate(10);
        return view('admin.recipient.index', $data);
    }

    public function create()
    {
        return view('admin.recipient.create');
    }

    public function store(RecipientRequest $request)
    {
        $requestData = $request->data;
        $requestData['uuid'] = Str::uuid();
        $request->merge(['data' => $requestData]);
        // return $request->all();

        try{
            $recipient = Recipient::create($request->all());

            $notification = array(
                'message' => 'Recipient saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.recipients.index')->with($notification);

        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );

            return redirect()->route('admin.recipients.index')->with($notification);
        }
    }

    public function show(Recipient $recipient)
    {
        //
    }

    public function edit(Recipient $recipient)
    {
        $data['recipient'] = $recipient;
        return view('admin.recipient.edit', $data);
    }

    public function update(RecipientRequest $request, Recipient $recipient)
    {
        try {
            $recipient = $recipient->update($request->all());

            $notification = array(
                'message' => 'Recipient saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.recipients.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.recipients.index')->with($notification);
        }
    }

    public function destroy(Recipient $recipient)
    {
        try{
            Recipient::find($recipient->id)->delete();

            $notification = array(
                'message' => 'Recipient deleted successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.recipients.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('admin.recipients.index')->with($notification);
        }
    }
}
