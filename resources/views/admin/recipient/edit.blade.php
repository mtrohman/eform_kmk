@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Recipient') }}</div>

                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif

                    <form method="POST" action='{{ route("admin.recipients.update", $recipient->id) }}' enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @error('data')
                        <label class="text-danger">{{ $message }}</label>
                        @enderror

                        <div class="form-group">
                            <label class="">Nama</label>
                            <input class="form-control" type="text" name="data[nama]" placeholder="nama" value="{{ $recipient->data->nama }}">
                        </div>
                        <div class="form-group">
                            <label class="">Nomor WA</label>
                            <input class="form-control" type="text" name="data[no_wa]" placeholder="nomor wa" value="{{ $recipient->data->no_wa }}">
                        </div>
                        <div class="form-group">
                            <label class="">PIC</label>
                            {{-- <input class="form-control" type="text" name="data[pic]" placeholder="pic"> --}}
                            <select class="form-control" name="data[pic]">
                                <option value="tabungan">Tabungan</option>
                                <option value="deposito">Deposito</option>
                                <option value="kredit">Kredit</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <a class="btn btn-danger mr-1" href='{{ route("admin.recipients.index") }}' type="submit">Cancel</a>
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(function() {
        // console.log( "ready!" );
        $("select").val("{{ $recipient->data->pic }}").change();
    });

</script>
@endsection