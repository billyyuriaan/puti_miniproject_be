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
        Schema::create("mahasiswa",function (Blueprint $table){
            $table->string("mahasiswa_nim")->index()->unique();
            $table->string("mahasiswa_nama", 50);
            $table->string("mahasiswa_alamat", 100);
            $table->string("mahasiswa_email", 60);
            $table->string("mahasiswa_notlp", 20);
            $table->date("mahasiswa_tanggalLahir");
            $table->string("mahasiswa_kelamin");
            $table->string("mahasiswa_programStudi");
            $table->string("mahasiswa_Angkatan");
            $table->timestamps();

            $table->primary("mahasiswa_nim", "mahasiswa_nim");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("mahasiswa");
    }
};
