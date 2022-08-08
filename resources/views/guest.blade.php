@extends('layouts.guest')

@section('styles')
<link href="{{ asset('assets/plugins/bootstrap-datepicker/css/datepicker3.css')}}" rel="stylesheet" type="text/css" media="screen">
<link href="{{ asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" media="screen" />
<style>
    textarea.textarea-autosize {
        height: 2.25rem;
        min-height: 2.25rem;
        /* resize: none; */
        overflow-y:hidden;
    }

    textarea.textarea-autosize.form-control-lg {
        height: 3.75rem;
        min-height: 3.75rem;
    }

    textarea.textarea-autosize.form-control-sm {
        height: 2rem;
        min-height: 2rem;
    }

    .img-center {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

</style>
@endsection

@if(empty(request()->query('form')))

    @section('jumbotron') 
        <div class="row row m-b-1">
            <div class="col-12">
                <!-- START card -->
                <div class="card card-transparent">
                    <div class="card-body text-center">
                        <h3>
                            Formulir Pengajuan Online BPR Klepu Mitra Kencana
                        </h3>
                        <p>Layanan Perbankan Bernilai Tambah</p>
                    </div>
                </div>
                <!-- END card -->
            </div>
        </div>
    @endsection
@else
    @section('title', 'Form Pengajuan '.ucwords(request()->query('form','')))
@endif

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}

                <div class="card-body">
                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif

                    @if (null!==(request()->query('form')))
                        @yield('form_content')
                        {{-- expr --}}
                    @else
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <a href="guest?form=tabungan" class="">
                                    <img src="{{ asset('assets/img/tabungan.png') }}" alt="" height="200vh" class="img-center">
                                    <button class="btn btn-lg btn-primary btn-block my-2">
                                        Tabungan
                                    </button>    
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="guest?form=deposito" class="">
                                    <img src="{{ asset('assets/img/deposito.png') }}" alt="" height="200vh" class="img-center">
                                    <button class="btn btn-lg btn-primary btn-block my-2">
                                        Deposito
                                    </button>    
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="guest?form=kredit" class="">
                                    <img src="{{ asset('assets/img/kredit.png') }}" alt="" height="200vh" class="img-center">
                                    <button class="btn btn-lg btn-primary btn-block my-2">
                                        Kredit
                                    </button>    
                                </a>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/jquery.textarea_autosize.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/js/inputmask/jquery.inputmask.min.js') }}" type="text/javascript"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    $(document).ready(function () {
        Inputmask.extendAliases({
            rupiah: {
                // prefix: "Rp ",
                alias: "numeric",
                radixPoint: ',',
                groupSeparator: '.',
                autoGroup: true,
                digits: 0,
                digitsOptional: !1,
                clearMaskOnLostFocus: !1,
                removeMaskOnSubmit:false,
            }
        });

        $(".rupiah").inputmask({ alias : "rupiah" });

        $('#tanggal_lahir').datepicker({
            format: 'dd/mm/yyyy'
        });

        $('#jenis_kelamin').select2({
            minimumResultsForSearch: Infinity,
            placeholder: "--- Pilih Jenis Kelamin ---",
            allowClear: true
        });

        $('.select2').on('select2:close', function (e) {
            // alert($(this).select2('data')[0].text);
            $(this).select2('data')[0].id ? $(this).closest(".form-group").find("label").addClass("fade") : $(this).closest(".form-group").find("label").removeClass("fade");
        });

        $('.textarea-autosize').textareaAutoSize();

    });

</script>
@endsection