@extends('admin.layouts.app')

@section('title', 'Home Facilities')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Home Facilities') }}</div> --}}

                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif

                    <p><a class="btn btn-success" href='{{ route("admin.home-facilities.create") }}'><i class="fa fa-plus"></i> Create Home Facility</a></p>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Created
                                </th>
                                <th width="5%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($homeFacilities as $homeFacility)
                            <tr>
                                <td>
                                    {{ $homeFacility->facility ?? 'N/A' }}
                                </td>

                                <td>
                                    {{ optional($homeFacility->created_at)->diffForHumans() }}
                                </td>

                                <td>
                                    <a class="" href='{{ route("admin.home-facilities.edit", $homeFacility->id) }}'>
                                        <button class="btn btn-success btn-block btn-icon-left mb-2" type="button"><i class="pg-icon">edit</i><span class="">Edit</span></button>
                                    </a>

                                    <form method="POST" action='{{ route("admin.home-facilities.destroy", $homeFacility->id) }}'>
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
                        {{ $homeFacilities->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection