<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\FormResponse;

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
}
