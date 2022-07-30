<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_forms', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('nomor_identitas');
            $table->string('alamat_ktp');
            $table->string('alamat_sekarang');
            $table->string('ibu_kandung');
            $table->string('status_pernikahan');
            $table->string('nomor_telp');
            $table->string('nomor_npwp');
            $table->integer('jumlah_tanggungan');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credit_forms');
    }
}
