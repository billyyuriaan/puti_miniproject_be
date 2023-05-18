<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function __construct() {
        
    }

    public function show()
    {
        $data = Dosen::all();

        $respond = [
            "message"   => "Berhasil Mengambil Data Dosen",
            "status"    => 200,
            "data"      => $data
        ];

        return response()->json($respond);
    }

    public function create(Request $request)
    {
        $res = $request->all();

        $date = Carbon::createFromFormat('d/m/Y', $res["tanggalLahir"])->format('Y-m-d');

        Dosen::create([
            "dosen_nip"           => $res["nip"],
            "dosen_kode"          => $res["kode"],
            "dosen_nama"          => $res["nama"],
            "dosen_alamat"        => $res["alamat"],
            "dosen_email"         => $res["email"],
            "dosen_notlp"         => $res["notlp"],
            "dosen_tanggalLahir"  => $date,
            "dosen_kelamin"       => $res["kelamin"],
            "dosen_jabatan"       => $res["jabatan"],
            "dosen_departement"   => $res["departement"]
        ]);

        $respond = [
            "message"   => "Berhasil Menambah Data Dosen",
            "status"    => 200,
        ];

        return response()->json($respond);
    }

    public function showById(string $nip)
    {
        $data = Dosen::where("dosen_nip", $nip)->get();

        $respond = [
            "message"   => "Berhasil Mengambil Data Dosen",
            "status"    => 200,
            "data"      => $data
        ];

        return response()->json($respond);
    }

    public function delete(string $nip)
    {
        $respond = [
            "message"   => "Success Menghapus Data Dosen",
            "status"    => 200,
        ];

        $dsn = Dosen::where("dosen_nip", $nip)->first();

        $dsn->delete();
        
        return response()->json($respond);
    }

    public function update(Request $request)
    {
        $res = $request->all();

        $respond = [
            "message"   => "Success Mengupdate Data Dosen",
            "status"    => 200,
        ];

        $date = Carbon::createFromFormat('d/m/Y', $res["tanggalLahir"])->format('Y-m-d');

        $dsn = Dosen::where("dosen_nip", $res["nip"])->first();        

        $dsn->dosen_nama = $res["nama"];
        $dsn->dosen_alamat = $res["alamat"];
        $dsn->dosen_email = $res["email"];
        $dsn->dosen_notlp = $res["notlp"];
        $dsn->dosen_tanggalLahir = $date;
        $dsn->dosen_kelamin = $res["kelamin"];
        $dsn->dosen_jabatan = $res["jabatan"];
        $dsn->dosen_departement = $res["departement"];

        $dsn->save();

        return response()->json($respond);
    }
}
