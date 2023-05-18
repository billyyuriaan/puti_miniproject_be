<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        "mahasiswa_nim",
        "mahasiswa_nama",
        "mahasiswa_alamat",
        "mahasiswa_email",
        "mahasiswa_notlp",
        "mahasiswa_tanggalLahir",
        "mahasiswa_kelamin",
        "mahasiswa_programStudi",
        "mahasiswa_angkatan"
    ];

    protected $table = "mahasiswa";

    protected $primaryKey = "mahasiswa_nim";

    protected $KeyType = "string";

    public $incrementing = false;

    public function jadwal() : HasMany
    {
        return $this->hasMany(JadwalKuliah::class);
    }
}
