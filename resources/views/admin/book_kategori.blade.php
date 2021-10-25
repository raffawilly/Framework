@extends('admin.main_layout_admin')

@section('content')
<div class="m-5">
    {{-- MESSAGE AKUN TIDAK ADA --}}
    @if ($message = Session::get('message'))
    <div class="alert alert-primary d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
            <strong>{{ $message }}</strong>
        </div>
      </div>
  @endif
<form action="" method="POST" >
    @csrf
    <div class="form-group row">
      <label for="inputNamaKategori" class="col-sm-2 col-form-label">Nama Kategori</label>
      <div class="col-sm-10 col-md-5 col-lg-5 col-xl-5">
        <input type="text" class="form-control" name= "NamaKategori" id="inputNamaKategori" placeholder="Nama Kategori...">
      </div>
    </div>
    <input type="submit" value="Submit Kategori" class="btn btn-primary btn-md">
  </form>
  <br>
  <h1>Kategori Buku</h1>

  <table class="table table-striped table-hover">
    <thead>
        <th>ID</th>
        <th>Nama Kategori</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($kategori as $data)
            <tr>
                <td>{{ $data->kd_kategori }}</td>
                <td>{{ $data->nm_kategori }}</td>
                <td><a href="{{ url("admin/book/hapus_kategori/$data->kd_kategori") }}" class="btn btn-danger">Hapus</a></td>

            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
