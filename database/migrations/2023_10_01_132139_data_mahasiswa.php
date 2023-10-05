<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('status_mahasiswa')->nullable();
            $table->string('jenis_magang')->nullable();
            $table->string('jenjang_pendidikan')->nullable();
            $table->string('universitas')->nullable();
            $table->string('jurusan')->nullable();
            $table->date('internship_start_date')->nullable();
            $table->date('internship_end_date')->nullable();
            $table->string('tema')->nullable();
            $table->string('surat_pengantar')->nullable();
            $table->string('proposal')->nullable();
            $table->string('transkip')->nullable();
            $table->string('cv')->nullable();
            $table->string('sertifikat')->nullable();
            $table->string('foto')->nullable();
            $table->string('lokasi_magang')->nullable();
            $table->string('role_magang')->nullable();
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
        Schema::dropIfExists('data_mahasiswa');
    }
};
