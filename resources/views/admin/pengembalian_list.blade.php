@extends('admin.main_layout_admin')

@section('content')
<div class="m-5">
    <h1>List Pengembalian</h1>
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
          <th>No. Pinjam</th>
          <th>Tanggal Kembali</th>
          {{-- <th>Nama Student</th>
          <th>Denda</th>
          <th>Buku Yang Dikembalikan</th> --}}
          <th>Nama Pengurus</th>
          {{-- <th>Action</th> --}}
      </thead>
      <tbody>
          @foreach ($data as $pengembalian)
              <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$pengembalian->no_pinjam }}</td>
                  <td>{{$pengembalian->tgl_kembali }}</td>
                  {{-- <td>{{$pengembalian->Students->nm_student }}</td> --}}
                  {{-- <td>{{$pengembalian->denda}}</td> --}}
                  {{-- <td>{{$pengembalian->Bukus->judul}}</td> --}}
                  <td>{{$pengembalian->Admins->nm_admin }}</td>
                  {{-- <td>
                    <a href="{{ url("admin/ubah_pengembalian/$pengembalian->no_pinjam") }}" class="btn btn-warning">Ubah</a>
                  </td> --}}

              </tr>
          @endforeach
      </tbody>
  </table>
  </div>
@endsection
