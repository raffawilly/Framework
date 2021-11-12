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
          <th>Buku Yang Dipinjam</th>
          <th>Pengurus Peminjaman</th>
          <th>Action</th>
      </thead>
      <tbody>
          @foreach ($pinjam as $peminjaman)
          @if ($peminjaman->status == 0)
              <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$peminjaman->tgl_pinjam }}</td>
                  <td>{{$peminjaman->Students->nm_student }}</td>
                  <td>{{$peminjaman->Bukus->judul}}</td>
                  <td>{{$peminjaman->Admins->nm_admin }}</td>
                  <td>

                    <a href="{{ url("admin/pengembalian/$peminjaman->no_pinjam") }}" class="btn btn-warning">Buku Kembali</a>

                  </td>

              </tr>
          @endif
          @endforeach

      </tbody>
  </table>
  </div>
@endsection


