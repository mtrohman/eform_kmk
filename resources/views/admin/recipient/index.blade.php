@extends('admin.layouts.app')
@section('title', 'Recipients')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Recipients') }}</div> --}}

                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif

                    <p><a class="btn btn-success" href='{{ route("admin.recipients.create") }}'><i class="fa fa-plus"></i> Create Recipient</a></p>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Data
                                </th>
                                <th>
                                    Created
                                </th>
                                <th width="5%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recipients as $recipient)
                            <tr>
                                <td>
                                    {{-- {{ $recipient->data ?? 'N/A' }} --}}
                                    @isset ($recipient->data)
                                        @foreach ($recipient->data as $key => $value)
                                            @if ($key== 'uuid')
                                                @continue
                                            @endif
                                            
                                            {{ \Str::of($key)->title()->replace('_',' ')." : ".$value }}
                                            <br>
                                        @endforeach
                                    @endisset
                                </td>

                                <td>
                                    {{ optional($recipient->created_at)->diffForHumans() }}
                                </td>

                                <td>
                                    <a href='{{ route("admin.recipients.edit", $recipient->id) }}'>
                                        <button class="btn btn-success btn-block btn-icon-left mb-2" type="button"><i class="pg-icon">edit</i><span class="">Edit</span></button>
                                    </a>

                                    <form method="POST" action='{{ route("admin.recipients.destroy", $recipient->id) }}'>
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
                        {{ $recipients->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection