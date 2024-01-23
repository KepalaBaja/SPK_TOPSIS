@extends('layouts.auth')
@section('content')
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                    </div>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="name">Nama Lengkap</label>
                                            <input type="text"
                                                class="form-control @error('name') is-invalid @enderror form-control-user"
                                                name="name" value="{{ old('name') }}" required autofocus id="name"
                                                aria-describedby="namelHelp" placeholder="Nama Lengkap">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror form-control-user"
                                                name="email" value="{{ old('email') }}" required autofocus id="email"
                                                aria-describedby="emailHelp" placeholder="Masukan Alamat Email...">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror form-control-user"
                                                name="password" required id="password" placeholder="Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password-confirm">Konfirmasi Password</label>
                                            <input type="password"
                                                class="form-control @error('Confirm Password') is-invalid @enderror form-control-user"
                                                name="password_confirmation" required autocomplete="new-password"
                                                id="password-confirm" placeholder="Konfirmasi Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Register
                                        </button>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Sudah punya akun ? Login !</a>
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
