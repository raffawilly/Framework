<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id('kd_buku');
            $table->string('judul',255);
            $table->integer('kd_kategori');
            $table->integer('kd_penerbit');
            $table->string('pengarang',255);
            $table->integer('halaman');
            $table->integer('jumlah');
            $table->date('th_terbit');
            $table->string('gambar',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
}
