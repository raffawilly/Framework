@extends('student.main_layout_student')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">History Peminjaman</h1>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <th>No.</th>
            <th>Judul Buku</th>
            <th>Pengurus Pengembalian</th>
        </thead>
        <tbody>
            @foreach ($data as $peminjaman)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$peminjaman->Bukus->judul}}</td>
                    <td>{{$peminjaman->Admins->nm_admin }}</td>


                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Content Row -->


</div>

@endsection
