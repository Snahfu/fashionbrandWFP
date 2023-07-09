@extends('layouts.login')

@section('judul')
Login Page
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
				<li><a href="{{ route('register') }}">Register</a></li>
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
						<h2 class="text-center text-primary">Login To Fashion Brand</h2>
					</div>
					<form method="POST" action="{{ route('login') }}">
						@csrf
						{{-- Email --}}
						<div class="input-group custom">
							<input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
								value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
							
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
							<input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password"
								placeholder="Password" required autocomplete="current-password">
							
							@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
							<div class="input-group-append custom">
								<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
							</div>
						</div>
						<div class="row pb-30">
							<div class="col-6">
								<div class="custom-control custom-checkbox">
									<input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
									<label class="custom-control-label" for="customCheck1">Remember</label>
								</div>
							</div>
							<div class="col-6">
								<div class="forgot-password">
									<a href="{{ route('password.request') }}">Forgot Password</a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group mb-0">
									<button type="submit" class="btn btn-primary btn-lg btn-block">
										Sign In
									</button>
								</div>
								<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">
									OR
								</div>
								<div class="input-group mb-0">
									<a class="btn btn-outline-primary btn-lg btn-block" href="{{ route('register') }}">Register To
										Create Account</a>
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