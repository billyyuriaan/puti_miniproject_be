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
            $table->string("nip");
            $table->string("nama", 50);
            $table->string("alamat", 100);
            $table->string("email", 60);
            $table->string("notlp", 20);
            $table->date("tanggalLahir");
            $table->string("kelamin");
            $table->string("jabatan");
            $table->string("departement");
            $table->timestamps();
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
