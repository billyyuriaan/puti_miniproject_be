<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class JadwalKuliah extends Model
{
    use HasFactory;

    protected $fillable = [
        "dosen_kode",
        "mahasiswa_nim",
        "jadwal_matkul",
        "jadwal_waktuMulai",
        "jadwal_waktuSelesai",
        "jadwal_ruang",
        "jadwal_semester",
    ];

    protected $table = "jadwal";

    public function dosen() : BelongsToMany
    {
        return $this->belongsToMany(Dosen::class, "dosen_nip", "dosen_kode");
    }

    public function mahasiswa() : BelongsToMany
    {
        return $this->belongsToMany(Mahasiswa::class);
    }
    
}
