@extends('admin.main_layout_admin')

@section('content')
<div class="m-5">
  <h1>List Student</h1>

  <!-- Topbar Search -->
  <form
  class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="POST" action="">
  @csrf
  <div class="input-group">
      <input type="text" class="form-control bg-light border-0 small" placeholder="Cari Student..."
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
        <th>Username</th>
        <th>Password</th>
        <th>Nama</th>
        <th>NISN</th>
        <th>Jenis Kelamin</th>
        <th>Agama</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Alamat</th>
        <th>No. Telepon</th>
        <th>Foto Diri</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($data as $student)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$student->username }}</td>
                <td>{{$student->password }}</td>
                <td>{{$student->nm_student }}</td>
                <td>{{$student->nisn}}</td>
                <td>{{$student->kelamin}}</td>
                <td>{{$student->agama}}</td>
                <td>{{$student->tempat_lahir}}</td>
                <td>{{$student->tanggal_lahir}}</td>
                <td>{{$student->alamat}}</td>
                <td>{{$student->no_telepon}}</td>
                <td><img class="img-fluid" style="width: 100px" src="{{ asset('/img_student/'.$student->foto) }}" alt=""></td>
                <td>
                    @if ($student->trashed())
                        <a href="{{ url("admin/student/hapus_buku/$student->kd_student") }}" class="btn btn-success">Recover</a></td>
                    @else
                        <a href="{{ url("admin/student/hapus_buku/$student->kd_student") }}" class="btn btn-danger">Hapus</a></td>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
