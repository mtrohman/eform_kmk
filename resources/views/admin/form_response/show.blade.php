@extends('admin.layouts.app')

@section('title', 'Form Pengajuan '.ucwords($formResponse->data->form))
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

                    <table class="table table-bordered">
                        @foreach ($formResponse->data as $key => $element)
                            <tr>
                                <td>{{ ucwords(\Str::replace('_', ' ', $key)) }}</td>
                                <td>{{ $element }}</td>
                            </tr>
                        @endforeach
                    </table>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection