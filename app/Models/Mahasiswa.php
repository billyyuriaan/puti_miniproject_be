<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        "nama",
    ];

    protected $table = "mahasiswa";

    protected $primaryKey = "nim";

    protected $KeyType = "string";

    protected $incrementing = false;
}
