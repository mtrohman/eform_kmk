@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-success text-white no-border m-b-10">
                <div class="container-xs-height full-height">
                    <div class="row-xs-height">
                        <div class="col-xs-height col-top">
                            <div class="card-header top-left top-right">
                                <div class="card-title">
                                    <span class="font-montserrat fs-11 all-caps">
                                        Pengajuan Tabungan
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-xs-height">
                        <div class="col-xs-height col-top">
                            <div class="p-l-20 p-t-50 p-b-10 p-r-20">
                                <h3 class="no-margin p-b-5">
                                    {{ $tabungan }} Pengajuan
                                </h3>
                                {{-- <span class="small hint-text pull-left">
                                    100% Forwarded
                                </span> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row-xs-height">
                        <div class="col-xs-height col-bottom">
                            <div class="progress progress-small m-b-0">
                                <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
                                <div class="progress-bar progress-bar-primary" style="width:100%">
                                </div>
                                <!-- END BOOTSTRAP PROGRESS -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-warning no-border m-b-10">
                <div class="container-xs-height full-height">
                    <div class="row-xs-height">
                        <div class="col-xs-height col-top">
                            <div class="card-header top-left top-right">
                                <div class="card-title">
                                    <span class="font-montserrat fs-11 all-caps">
                                        Pengajuan Deposito
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-xs-height">
                        <div class="col-xs-height col-top">
                            <div class="p-l-20 p-t-50 p-b-10 p-r-20">
                                <h3 class="no-margin p-b-5">
                                    {{ $deposito }} Pengajuan
                                </h3>
                                {{-- <span class="small hint-text pull-left">
                                    100% Forwarded
                                </span> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row-xs-height">
                        <div class="col-xs-height col-bottom">
                            <div class="progress progress-small m-b-0">
                                <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
                                <div class="progress-bar progress-bar-primary" style="width:100%">
                                </div>
                                <!-- END BOOTSTRAP PROGRESS -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-primary no-border m-b-10">
                <div class="container-xs-height full-height">
                    <div class="row-xs-height">
                        <div class="col-xs-height col-top">
                            <div class="card-header top-left top-right">
                                <div class="card-title">
                                    <span class="font-montserrat fs-11 all-caps">
                                        Pengajuan Kredit
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-xs-height">
                        <div class="col-xs-height col-top">
                            <div class="p-l-20 p-t-50 p-b-10 p-r-20">
                                <h3 class="no-margin p-b-5">
                                    {{ $kredit }} Pengajuan
                                </h3>
                                {{-- <span class="small hint-text pull-left">
                                    100% Forwarded
                                </span> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row-xs-height">
                        <div class="col-xs-height col-bottom">
                            <div class="progress progress-small m-b-0">
                                <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
                                <div class="progress-bar progress-bar-primary" style="width:100%">
                                </div>
                                <!-- END BOOTSTRAP PROGRESS -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

                    <h4>Welcome, {{auth()->user()->name}}!</h4>

                </div>
            </div>
        </div>
    </div>

    {{-- <div class="p-3"></div> --}}

    {{-- <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('NHR Laravel Wiki') }}</div>

                <div class="card-body">
                    <p>A wiki for Laravel. Covers issue solutions as well as basic concepts of Laravel. Includes popular package related instructions as wll.</p>
                    <p>
                        <a class="btn btn-primary" href="https://github.com/nhrrob/laravelwiki" target="_blank">NHR Laravel Wiki</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('NHR Crud Generator') }}</div>

                <div class="card-body">
                    <p>This package provides an artisan command to generate a basic crud with Restful API support</p>
                    <p>
                        <a class="btn btn-primary" href="https://github.com/nhrrob/crudgenerator" target="_blank">NHR Crud Generator</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="p-3"></div>

        <div class="col-md-12">
            <p class="alert alert-info text-center">Browse above repositories and inspire me with a star :)</p>
        </div>
    </div> --}}
</div>
@endsection