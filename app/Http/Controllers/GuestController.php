<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\CreditForm;
use App\Models\FormResponse;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $case= $request->query('form','');

        switch ($case) {
            case 'deposito':
                return view('pengajuan.deposito');
                break;

            case 'kredit':
                return view('pengajuan.kredit');
                break;

            case 'tabungan':
                return view('pengajuan.tabungan');
                break;
            
            default:
                return view('guest');
                break;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request_data = $request->except(['_token', 'g-recaptcha-response']);
        // return $request_data;
        $data = (object)[];
        $data->uuid = Str::uuid();
        foreach ($request_data as $key => $value) {
            $data->$key = $value;
        }
        $fr = new FormResponse();
        $fr->data = $data;

        try {
            $fr->save();
            $response = Http::post('https://maker.ifttt.com/trigger/'.env('IFTTT_EVENT').'/with/key/'.env('IFTTT_KEY'), [
                'value1' => $fr->data->form,
                'value2' => $fr->data->nama_lengkap,
                'value3' => route('admin.form-responses.index', ['form'=>$fr->data->form]),
            ]);

            $notification = array(
                'message' => 'Data Berhasil Di Simpan! Kami akan segera menghubungi anda',
                'alert-type' => 'success'
            );
            
            return redirect()->route('guest.index')->with($notification);
            
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CreditForm  $creditForm
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $formResponse = FormResponse::where('data->uuid', $uuid)->firstOrFail();
        // return $formResponse;
        return view('pengajuan.show', compact('formResponse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CreditForm  $creditForm
     * @return \Illuminate\Http\Response
     */
    public function edit(CreditForm $creditForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CreditForm  $creditForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CreditForm $creditForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CreditForm  $creditForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreditForm $creditForm)
    {
        //
    }
}
