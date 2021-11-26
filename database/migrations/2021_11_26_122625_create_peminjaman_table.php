<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('no_pinjam');
            $table->date('tgl_pinjam');
            $table->integer('kd_student');
            $table->string('keterangan',255);
            $table->integer('lama_pinjam');
            $table->integer('status');
            $table->integer('kd_admin');
            $table->integer('kd_buku');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
}
