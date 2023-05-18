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
        $data = JadwalKuliah::findOrFail($id);

        $respond = [
            "message"   => "success mengambil data jadwal kuliah",
            "status"    => 200,
            "data"      => $data
        ];

        return response()->json($respond);
    }

    public function delete(int $id)
    {
        $respond = [
            "message"   => "Success menghapus data jadwal kuliah",
            "status"    => 200,
        ];

        $jadwal = JadwalKuliah::find($id);

        $jadwal->delete();

        return response()->json($respond);
    }

    public function update(Request $request)
    {
        $res = $request->all();

        $respond = [
            "message"   => "Success mengupdate data jadwal kuliah",
            "status"    => 200
        ];

        $jadwal = JadwalKuliah::find($res["id"]);
        $mhs = Mahasiswa::where("mahasiswa_nim", $res["nim"])->first();
        $dsn = Dosen::where("dosen_kode", $res["kode"])->first();

        $jadwal->dosen_kode = $dsn->dosen_kode;
        $jadwal->mahasiswa_nim = $mhs->mahasiswa_nim;
        $jadwal->jadwal_matkul = $res["matkul"];
        $jadwal->jadwal_waktuMulai = $res["waktuMulai"];
        $jadwal->jadwal_waktuSelesai = $res["waktuSelesai"];
        $jadwal->jadwal_ruang = $res["ruang"];
        $jadwal->jadwal_semester = $res["semester"];

        $jadwal->save();

        return response()->json($respond);
    }
}
