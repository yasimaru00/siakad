<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaMatakuliah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa_matakuliah', function (Blueprint $table) {
            // $table->id();
            // $table->string('mahasiswa_nim');
            // $table->unsignedBigInteger('matakuliah_id')->nullable();
            // $table->foreign('mahasiswa_nim')->references('nim')->on('mahasiswa');
            // $table->foreign('matakuliah_id')->references('id')->on('matakuliah');
            // $table->string('nilai');
            $table->id();
            $table->string('mahasiswa_id');
            $table->unsignedBigInteger('matakuliah_id');
            $table->char('nilai');
            $table->foreign('mahasiswa_id')->references('nim')->on('mahasiswa');
            $table->foreign('matakuliah_id')->references('id')->on('matakuliah');
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
        Schema::dropIfExists('mahasiswa_matakuliah');
    }
}
