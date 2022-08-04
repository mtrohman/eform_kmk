@extends('admin.layouts.app')

@section('title', 'Forward Pengajuan '.ucwords($formResponse->data->form))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Kirimkan Data ke:</div>

                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama</th>
                                <th width="5%">Pilihan</th>
                            </tr>
                        </thead>
                        
                        @forelse ($recipients as $element)
                            <tr>
                                <td>
                                    {{ $element->data->nama }}
                                </td>

                                <td>
                                    <a href='{{ route('admin.form-responses.send', [ $formResponse->id, $element->data->uuid ]) }}'>
                                        <button class="btn btn-success  btn-icon-left mb-1" type="button"><i class="material-icons">whatsapp</i><span class="">Kirim</span></button>
                                    </a>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">
                                    Tidak ada data PIC
                                </td>
                            </tr>
                        @endforelse
                        
                    </table>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection