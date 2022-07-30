@extends('guest')
@section('form_content')
	<form id="form-kredit" role="form" autocomplete="on" method="POST" action='{{ route("guest.store") }}' enctype="multipart/form-data">
	  {{-- <p class="mw-80 m-b-25">Want it to be more Descriptive and User-Friendly, We Made it possible, Use Separated Form Layouts Structure to Presentation your Form Fields. --}}
	    @csrf
	    <div class="row">
	        <div class="col-lg-6">
	            <p>Data Pribadi Pemohon</p>
	            <div class="form-group-attached">
	                <div class="form-group form-group-default required">
	                    <label>Nama Lengkap</label>
	                    <input type="text" class="form-control" name="nama_lengkap" placeholder="" required>
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
@endsection