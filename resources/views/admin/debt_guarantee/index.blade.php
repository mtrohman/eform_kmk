@extends('admin.layouts.app')

@section('title', 'Debt Guarantees')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Debt Guarantees') }}</div> --}}

                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif

                    <p><a class="btn btn-success" href='{{ route("admin.debt-guarantees.create") }}'><i class="fa fa-plus"></i> Create Debt Guarantee</a></p>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    name
                                </th>
                                <th>
                                    Created
                                </th>
                                <th width="5%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($debtGuarantees as $debtGuarantee)
                            <tr>
                                <td>
                                    {{ $debtGuarantee->name ?? 'N/A' }}
                                </td>

                                <td>
                                    {{ optional($debtGuarantee->created_at)->diffForHumans() }}
                                </td>

                                <td>
                                    <a href='{{ route("admin.debt-guarantees.edit", $debtGuarantee->id) }}'>
                                        <button class="btn btn-success btn-block btn-icon-left mb-2" type="button"><i class="pg-icon">edit</i><span class="">Edit</span></button>
                                    </a>

                                    <form method="POST" action='{{ route("admin.debt-guarantees.destroy", $debtGuarantee->id) }}'>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <div class="form-group">
                                            <i class="fa fa-times"></i>
                                            <button class="btn btn-danger btn-block btn-icon-left mb-2" type="submit"><i class="pg-icon">close_lg</i><span class="">Delete</span></button>
                                        </div>
                                    </form>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" align="center">No records found!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination  -->
                    <div class="d-flex justify-content-center">
                        {{ $debtGuarantees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection