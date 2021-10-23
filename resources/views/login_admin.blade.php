@extends('main_layout')
@section('content')
<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 m-auto">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Admin Login<h1>
                            </div>

                            {{-- MESSAGE AKUN TIDAK ADA --}}
                            @if ($message = Session::get('failed'))
                            <div class="alert alert-warning d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div>
                                    <strong>{{ $message }}</strong>
                                </div>
                              </div>
                          @endif
                            {{-- MESSAGE AKUN TIDAK ADA --}}


                            <form class="user" action="/welcome/login_admin" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="username" class="form-control form-control-user @error('username') border-danger border-3 @enderror"
                                        id="exampleInputEmail" name= "username"
                                        placeholder="Enter Username">

                                    {{-- start pesan error --}}
                                    @error('username')
                                    <div class="pesanerror">{{ $message }}</div>
                                    @enderror
                                    {{-- end pesan error --}}
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user @error('password') border-danger border-3 @enderror"
                                        id="exampleInputPassword" placeholder="Password" name="password">
                                    {{-- start pesan error --}}
                                    @error('password')
                                    <div class="pesanerror">{{ $message }}</div>
                                    @enderror
                                    {{-- end pesan error --}}
                                </div>
                                <input type="submit" value="Login" class="btn btn-primary btn-user btn-block">
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="/welcome/login_student">Login as Student</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>

@endsection
