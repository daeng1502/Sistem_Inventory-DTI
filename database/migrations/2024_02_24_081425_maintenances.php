<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Maintenances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance', function (Blueprint $table) {
            $table->id();
            $table->string('id_barang');
            $table->foreign('id_barang')->references('SN')->on('barangs');
            $table->unsignedBigInteger('user_id'); // Menggunakan tipe data yang sesuai
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nama_user'); // Menghapus referensi pada nama_user
            $table->string('nama_barang');
            $table->string('lokasi');
            $table->string('kondisi');
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
        //
    }
}
