@extends('admin.main_layout_admin')

@section('content')
<div class="m-5">
    <h1>Peminjaman</h1>
    <br>
    {{-- Message --}}
    @if ($message = Session::get('message'))
    <div class="alert alert-primary d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
            <strong>{{ $message }}</strong>
        </div>
      </div>
  @endif
<form action="" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="form-group row">

      <label for="tgl_peminjaman" class="col-sm-2 col-form-label">Tanggal Peminjaman</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="date" class="form-control" name= "tgl_peminjaman" id="tgl_peminjaman" placeholder="Tanggal peminjaman">
        @error('tgl_peminjaman')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>

      <label for="kd_student" class="col-sm-2 col-form-label">Nama Student</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <select class="form-control" name= "kd_student" id="inputKdStudent" aria-label="Default select example">
            @foreach ($student as $std)
                <option value="{{ $std->kd_student }}">{{ $std->nm_student }}</option>
            @endforeach
        </select>
        @error('kd_student')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>

      <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="text" class="form-control" name= "keterangan" id="Keterangan" placeholder="Keterangan">
        @error('keterangan')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>

      <label for="Lama pinjam" class="col-sm-2 col-form-label">Lama pinjam</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="number" class="form-control" name= "lamaPinjam" id="Lama pinjam" placeholder="Lama pinjam(hari)">
        @error('Lama pinjam')
            <div style="color:red">
                    {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>

      <label for="status" class="col-sm-2 col-form-label">Status</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <select class="form-control" name= "status" id="status" aria-label="Default select example">
                <option value="0">Pinjam</option>
                <option value="1">Kembali</option>
        </select>
        @error('status')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>
      <label for="kodeBuku" class="col-sm-2 col-form-label">Judul Buku</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <select class="form-control" name= "kodeBuku" id="inputKdStudent" aria-label="Default select example">
            @foreach ($buku as $b)
                <option value="{{ $b->kd_buku }}">{{ $b->judul }}</option>
            @endforeach
        </select>
        @error('kodeBuku')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>

    </div>
    <input type="submit" value="Submit" class="btn btn-primary btn-md">
  </form>
</div>
@endsection
