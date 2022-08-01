@extends('admin.layouts.app')

@section('title', 'Form Pengajuan '.ucwords(request()->query('form')))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">{{ __('Credit Forms') }}</div> --}}

                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif

                    {{-- <p><a class="btn btn-success" href='{{ route("admin.credit-forms.create") }}'><i class="fa fa-plus"></i> Create Credit Form</a></p> --}}

                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead class="">
                                <tr>
                                    <th>
                                        Nama Lengkap
                                    </th>
                                    <th>
                                        NIK
                                    </th>
                                    <th>
                                        Alamat
                                    </th>
                                    <th>
                                        Nomor HP
                                    </th>
                                    <th>
                                        Created
                                    </th>
                                    <th >Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($formResponses as $formResponse)
                                <tr>
                                    <td>
                                        {{ $formResponse->data->nama_lengkap ?? 'N/A' }}
                                    </td>

                                    <td>
                                        {{ $formResponse->data->nomor_identitas ?? 'N/A' }}
                                    </td>

                                    <td>
                                        {{ $formResponse->data->alamat ?? 'N/A' }}
                                    </td>

                                    <td>
                                        {{ $formResponse->data->nomor_telp ?? 'N/A' }}
                                    </td>

                                    <td>
                                        {{ optional($formResponse->created_at)->diffForHumans() }}
                                    </td>

                                    <td>
                                        {{-- <a href='{{ route("admin.form-responses.edit", $formResponse->id) }}'>
                                            <button class="btn btn-primary  btn-icon-left mb-1" type="button"><i class="pg-icon">send</i><span class="">Balas</span></button>
                                        </a> --}}

                                        <a href='{{ route("admin.form-responses.show", $formResponse->id) }}'>
                                            <button class="btn btn-info  btn-icon-left mb-1" type="button"><i class="pg-icon">eye</i><span class="">View</span></button>
                                        </a>

                                        <a href='https://wa.me/62817384913?text=Salam%2C+terdapat+form+pengajuan+online+baru+dari+%0aNama *{{ $formResponse->data->nama_lengkap }}*+%0aAlamat {{ $formResponse->data->alamat }}+%0ainformasi+lebih+lanjut+klik+link+berikut%3A+%0a{{ route("admin.form-responses.show", $formResponse->id) }}'>
                                            <button class="btn btn-success  btn-icon-left mb-1" type="button"><i class="material-icons">whatsapp</i><span class="">Teruskan ke AO</span></button>
                                        </a>

                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" align="center">No records found!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination  -->
                    <div class="d-flex justify-content-center">
                        {{ $formResponses->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection