@extends('student.main_layout_student')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Buku yang Dipinjam</h1>
    </div>

    <table class="table table-striped table-hover">
        <thead>
            <th>No.</th>
            <th>Tanggal Pinjam</th>
            <th>Lama Pinjam</th>
            <th>Buku Yang Dipinjam</th>
            <th>Pengurus Peminjaman</th>
        </thead>
        <tbody>
            @foreach ($data as $peminjaman)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$peminjaman->tgl_pinjam }}</td>
                    <td>{{$peminjaman->lama_pinjam}} Hari</td>
                    <td>{{$peminjaman->Bukus->judul}}</td>
                    <td>{{$peminjaman->Admins->nm_admin }}</td>


                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Content Row -->


</div>
@endsection
