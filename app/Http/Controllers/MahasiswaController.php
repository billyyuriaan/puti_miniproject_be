<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
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

    public function create(Request $request)
    {
        $res = $request->all();

        $respond = [
            "message"   => "Success Membuat Data Mahasiswa",
            "status"    => 200,
        ];

        $date = Carbon::createFromFormat('d/m/Y', $res["tanggalLahir"])->format('Y-m-d');

        Mahasiswa::create([
            "mahasiswa_nim"           => $res["nim"],
            "mahasiswa_nama"          => $res["nama"],
            "mahasiswa_alamat"        => $res["alamat"],
            "mahasiswa_email"         => $res["email"],
            "mahasiswa_notlp"         => $res["notlp"],
            "mahasiswa_tanggalLahir"  => $date,
            "mahasiswa_kelamin"       => $res["kelamin"],
            "mahasiswa_programStudi"  => $res["programStudi"],
            "mahasiswa_angkatan"      => $res["angkatan"]
        ]);

        return response()->json($respond);
    }

    public function showById(string $nim)
    {
        $data = Mahasiswa::where("nim", $nim)->get();

        $respond = [
            "message"   => "Berhasil Mengambil Data Mahasiswa",
            "status"    => 200,
            "data"      => $data
        ];

        return response()->json($respond);
    }

    public function delete(string $nim)
    {
        
    }

    public function update(Request $request)
    {
        # code...
    }
}
