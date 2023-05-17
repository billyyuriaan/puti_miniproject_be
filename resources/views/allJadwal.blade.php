@extends("layouts.index")

@section("css")
<style>
    .dataTables_empty{
        display: none;
    }
</style>
@endsection

@section("content")
    <h1>Semua Jadwal</h1>
    <table class="table" id="myTable">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Dosen</th>
            <th scope="col">NIM</th>
            <th scope="col">Mata Kuliah</th>
            <th scope="col">Waktu Mulai</th>
            <th scope="col">Waktu Berakhir</th>
            <th scope="col">Ruangan</th>
            <th scope="col">Semester</th>
        </tr>
        </thead>
        <tbody id="table-body">
        </tbody>
    </table>
@endsection

@section("script")
<script>
    $("#myTable").DataTable()

    $.ajax({
        url : "http://127.0.0.1:8000/api/v1/jadwal",
        method : "GET",
        success : (data) => {
            data.data.map((val, i) => {
                $("<tr>", {
                    html : `            
                        <th scope="row">${i + 1}</th>
                        <td>${val.dosen_kode}</td>
                        <td>${val.mahasiswa_nim}</td>
                        <td>${val.jadwal_matkul}</td>
                        <td>${val.jadwal_waktuMulai}</td>
                        <td>${val.jadwal_waktuSelesai}</td>
                        <td>${val.jadwal_ruang}</td>
                        <td>${val.jadwal_semester}</td>`
                }).appendTo($("#table-body"))
            })
        }
    })
</script>
@endsection