<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;


class MahasiswaController extends Controller
{
    public function __construct() {
        
    }

    public function show()
    {
        $data = Mahasiswa::all();

        $respond = [
            "message"   => "Berhasil Mengambil Data Mahasiswa",
            "status"    => 200,
            "data"      => $data
        ];

        return response()->json($respond);
    }
}
