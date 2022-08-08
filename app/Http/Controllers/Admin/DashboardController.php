<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\FormResponse;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:dashboard view")->only('index');
    }
    
    public function index()
    {
        // $data['products'] = User::latest()->get();
        // $fr = FormResponse::get();
        $tabungan = FormResponse::where('data->form', 'tabungan')->count();
        $deposito = FormResponse::where('data->form', 'deposito')->count();
        $kredit = FormResponse::where('data->form', 'kredit')->count();
        // return $kredit;
        return view('admin.dashboard.index', compact('tabungan', 'deposito', 'kredit'));
    }
}
