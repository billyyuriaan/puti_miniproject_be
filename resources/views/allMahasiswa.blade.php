@extends("layouts.index")

@section("css")
<style>
    .dataTables_empty{
        display: none;
    }
</style>
@endsection

@section("content")
    <h1>Semua Mahasiswa</h1>
    <table class="table" id="myTable">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">NIM</th>
            <th scope="col">Program Studi</th>
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
        url : "http://127.0.0.1:8000/api/v1/mahasiswa",
        method : "GET",
        success : (data) => {
            data.data.map((val, i) => {
                $("<tr>", {
                    html : `            
                        <th scope="row">${i + 1}</th>
                        <td>${val.mahasiswa_nama}</td>
                        <td>${val.mahasiswa_nim}</td>
                        <td>${val.mahasiswa_programStudi}</td>`
                }).appendTo($("#table-body"))
            })
        }
    })
</script>
@endsection