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
        Schema::create("dosen", function (Blueprint $table){
            $table->string("dosen_nip", 50)->index()->unique();
            $table->string("dosen_kode", 50)->index()->unique();
            $table->string("dosen_nama", 50);
            $table->string("dosen_alamat", 100);
            $table->string("dosen_email", 60);
            $table->string("dosen_notlp", 20);
            $table->date("dosen_tanggalLahir");
            $table->string("dosen_kelamin", 20);
            $table->string("dosen_jabatan", 20);
            $table->string("dosen_departement", 50);
            $table->timestamps();

            $table->primary(["dosen_nip", "dosen_kode"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("dosen");
    }
};
