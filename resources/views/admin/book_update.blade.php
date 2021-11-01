@extends('admin.main_layout_admin')

@section('content')


<div class="m-5">
    <h1>Update Buku <i style="color:red">{{$buku->judul}}</i></h1>
    <img src="{{asset('/img_buku/'.$buku->gambar)}}" class="img-thumbnail" style="height:100 ;width:100"alt="Responsive image">

    <br><br><br>
<form action="" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="form-group row">
    <input type="hidden" name="id" value="{{$buku->kd_buku}}">
      <label for="inputJudulBuku" class="col-sm-2 col-form-label">Judul Buku</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="text" class="form-control" name= "JudulBuku" id="inputJudulBuku" value="{{$buku->judul}}"placeholder="Judul Buku...">
        @error('JudulBuku')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>

      <label for="inputKategori" class="col-sm-2 col-form-label">Kategori</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <select class="form-control" name= "Kategori" id="inputKategori" aria-label="Default select example">
            @foreach ($kategori as $ktg)
            <option value="{{ $ktg->kd_kategori }}"
            @if ($ktg->kd_kategori==$buku->Kategoris->nm_kategori)
                selected
            @endif>{{ $ktg->nm_kategori }}</option>
            @endforeach
          </select>
      </div>

      <br><br><br>

      <label for="inputPenerbit" class="col-sm-2 col-form-label">Penerbit</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <select class="form-control" name= "Penerbit" id="inputPenerbit" aria-label="Default select example">
            @foreach ($penerbit as $penerbit)
            <option value="{{ $penerbit->kd_penerbit }}"
             @if ($penerbit->kd_penerbit==$buku->Penerbits->nm_penerbit)
                selected
            @endif>{{ $penerbit->nm_penerbit }}</option>
            @endforeach
          </select>
      </div>

      <br><br><br>

      <label for="inputPengarang" class="col-sm-2 col-form-label">Pengarang</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="text" class="form-control" name= "Pengarang" id="inputPengarang" value="{{$buku->pengarang}}" placeholder="Pengarang...">
        @error('Pengarang')
            <div style="color:red">
                    {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>

      <label for="inputHalaman" class="col-sm-2 col-form-label">Halaman</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="number" class="form-control" name= "Halaman" id="inputHalaman" value="{{$buku->halaman}}"placeholder="Halaman...">
        @error('Halaman')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>

      <label for="inputJumlah" class="col-sm-2 col-form-label">Jumlah</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="number" class="form-control" name= "Jumlah" id="inputJumlah" value="{{$buku->jumlah}}"placeholder="Jumlah...">
        @error('Jumlah')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>
      <label for="inputTahunTerbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="date" class="form-control" name= "TahunTerbit" id="inputTahunTerbit" value="{{$buku->th_terbit}}" placeholder="Tahun Terbit...">
        @error('TahunTerbit')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>


    <input type="submit" value="SAVE" class="btn btn-success btn-md">
  </form>

</div>
@endsection
