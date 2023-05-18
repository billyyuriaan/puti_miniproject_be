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
            $table->string("dosen_kode", 50);
            $table->string("mahasiswa_nim", 50);
            $table->string("jadwal_matkul", 50);
            $table->string("jadwal_waktuMulai", 20);
            $table->string("jadwal_waktuSelesai", 20);
            $table->string("jadwal_ruang", 20);
            $table->string("jadwal_semester", 20);
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
