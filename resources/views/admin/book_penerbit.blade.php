@extends('admin.main_layout_admin')

@section('content')
<div class="m-5">

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
      <label for="inputNamaPenerbit" class="col-sm-2 col-form-label">Nama Penerbit</label>
      <div class="col-sm-10 col-md-5 col-lg-5 col-xl-5">
        <input type="text" class="form-control" name= "NamaPenerbit" id="inputNamaPenerbit" placeholder="Nama Penerbit...">
        @if ($errors->any())
            <div style="color:red">
                @foreach($errors->all() as $err)
                    {{$err}}
                @endforeach
            </div>
        @endif
      </div>
    </div>
    <input type="submit" value="Submit Penerbit" class="btn btn-primary btn-md">
  </form>
  <br>
  <h1>Penerbit Buku</h1>

    <!-- Topbar Search -->
    <form
    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="POST" action="/admin/book/search_penerbit">
    @csrf
    <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Cari Penerbit..."
            aria-label="Search" name="search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
    <!-- Topbar Search -->

  <table class="table table-striped table-hover">
    <thead>
        <th>ID</th>
        <th>Nama Penerbit</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($penerbit as $data)
            <tr>
                <td>{{ $data->kd_penerbit }}</td>
                <td>{{ $data->nm_penerbit }}</td>
                <td><a href="{{ url("admin/book/hapus_penerbit/$data->kd_penerbit") }}" class="btn btn-danger">Hapus</a></td>

            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
