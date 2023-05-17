<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\JadwalKuliah;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class JadwalKuliahController extends Controller
{
    public function show()
    {
        $data = JadwalKuliah::all();

        $respond = [
            "message"   => "success mengambil data jadwal kuliah",
            "status"    => 200,
            "data"      => $data
        ];

        return response()->json($respond);
    }

    public function create(Request $request)
    {
        $res = $request->all();

        $respond = [
            "message"   => "success menambah data jadwal kuliah",
            "status"    => 200,
        ];

        $mhs = Mahasiswa::where("mahasiswa_nim", $res["nim"])->first();
        $dsn = Dosen::where("dosen_kode", $res["kode"])->first();

        JadwalKuliah::create([
            "dosen_kode" => $dsn->dosen_kode,
            "mahasiswa_nim" => $mhs->mahasiswa_nim,
            "jadwal_matkul" => $res["matkul"],
            "jadwal_waktuMulai" => $res["waktuMulai"],
            "jadwal_waktuSelesai" => $res["waktuSelesai"],
            "jadwal_ruang" => $res["ruang"],
            "jadwal_semester" => $res["semester"],
        ]);
        

        return response()->json($respond);
    }

    public function showById(int $id)
    {
        # code...
    }
}
