<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            // $table->id('id_mahasiswa');
            // $table->string('nim',10)->index();
            // $table->string('nama')->index();
            // $table->string('kelas');
            // $table->string('jurusan');
            // $table->timestamps();
            $table->string('nim')->primary();
            $table->string('nama');
            $table->string('kelas');
            $table->string('jurusan');
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
        Schema::dropIfExists('mahasiswa');
    }
}
