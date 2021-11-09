@extends('admin.main_layout_admin')

@section('content')
<div class="m-5">
    <h1>Pengembalian</h1>
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

        <label for="no_pinjam" class="col-sm-2 col-form-label">No. Pinjam</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="text" class="form-control" value= "{{$pengembalian->no_pinjam}}" name= "no_pinjam" id="no_pinjam" placeholder="No. Pinjam">
        @error('no_pinjam')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>

      <label for="tgl_pengembalian" class="col-sm-2 col-form-label">Tanggal Pengembalian</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="date" class="form-control" value= "{{$pengembalian->tgl_kembali}}" name= "tgl_pengembalian" id="tgl_pengembalian" placeholder="Tanggal Pengembalian">
        @error('tgl_pengembalian')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>

      <label for="kd_student" class="col-sm-2 col-form-label">Nama Student</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <select class="form-control" name= "kd_student" id="inputKdStudent" onchange="selectValue()" aria-label="Default select example">

                @foreach ($student as $pnj)
                <option value="{{ $pnj->kd_student }}">
                    {{ $pnj->nm_student }}
                </option>
                @endforeach


        </select>
        {{-- <a class="fas fa-search" href="/admin/pengembalian/doCari">
            Search Buku Peminjam
        </a> --}}
        @error('kd_student')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror

      </div>


      <br><br><br>

      <label for="denda" class="col-sm-2 col-form-label">Denda</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="number" class="form-control" value= "{{$pengembalian->denda}}" name= "denda" id="denda" placeholder="Denda (Rp)">
        @error('denda')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>


      <br><br><br>
      <label for="kodeBuku" class="col-sm-2 col-form-label">Judul Buku</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <select class="form-control" name= "kodeBuku" value= "{{$pengembalian->Bukus->judul}}" id="inputKdBuku" aria-label="Default select example">
            @if ($pengembalian == null)
                @foreach ($pengembalian as $b)
                    <option value="{{ $b->kd_buku }}">{{ $b->Bukus->judul }}</option>
                @endforeach
            @else
                @foreach ($buku as $b)
                <option value="{{ $b->kd_buku }}"
                    @if ($b->kd_buku == $pengembalian->Bukus->kd_buku)
                        selected
                    @endif>{{ $b->judul }}</option>
            @endforeach
            @endif

        </select>
        @error('kodeBuku')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>

      <input type="hidden" name="value" id="output" value="{{$student[0]->kd_student}}">

    </div>
    <input type="submit" value="Submit" class="btn btn-primary btn-md">
  </form>
</div>
<script type="text/javascript">
    function selectValue(){
        var output = document.getElementById('inputKdStudent').value;
        console.log(output);
        document.getElementById('output').value = output;
    }
</script>
@endsection


