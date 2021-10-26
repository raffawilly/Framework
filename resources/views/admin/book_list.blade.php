@extends('admin.main_layout_admin')

@section('content')
<div class="m-5">
  <h1>List Buku</h1>

  <table class="table table-striped table-hover">
    <thead>
        <th>No.Buku</th>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Penerbit</th>
        <th>Pengarang</th>
        <th>Halaman</th>
        <th>Jumlah</th>
        <th>Tahun Terbit</th>
        <th>Foto Sampul</th>
    </thead>
    <tbody>
        @foreach ($data as $buku)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$buku->judul }}</td>
                <td>{{$buku->Kategoris->nm_kategori }}</td>
                <td>{{$buku->Penerbits->nm_penerbit }}</td>
                <td>{{$buku->pengarang}}</td>
                <td>{{$buku->halaman}}</td>
                <td>{{$buku->jumlah}}</td>
                <td>{{$buku->th_terbit}}</td>
                <td><img class="img-fluid" style="width: 100px" src="{{ asset('/img/'.$buku->gambar) }}" alt=""></td>
                <td><a href="{{ url("admin/book/hapus_buku/$buku->kd_buku") }}" class="btn btn-danger">Hapus</a></td>

            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
