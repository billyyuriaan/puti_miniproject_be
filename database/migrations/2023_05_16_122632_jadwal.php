<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("jadwal", function (Blueprint $table){
            $table->id();
            $table->string("dosen_kode");
            $table->string("mahasiswa_nim");
            $table->string("jadwal_waktuMulai");
            $table->string("jadwal_waktuSelesai");
            $table->string("jadwal_ruang");
            $table->string("jadwal_semester");
            $table->timestamps();

            $table->foreign("dosen_kode")->references("dosen_kode")->on("dosen")->delete("CASCADE");
            $table->foreign("mahasiswa_nim")->references("mahasiswa_nim")->on("mahasiswa")->delete("CASCADE");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("jadwal");
    }
};
