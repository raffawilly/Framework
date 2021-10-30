@extends('admin.main_layout_admin')

@section('content')
<div class="m-5">
  <h1>List Buku</h1>

  <!-- Topbar Search -->
  <form
  class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="POST" action="">
  @csrf
  <div class="input-group">
      <input type="text" class="form-control bg-light border-0 small" placeholder="Cari Judul Buku..."
          aria-label="Search" name="search" aria-describedby="basic-addon2">
      <div class="input-group-append">
          <button class="btn btn-primary" type="submit">
              <i class="fas fa-search fa-sm"></i>
          </button>
      </div>
  </div>
  <!-- Topbar Search -->

</form>
  <table class="table table-striped table-hover">
    <thead>
        <th>No.</th>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Penerbit</th>
        <th>Pengarang</th>
        <th>Halaman</th>
        <th>Jumlah</th>
        <th>Tahun Terbit</th>
        <th>Foto Sampul</th>
        <th>Action</th>
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
