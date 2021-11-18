@extends('student.main_layout_student')

@section('content')


      <!-- Begin Page Content -->
      <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Welcome</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-primary shadow h-100 py-2">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                      Buku yang saya pinjam</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{$bukuDipinjam}}</div>
                              </div>
                              <div class="col-auto">
                                  <i class="fas fa-book fa-2x text-gray-300"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-secondary shadow h-100 py-2">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                      Buku yang sudah saya kembalikan</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{$bukuDikembalikan}}</div>
                              </div>
                              <div class="col-auto">
                                  <i class="fas fa-book fa-2x text-gray-300"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>






          </div>

      <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->
@endsection
