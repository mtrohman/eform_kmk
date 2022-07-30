@extends('admin.layouts.app')

@section('title', 'Home Facilities')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Home Facility') }}</div>

                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif

                    <form method="POST" action='{{ route("admin.home-facilities.update", $homeFacility->id) }}' enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <input class="form-control" type="text" name="facility" placeholder="Facility" value="{{$homeFacility->facility}}">
                            @error('facility')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <a class="btn btn-danger mr-1" href='{{ route("admin.home-facilities.index") }}' type="submit">Cancel</a>
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection