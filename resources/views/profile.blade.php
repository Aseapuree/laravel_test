@extends('template')

@section('content')
 <!-- My-account-Section Start -->
<section class="my-account-section section-padding fix">
    <div class="container">
        <div class="my-account-wrapper">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="wrap-sidebar-account">
                        <div class="sidebar-account">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="{{ route('profile') }}" class="nav-link active">
                                        <i class="fa-regular fa-user"></i>
                                        Perfil
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('orders') }}" class="nav-link">
                                        <i class="fa-sharp fa-regular fa-shopping-cart"></i>
                                        Pedidos
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('auth.logout') }}" class="nav-link">
                                        <i class="fa-regular fa-power-off"></i>
                                        Cerrar sesión
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content">
                        <div>
                            <div class="account-details">
                                <form action="{{ route('update') }}" method="POST">
                                    @csrf
                                    <div class="account-info">
                                        <h3>Perfil</h3>
                                        <div class="row g-4">
                                            <div class="col-lg-6">
                                                <div class="form-clt">
                                                    <input type="text" placeholder="Nombre" value="{{ auth()->user()->name }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-clt">
                                                    <input type="text" placeholder="Apellidos" value="{{ auth()->user()->last_name }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-clt">
                                                    <input type="text" placeholder="DNI" value="{{ auth()->user()->document }}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-clt">
                                                    <input type="text" name="address" placeholder="Dirección" value="{{ old('address', auth()->user()->address)  }}">
                                                    @error('address')
                                                    <div class="text-danger">
                                                    	{{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-clt">
                                                    <input type="text" name="phone" placeholder="Teléfono" value="{{ old('phone', auth()->user()->phone) }}">
                                                    @error('phone')
                                                    <div class="text-danger">
                                                    	{{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-clt">
                                                    <input type="text" name="email" placeholder="Correo electrónico" value="{{ old('email', auth()->user()->email) }}">
                                                    @error('email')
                                                    <div class="text-danger">
                                                    	{{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    	<button type="submit" class="theme-btn mt-4">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection