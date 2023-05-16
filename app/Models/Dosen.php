<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        "nama",
    ];

    protected $table = "dosen";

    protected $primaryKey = "nip";

    protected $KeyType = "string";

    protected $incrementing = false;
}
