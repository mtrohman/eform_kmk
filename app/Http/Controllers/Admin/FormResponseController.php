<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\FormResponse;
use App\Models\Recipient;

class FormResponseController extends Controller
{
    public function index(Request $request)
    {
        $form = $request->query('form', '');
        $cek = Str::contains($form, ['tabungan', 'deposito', 'kredit']);
        if ($cek) {
            // code...
            $formResponses = FormResponse::where('data->form', $form)->paginate();
            return view('admin.form_response.index', compact('formResponses'));
        }
        else
            abort(404);
    }

    public function show(Request $request, $id)
    {
        // return $id;
        $formResponse = FormResponse::findOrFail($id);
        return view('admin.form_response.show', compact('formResponse'));
    }

    public function forward(Request $request, $id)
    {
        $formResponse = FormResponse::findOrFail($id);
        $form = $formResponse->data->form;
        $recipients = Recipient::where('data->pic', $form)->paginate();
        
        return view('admin.form_response.forward', compact('formResponse' , 'recipients'));
    }

    public function send(Request $request, $id, $uuid)
    {
        $formResponse = FormResponse::findOrFail($id);
        $recipients = Recipient::where('data->uuid', $uuid)->firstOrFail();

        $url = 'https://wa.me/'.$recipients->data->no_wa.'?text=Salam%2C+terdapat+form+pengajuan+'.$formResponse->data->form.'+online+baru+dari+%0a%0aNama+%3a+*'.$formResponse->data->nama_lengkap.'*+%0aAlamat+%3a+'.Str::of($formResponse->data->alamat)->replace(["\n\r", "\n", "\r", " "], "+").'+%0a%0ainformasi+lebih+lanjut+klik+link+berikut%3A+%0a'.route("guest.cek", $formResponse->data->uuid);
        // return $url;
        return redirect()->away($url);
        //'https://wa.me/{{ $element->data->no_wa }}?text=Salam%2C+terdapat+form+pengajuan+online+baru+dari+%0aNama *{{ $formResponse->data->nama_lengkap }}*+%0aAlamat {{ $formResponse->data->alamat }}+%0ainformasi+lebih+lanjut+klik+link+berikut%3A+%0a{{ route("admin.form-responses.show", $formResponse->id) }}'
                                    
    }
}
