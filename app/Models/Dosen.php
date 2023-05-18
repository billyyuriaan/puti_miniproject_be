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

    protected $primaryKey = ["dosen_nip", "dosen_kode"];

    protected $KeyType = "string";

    public $incrementing = false;

    public function jadwal() : HasMany
    {
        return $this->hasMany(JadwalKuliah::class);
    }

    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('dosen_nip', '=', $this->getAttribute('dosen_nip'))
            ->where('dosen_kode', '=', $this->getAttribute('dosen_kode'));

        return $query;
    }
}
