<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        "dosen_nip",
        "dosen_kode",
        "dosen_nama",
        "dosen_alamat",
        "dosen_email",
        "dosen_notlp",
        "dosen_tanggalLahir",
        "dosen_kelamin",
        "dosen_jabatan",
        "dosen_departement"
    ];

    protected $table = "dosen";

    protected $primaryKey = ["nip", "kode"];

    protected $KeyType = "string";

    public $incrementing = false;

    public function jadwal() : HasMany
    {
        return $this->hasMany(JadwalKuliah::class);
    }
}
