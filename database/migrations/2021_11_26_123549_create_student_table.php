<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id('kd_student');
            $table->string('username',255);
            $table->string('password',255);
            $table->string('nm_student',255);
            $table->bigInteger('nisn');
            $table->string('kelamin',50);
            $table->string('agama',50);
            $table->string('tempat_lahir',50);
            $table->date('tanggal_lahir');
            $table->string('alamat',255);
            $table->integer('no_telpon');
            $table->string('foto',255);
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
        Schema::dropIfExists('student');
    }
}
