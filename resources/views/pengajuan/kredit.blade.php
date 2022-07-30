@extends('guest')
@section('form_content')
	<form id="form-kredit" role="form" autocomplete="on" method="POST" action='{{ route("guest.store", ['form' => request()->query('form','')]) }}' enctype="multipart/form-data">
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
	                    <label>Alamat</label>
	                    <textarea class="form-control textarea-autosize" name="alamat" required></textarea>
	                </div>

	                <div class="form-group form-group-default required">
	                    <label>NIK KTP</label>
	                    <input type="text" class="form-control" name="nomor_identitas" placeholder="" required>
	                </div>

	                <div class="form-group form-group-default required">
	                    <label>Nomor Telepon/HP</label>
	                    <input type="text" class="form-control" name="nomor_telp" placeholder="" required>
	                </div>

	            </div>

	            <p class="mt-2">Data Pasangan Pemohon</p>
	            <div class="form-group-attached">
	                <div class="form-group form-group-default required">
	                    <label>Nama Pasangan</label>
	                    <input type="text" class="form-control" name="nama_pasangan" placeholder="" required>
	                </div>

	                <div class="form-group form-group-default required">
	                    <label>NIK KTP</label>
	                    <input type="text" class="form-control" name="nomor_identitas_pasangan" placeholder=""  required>
	                </div>
	                
	            </div>
	            
	        </div>

	        {{-- Bilah Kanan --}}
	        <div class="col-lg-6">
	            <p class="m-t-2">Data Pinjaman & Jaminan</p>
	            <div class="form-group-attached">
	                <div class="form-group form-group-default required">
	                    <label>Jumlah Pengajuan</label>
	                    <input type="text" class="form-control rupiah" name="nominal_pengajuan" placeholder="" required>
	                </div>

	                <div class="form-group form-group-default required">
	                    <label>Keperluan</label>
	                    <input type="text" class="form-control" name="keperluan" placeholder="" required>
	                </div>

	                <div class="form-group form-group-default required">
	                    <label>Agunan</label>
	                    <input type="text" class="form-control" name="agunan" placeholder="" required>
	                </div>

	                <div class="form-group form-group-default required">
	                    <label>Email</label>
	                    <input type="email" class="form-control" name="email" placeholder="" required>
	                </div>

	                <div class="form-group form-group-default required">
	                    <label>Keterangan Jaminan</label>
	                    <input type="text" class="form-control" name="keterangan_jaminan" placeholder="" required>
	                </div>
	            </div>

	            <div class="text-center">
	            	<div class="g-recaptcha mt-3" data-sitekey="6LcLOCkhAAAAADHiFdfdKDuSl58T9VTVA7cvPru2"></div>
	            </div>

	        </div>
	    </div>
	    <br>
	    {{-- <div class="row">
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
	    </div> --}}

	    <div class="row">
	      
	      <div class="col-12">
	        <button aria-label="" class="btn btn-primary pull-right" type="submit">Submit</button>
	      </div>
	    </div>
	</form>
@endsection