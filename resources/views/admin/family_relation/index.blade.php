@extends('admin.layouts.app')

@section('title', 'Family Relations')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Family Relations') }}</div> --}}

                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif

                    <p><a class="btn btn-success" href='{{ route("admin.family-relations.create") }}'><i class="fa fa-plus"></i> Create Family Relation</a></p>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Created
                                </th>
                                <th width="5%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($familyRelations as $familyRelation)
                            <tr>
                                <td>
                                    {{ $familyRelation->name ?? 'N/A' }}
                                </td>

                                <td>
                                    {{ optional($familyRelation->created_at)->diffForHumans() }}
                                </td>

                                <td>
                                    <a href='{{ route("admin.family-relations.edit", $familyRelation->id) }}'>
                                        <button class="btn btn-success btn-block btn-icon-left mb-2" type="button"><i class="pg-icon">edit</i><span class="">Edit</span></button>
                                    </a>

                                    <form method="POST" action='{{ route("admin.family-relations.destroy", $familyRelation->id) }}'>
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
                        {{ $familyRelations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection