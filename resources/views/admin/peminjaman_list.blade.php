@extends('admin.main_layout_admin')

@section('content')
<div class="m-5">
    <h1>List Peminjaman</h1>
  {{-- Message --}}
  @if ($message = Session::get('message'))
  <div class="alert alert-primary d-flex align-items-center" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
      <div>
          <strong>{{ $message }}</strong>
      </div>
    </div>
  @endif
    <table class="table table-striped table-hover">
      <thead>
          <th>No.</th>
          <th>Tanggal Pinjam</th>
          <th>Nama Student</th>
          <th>Keterangan</th>
          <th>Lama Pinjam</th>
          <th>Status</th>
          <th>Buku Yang Dipinjam</th>
          <th>Pengurus Peminjaman</th>
          <th>Action</th>
      </thead>
      <tbody>
          @foreach ($data as $peminjaman)
              <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$peminjaman->tgl_pinjam }}</td>
                  <td>{{$peminjaman->Students->nm_student }}</td>
                  <td>{{$peminjaman->keterangan}}</td>
                  <td>{{$peminjaman->lama_pinjam}} Hari</td>
                  @if ($peminjaman->status == 0)
                    <td>Pinjam</td>
                  @else
                    <td>Kembali</td>
                  @endif
                  <td>{{$peminjaman->Bukus->judul}}</td>
                  <td>{{$peminjaman->Admins->nm_admin }}</td>
                  <td>
                    <a href="{{ url("admin/ubah_peminjaman/$peminjaman->no_pinjam") }}" class="btn btn-warning">Ubah</a>
                  </td>

              </tr>
          @endforeach
      </tbody>
  </table>
  </div>
@endsection
