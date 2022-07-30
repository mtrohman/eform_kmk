@extends('admin.layouts.app')

@section('title', 'Income Sources')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Income Source') }}</div>

                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif

                    <form method="POST" action='{{ route("admin.income-sources.update", $incomeSource->id) }}' enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <input class="form-control" type="text" name="name" placeholder="Name" value="{{$incomeSource->name}}">
                            @error('name')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <a class="btn btn-danger mr-1" href='{{ route("admin.income-sources.index") }}' type="submit">Cancel</a>
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection