@extends('admin.main_layout_admin')

@section('content')
<div class="m-5">
    <h1>Input Buku</h1>
    <br>
<form action="" method="POST" >
    @csrf
    <div class="form-group row">

      <label for="inputJudulBuku" class="col-sm-2 col-form-label">Judul Buku</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="text" class="form-control" name= "JudulBuku" id="inputJudulBuku" placeholder="Judul Buku...">
      </div>
      <br><br><br>
      <label for="inputKategori" class="col-sm-2 col-form-label">Kategori</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <select class="form-control" name= "Kategori" id="inputKategori" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
      </div>
      <br><br><br>
      <label for="inputPenerbit" class="col-sm-2 col-form-label">Penerbit</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <select class="form-control" name= "Penerbit" id="inputPenerbit" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
      </div>
      <br><br><br>
      <label for="inputPengarang" class="col-sm-2 col-form-label">Pengarang</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="text" class="form-control" name= "Pengarang" id="inputPengarang" placeholder="Pengarang...">
      </div>

      <br><br><br>
      <label for="inputHalaman" class="col-sm-2 col-form-label">Halaman</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="number" class="form-control" name= "Halaman" id="inputHalaman" placeholder="Halaman...">
      </div>

      <br><br><br>
      <label for="inputJumlah" class="col-sm-2 col-form-label">Jumlah</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="number" class="form-control" name= "Jumlah" id="inputJumlah" placeholder="Jumlah...">
      </div>

      <br><br><br>
      <label for="inputTahunTerbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="date" class="form-control" name= "TahunTerbit" id="inputTahunTerbit" placeholder="Tahun Terbit...">
      </div>


    </div>
    <input type="submit" value="Submit Buku" class="btn btn-primary btn-md">
  </form>
</div>
@endsection
