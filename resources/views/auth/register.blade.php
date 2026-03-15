@extends('template')

@section('content')
<!-- Shop-categories-Section Start -->
<section class="my-account-section section-padding fix">
	<div class="container">
		<div class="account-wrapper">
			<div class="shape-1 float-bob-x">
				<img src="{{ asset('assets/web/img/shape-1.png') }}">
			</div>
			<div class="shape-2 float-bob-y">
				<img src="{{ asset('assets/web/img/shape-2.png') }}">
			</div>
			<div class="shape-3 float-bob-y">
				<img src="{{ asset('assets/web/img/dot.png') }}">
			</div>
			<div class="shape-4 float-bob-x">
				<img src="{{ asset('assets/web/img/shape-3.png') }}">
			</div>
			<div class="shape-5 float-bob-y">
				<img src="{{ asset('assets/web/img/man-shape.png') }}">
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="content">
						<h2>Mi cuenta</h2>
						<ul class="list">
							<li>
								<a href="{{ route('index') }}">Inicio</a>
							</li>
							<li>
								Mi cuenta
							</li>
						</ul>
					</div>
					<div class="account-box">
						<h3>Crear cuenta</h3>
						<h6>¿Ya tienes una cuenta? <a href="{{ route('auth.login') }}"><span>Iniciar sesión</span></a></h6>
						<div class="contact-form-item">
							<form action="{{ route('auth.store') }}" method="POST">
								@csrf
								<div class="row g-4">
									<div class="col-lg-12">
										<div class="form-clt">
											<input type="text" name="name" placeholder="Nombre" value="{{ old('name') }}">
											@error('name')
											<div class="text-danger small">
												{{ $message }}
											</div>
											@enderror
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-clt">
											<input type="text" name="last_name" placeholder="Apellidos" value="{{ old('last_name') }}">
											@error('last_name')
											<div class="text-danger small">
												{{ $message }}
											</div>
											@enderror
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-clt">
											<input type="text" name="document" placeholder="DNI" value="{{ old('document') }}">
											@error('document')
											<div class="text-danger small">
												{{ $message }}
											</div>
											@enderror
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-clt">
											<input type="text" name="address" placeholder="Dirección" value="{{ old('address') }}">
											@error('address')
											<div class="text-danger small">
												{{ $message }}
											</div>
											@enderror
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-clt">
											<input type="text" name="phone" placeholder="Teléfono" value="{{ old('phone') }}">
											@error('phone')
											<div class="text-danger small">
												{{ $message }}
											</div>
											@enderror
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-clt">
											<input type="text" name="email" placeholder="Correo electrónico" value="{{ old('email') }}">
											@error('email')
											<div class="text-danger small">
												{{ $message }}
											</div>
											@enderror
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-clt">
											<input type="password" name="password" placeholder="Contraseña">
											@error('password')
											<div class="text-danger small">
												{{ $message }}
											</div>
											@enderror
										</div>
									</div>
									<div class="col-lg-12">
										<button type="submit" class="theme-btn header-btn w-100">
											Crear cuenta
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection