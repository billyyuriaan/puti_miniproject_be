<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class JadwalKuliah extends Model
{
    use HasFactory;

    protected $fillable = [
        "nama",
    ];

    protected $table = "jadwal";

    public function dosen() : BelongsToMany
    {
        return $this->belongsToMany(Dosen::class);
    }

    public function mahasiswa() : BelongsToMany
    {
        return $this->belongsToMany(Mahasiswa::class);
    }
    
}
