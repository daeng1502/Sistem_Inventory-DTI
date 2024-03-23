<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengadaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengadaans', function (Blueprint $table) {
            $table->id();
            $table->string('barang');
            $table->string('merk');
            $table->unsignedBigInteger('user_id'); // Menggunakan tipe data yang sesuai
            $table->foreign('user_id')->references('id')->on('users');
            // $table->date('tanggal');
            $table->integer('jumlah');
            $table->string('status')->default('Menunggu');
            $table->string('Deskripsi');
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
        Schema::dropIfExists('pengadaans');
    }
}
