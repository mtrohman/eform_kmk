@extends('admin.layouts.app')

@section('title', 'Credit Forms')

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

</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">{{ __('Create Credit Form') }}</div> --}}

                <div class="card-body">

                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif

                    {{-- <form method="POST" action='{{ route("admin.credit-forms.store") }}' enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <input class="form-control" type="text" name="title" placeholder="Title">
                            @error('title')
                            <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <a class="btn btn-danger mr-1" href='{{ route("admin.credit-forms.index") }}' type="submit">Cancel</a>
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form> --}}

                    <form method="POST" action='{{ route("admin.credit-forms.store") }}' enctype="multipart/form-data">  {{-- <p class="mw-80 m-b-25">Want it to be more Descriptive and User-Friendly, We Made it possible, Use Separated Form Layouts Structure to Presentation your Form Fields. --}}
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <p>Data Pribadi Pemohon</p>
                                <div class="form-group-attached">
                                    <div class="form-group form-group-default required">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" placeholder="" required>
                                    </div>

                                    <div class="form-group form-group-default required">
                                        <label>Jenis Kelamin</label>
                                        <select class="full-width form-control select2" id="jenis_kelamin" name="jenis_kelamin" required>
                                            <option></option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default required">
                                                <label>Tempat</label>
                                                <input type="text" class="form-control" name="tempat_lahir" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default input-group required">
                                                <div class="form-input-group">
                                                    <label>Tanggal Lahir</label>
                                                    <input type="text" id="tanggal_lahir" class="form-control" name="tanggal_lahir" required>
                                                </div>
                                                <div class="input-group-append ">
                                                    <span class="input-group-text"><i class="pg-icon">calendar</i></span>
                                                </div>                                            
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group form-group-default required">
                                        <label>NIK KTP</label>
                                        <input type="text" class="form-control" name="nomor_identitas" placeholder="" required>
                                    </div>

                                    <div class="form-group form-group-default required">
                                        <label>Alamat Ktp</label>
                                        <textarea class="form-control textarea-autosize" name="alamat_ktp" required></textarea>
                                    </div>

                                    <div class="form-group form-group-default required">
                                        <label>Alamat Sekarang</label>
                                        <textarea class="form-control textarea-autosize" name="alamat_sekarang" required></textarea>
                                    </div>

                                    <div class="form-group form-group-default required">
                                        <label>Nama Ibu Kandung</label>
                                        <input type="text" class="form-control" name="ibu_kandung" placeholder="" required>
                                    </div>

                                    <div class="form-group form-group-default required">
                                        <label>Status Pernikahan</label>
                                        <select class="full-width form-control select2" id="status_pernikahan" name="status_pernikahan" data-placeholder="--- Pilih Status ---" data-init-plugin="select2">
                                            <option></option>
                                            <option value="Belum Menikah">Belum Menikah</option>
                                            <option value="Menikah">Menikah</option>
                                            <option value="Janda / Duda">Janda / Duda</option>
                                            
                                        </select>
                                    </div>

                                    <div class="form-group form-group-default required">
                                        <label>Nomor Telepon/HP</label>
                                        <input type="text" class="form-control" name="nomor_telp" placeholder="" required>
                                    </div>

                                    <div class="form-group form-group-default required">
                                        <label>Nomor NPWP</label>
                                        <input type="text" class="form-control" name="nomor_npwp" placeholder="" required>
                                    </div>

                                    <div class="form-group form-group-default input-group required">
                                        <div class="form-input-group">
                                            <label>Jumlah Tanggungan</label>
                                            <input type="text" class="form-control" name="jumlah_tanggungan" required>
                                        </div>
                                        <div class="input-group-append ">
                                            <span class="input-group-text">Orang</span>
                                        </div>                                            
                                    </div>


                                </div>
                                
                            </div>

                            {{-- Bilah Kanan --}}
                            <div class="col-lg-6">
                                <p>Data Pasangan Pemohon</p>
                                <div class="form-group-attached">
                                    <div class="form-group form-group-default  ">
                                        <label>Nama Pasangan</label>
                                        <input type="text" class="form-control" name="nama_pasangan" placeholder=""  >
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default  ">
                                                <label>Tempat</label>
                                                <input type="text" class="form-control" name="tempat_lahir_pasangan"  >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default input-group  ">
                                                <div class="form-input-group">
                                                    <label>Tanggal Lahir</label>
                                                    <input type="text" id="tanggal_lahir" class="form-control" name="tanggal_lahir_pasangan"  >
                                                </div>
                                                <div class="input-group-append ">
                                                    <span class="input-group-text"><i class="pg-icon">calendar</i></span>
                                                </div>                                            
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group form-group-default  ">
                                        <label>NIK KTP</label>
                                        <input type="text" class="form-control" name="nomor_identitas_pasangan" placeholder=""  >
                                    </div>

                                    <div class="form-group form-group-default  ">
                                        <label>Alamat Ktp</label>
                                        <textarea class="form-control textarea-autosize" name="alamat_ktp_pasangan"  ></textarea>
                                    </div>

                                    <div class="form-group form-group-default  ">
                                        <label>Nomor Telp/HP</label>
                                        <input type="text" class="form-control" name="nomor_telp_pasangan" placeholder=""  >
                                    </div>
                                    
                                </div>

                                <p class="m-t-10">Data Pekerjaan / Usaha</p>
                                <div class="form-group-attached">
                                    <div class="form-group form-group-default  ">
                                        <label>Nama Perusahaan</label>
                                        <input type="text" class="form-control" name="nama_perusahaan" placeholder=""  >
                                    </div>
                                </div>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="mb-0">
                                    Pernyataan:
                                </p>
                                    <ol class="pl-3">
                                        <li>abc</li>
                                        <li>def</li>
                                        <li>ghi</li>
                                    </ol>
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-8">
                            <div class="form-check primary m-t-0">
                              <input type="checkbox" value="1" id="checkbox-agree" required>
                              <label for="checkbox-agree">Saya telah membaca dan setuju dengan pernyataan di atas
                              </label>
                            </div>
                          </div>
                          <div class="col-4">
                            <button aria-label="" class="btn btn-primary pull-right" type="submit">Submit</button>
                          </div>
                        </div>
                    </form>
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
<script>
    $(document).ready(function () {
        $('#tanggal_lahir').datepicker({
            format: 'yyyy-mm-dd'
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