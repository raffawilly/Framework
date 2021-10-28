@extends('admin.main_layout_admin')
@section('content')
    <div class="m-5">
    <h1>Input Siswa</h1>
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

      <label for="inputJudulBuku" class="col-sm-2 col-form-label">Username</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="text" class="form-control" name= "username" id="inputJudulBuku" placeholder="Judul Buku...">
        @error('JudulBuku')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>

      <label for="inputJudulBuku" class="col-sm-2 col-form-label">Password</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="text" class="form-control" name= "password" id="inputJudulBuku" placeholder="Judul Buku...">
        @error('password')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror

      <br><br><br>
      <label for="inputJudulBuku" class="col-sm-2 col-form-label">Nisn</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="number" class="form-control" name= "nisn" id="inputJudulBuku" placeholder="Judul Buku...">
        @error('nisn')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror


      <br><br><br>

      <label for="inputPengarang" class="col-sm-2 col-form-label">Pengarang</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="text" class="form-control" name= "Pengarang" id="inputPengarang" placeholder="Pengarang...">
        @error('Pengarang')
            <div style="color:red">
                    {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>

      <label for="inputHalaman" class="col-sm-2 col-form-label">Halaman</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="number" class="form-control" name= "Halaman" id="inputHalaman" placeholder="Halaman...">
        @error('Halaman')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>

      <label for="inputJumlah" class="col-sm-2 col-form-label">Jumlah</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="number" class="form-control" name= "Jumlah" id="inputJumlah" placeholder="Jumlah...">
        @error('Jumlah')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>
      <label for="inputTahunTerbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="date" class="form-control" name= "TahunTerbit" id="inputTahunTerbit" placeholder="Tahun Terbit...">
        @error('TahunTerbit')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>
      <label for="inputGambar" class="col-sm-2 col-form-label">Tahun Terbit</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="file" class="form-control" name= "Gambar" id="inputGambar">
        @error('Gambar')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

    </div>
    <input type="submit" value="Submit Buku" class="btn btn-primary btn-md">
  </form>
</div>
@endsection
