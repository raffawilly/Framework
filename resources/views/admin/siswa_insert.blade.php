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

      <label for="inputsiswa" class="col-sm-2 col-form-label">Username</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="text" class="form-control" name= "Username" id="inputsiswa" placeholder="Username...">
        @error('Username')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>

      <label for="password" class="col-sm-2 col-form-label">Password</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="password" class="form-control" name= "Password" id="password" placeholder="Password...">
        @error('Password')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>

      <label for="nm_student" class="col-sm-2 col-form-label">Nama Student</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="text" class="form-control" name= "nm_student" id="nm_student" placeholder="Nama Siswa...">
        @error('nm_student')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>


      <br><br><br>

      <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="number" class="form-control" name= "nisn" id="nisn" placeholder="Nisn...">
        @error('nisn')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>

      <label for="kelamin" class="col-sm-2 col-form-label">Kelamin</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">

        <select name="kelamin" class="form-control">
            <option value="laki-laki">Laki - Laki</option>
            <option value="perempuan">Perempuan</option>
        </select>
        @error('kelamin')
            <div style="color:red">
                    {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>

      <label for="Agama" class="col-sm-2 col-form-label">Agama</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="text" class="form-control" name= "Agama" id="Agama" placeholder="Agama...">
        @error('Agama')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>

      <label for="tempatLahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="text" class="form-control" name= "tempatLahir" id="tempatLahir" placeholder="Tempat Lahir...">
        @error('tempatLahir')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>
      <label for="tanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="date" class="form-control" name= "tanggalLahir" id="tanggalLahir" placeholder="Tanggal Lahir...">
        @error('tanggalLahir')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>
      <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="text" class="form-control" name= "Alamat" id="Alamat" placeholder="Alamat...">
        @error('Alamat')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>
      <label for="nomorTelpon" class="col-sm-2 col-form-label">Nomor Telpon</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="number" class="form-control" name= "nomorTelpon" id="nomorTelpon" placeholder="Nomor Telpon...">
        @error('nomorTelpon')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>
      <label for="email" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="email" class="form-control" name= "email" id="email" placeholder="Email...">
        @error('email')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>

      <br><br><br>
      <label for="inputFoto" class="col-sm-2 col-form-label">Foto</label>
      <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <input type="file" class="form-control" name= "Foto" id="inputFoto">
        @error('Foto')
            <div style="color:red">
                {{$message}}
            </div>
        @enderror
      </div>
    </div>
    <input type="submit" value="Submit" class="btn btn-primary btn-md">
  </form>
</div>
@endsection
