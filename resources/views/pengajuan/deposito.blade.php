@extends('guest')
@section('form_content')
	<form id="form-deposito" role="form" autocomplete="on" method="POST" action='{{ route("guest.store", ['form' => request()->query('form','')]) }}' enctype="multipart/form-data">
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

	                <div class="form-group form-group-default required">
	                    <label>Email</label>
	                    <input type="email" class="form-control" name="email" placeholder="" required>
	                </div>

	            </div>
	            
	        </div>

	        {{-- Bilah Kanan --}}
	        <div class="col-lg-6">
	            <p class="mt-2">Informasi Deposito</p>
	            <div class="form-group-attached">
	        		<div class="form-group form-group-default required">
	                    <label>Jumlah Deposito</label>
	                    <input type="text" class="form-control rupiah" name="setoran_awal" placeholder="" required>
	                </div>

	                <div class="form-group form-group-default required">
	                    <label>Tujuan Pembukaan</label>
	                    <input type="text" class="form-control" name="tujuan" placeholder="" required>
	                </div>
	            </div>

	            <div class="">
	            	<div class="g-recaptcha mt-3" data-sitekey="6LcLOCkhAAAAADHiFdfdKDuSl58T9VTVA7cvPru2"></div>
	            </div>

	        </div>
	    </div>
	    <br>

	    <div class="row">
	      <div class="col-12">
	        <button aria-label="" class="btn btn-primary pull-right" type="submit">Submit</button>
	      </div>
	    </div>
	</form>
@endsection