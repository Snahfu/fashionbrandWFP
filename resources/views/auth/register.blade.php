@extends('layouts.login')

@section('judul')
Register Page
@endsection

@section('konten')
<div class="login-header box-shadow">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="brand-logo">
            <a href="{{ route('login') }}">
                <h3>Fashion Brand</h3>
            </a>
        </div>
        <div class="login-menu">
            <ul>
                <li><a href="{{ route('login') }}">Login</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-7">
                <img src="{{ asset('assets/vendors/images/login-page-img.png')}}" alt="" />
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                        <h2 class="text-center text-primary">Register To Create Account</h2>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        {{-- Name --}}
                        <div class="input-group custom">
                            <input id="name" type="text"
                                class="form-control form-control-lg @error('name') is-invalid @enderror" name="name"
                                placeholder="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="input-group custom">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" placeholder="email" value="{{ old('email') }}" required
                                autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy ti-email"></i></span>
                            </div>
                        </div>


                        {{-- Password --}}
                        <div class="input-group custom">

                            <input id="password" type="password"
                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                name="password" placeholder="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                        </div>

                        {{-- Password Confirm --}}
                        <div class="input-group custom">

                            <input id="password-confirm" type="password" class="form-control form-control-lg"
                                name="password_confirmation" required placeholder="password confirmation"
                                autocomplete="new-password">

                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-0">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Register
                                    </button>
                                </div>
                                <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">
                                    OR
                                </div>
                                <div class="input-group mb-0">
                                    <a class="btn btn-outline-primary btn-lg btn-block"
                                        href="{{ route('login') }}">Login With Your Account</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection