@extends('admin.layouts.app')

@section('title', 'Credit Forms')
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

                    <p><a class="btn btn-success" href='{{ route("admin.credit-forms.create") }}'><i class="fa fa-plus"></i> Create Credit Form</a></p>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Nama Lengkap
                                </th>
                                <th>
                                    NIK
                                </th>
                                <th>
                                    Nomor HP
                                </th>
                                <th>
                                    Created
                                </th>
                                <th width="5%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($creditForms as $creditForm)
                            <tr>
                                <td>
                                    {{ $creditForm->nama ?? 'N/A' }}
                                </td>

                                <td>
                                    {{ $creditForm->nomor_identitas ?? 'N/A' }}
                                </td>

                                <td>
                                    {{ $creditForm->nomor_telp ?? 'N/A' }}
                                </td>

                                <td>
                                    {{ optional($creditForm->created_at)->diffForHumans() }}
                                </td>

                                <td>
                                    <a href='{{ route("admin.credit-forms.edit", $creditForm->id) }}'>
                                        <button class="btn btn-success btn-block btn-icon-left mb-2" type="button"><i class="pg-icon">edit</i><span class="">Edit</span></button>
                                    </a>

                                    <a href='{{ route("admin.credit-forms.show", $creditForm->id) }}'>
                                        <button class="btn btn-info btn-block btn-icon-left mb-2" type="button"><i class="pg-icon">eye</i><span class="">View</span></button>
                                    </a>

                                    <form method="POST" action='{{ route("admin.credit-forms.destroy", $creditForm->id) }}'>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <div class="form-group">
                                            <i class="fa fa-times"></i>
                                            <button class="btn btn-danger btn-block btn-icon-left" type="submit"><i class="pg-icon">close_lg</i><span class="">Delete</span></button>
                                        </div>
                                    </form>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" align="center">No records found!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination  -->
                    <div class="d-flex justify-content-center">
                        {{ $creditForms->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection