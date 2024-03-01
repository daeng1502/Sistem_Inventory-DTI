<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            // $table->id('SN');
            $table->string('SN')->primary()->unique(); // Menjadikan 'SN' sebagai primary key dan unik
            $table->string('foto');
            $table->string('nama');
            $table->string('merk');
            $table->string('spesifikasi');
            $table->integer('jumlah_barang');
            $table->string('no_kontrak');
            $table->string('nama_kontrak');
            $table->date('tgl_kontrak');
            $table->string('lokasi');
            $table->integer('tahun_perolehan');
            $table->string('barangcode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}
