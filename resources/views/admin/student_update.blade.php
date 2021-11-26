@extends('admin.main_layout_admin')

@section('content')


<div class="m-5">
    <h1>Update Student <i style="color:red">{{$student->nm_student}}</i></h1>
    <img src="{{asset('/img_student/'.$student->foto)}}" class="img-thumbnail" style="height:100 ;width:100"alt="Responsive image">

    <br><br><br>
    <form action="" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="form-group row">

          <label for="inputsiswa" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
            <input type="text" class="form-control" name= "Username" id="inputsiswa" placeholder="Username..." value="{{$student->username}}">
            @error('Username')
                <div style="color:red">
                    {{$message}}
                </div>
            @enderror
          </div>

          <br><br><br>

          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
            <input type="password" class="form-control" name= "Password" id="password" placeholder="Password..." value="{{$student->password}}" readonly>
            @error('Password')
                <div style="color:red">
                    {{$message}}
                </div>
            @enderror
          </div>

          <br><br><br>

          <label for="nm_student" class="col-sm-2 col-form-label">Nama Student</label>
          <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
            <input type="text" class="form-control" name= "nm_student" id="nm_student" placeholder="Nama Siswa..." value="{{$student->nm_student}}">
            @error('nm_student')
                <div style="color:red">
                    {{$message}}
                </div>
            @enderror
          </div>


          <br><br><br>

          <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
          <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
            <input type="number" class="form-control" name= "nisn" id="nisn" placeholder="Nisn..." value="{{$student->nisn}}">
            @error('nisn')
                <div style="color:red">
                    {{$message}}
                </div>
            @enderror
          </div>

          <br><br><br>

          <label for="kelamin" class="col-sm-2 col-form-label">Kelamin</label>
          <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
            <input type="text" class="form-control" name= "kelamin" id="kelamin" placeholder="Kelamin..." value="{{$student->kelamin}}">
            @error('kelamin')
                <div style="color:red">
                        {{$message}}
                </div>
            @enderror
          </div>

          <br><br><br>

          <label for="Agama" class="col-sm-2 col-form-label">Agama</label>
          <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
            <input type="text" class="form-control" name= "Agama" id="Agama" placeholder="Agama..." value="{{$student->agama}}">
            @error('Agama')
                <div style="color:red">
                    {{$message}}
                </div>
            @enderror
          </div>

          <br><br><br>

          <label for="tempatLahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
          <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
            <input type="text" class="form-control" name= "tempatLahir" id="tempatLahir" placeholder="Tempat Lahir..." value="{{$student->tempat_lahir}}">
            @error('tempatLahir')
                <div style="color:red">
                    {{$message}}
                </div>
            @enderror
          </div>

          <br><br><br>
          <label for="tanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
          <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
            <input type="date" class="form-control" name= "tanggalLahir" id="tanggalLahir" placeholder="Tanggal Lahir..." value="{{$student->tanggal_lahir}}">
            @error('tanggalLahir')
                <div style="color:red">
                    {{$message}}
                </div>
            @enderror
          </div>

          <br><br><br>
          <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
          <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
            <input type="text" class="form-control" name= "Alamat" id="Alamat" placeholder="Alamat..." value="{{$student->alamat}}">
            @error('Alamat')
                <div style="color:red">
                    {{$message}}
                </div>
            @enderror
          </div>

          <br><br><br>
          <label for="nomorTelpon" class="col-sm-2 col-form-label">Nomor Telpon</label>
          <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
            <input type="number" class="form-control" name= "nomorTelpon" id="nomorTelpon" placeholder="Nomor Telpon..." value="{{$student->no_telepon}}">
            @error('nomorTelpon')
                <div style="color:red">
                    {{$message}}
                </div>
            @enderror
          </div>

        </div>
        <input type="submit" value="Save" class="btn btn-primary btn-md">
      </form>

</div>
@endsection
