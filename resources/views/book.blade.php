@extends('template')

@section('content')
 <!-- My-account-Section Start -->
<section class="my-account-section section-padding fix">
    <div class="container">
        <div class="my-account-wrapper">
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="tab-content">
                        <div>
                            <div class="account-details">
                                <form action="{{ route('book_store') }}" method="POST">
                                    @csrf
                                    <div class="account-info">
                                        <h3>Libro de reclamaciones</h3>
                                        <div class="row g-4">
                                            <div class="col-lg-12">
                                                <h5>Datos del consumidor</h5>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-clt">
                                                    <label>Nombre</label>
                                                    <input type="text" name="name" value="{{ old('name')  }}">
                                                    @error('name')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-clt">
                                                    <label>Apellidos</label>
                                                    <input type="text" name="last_name" value="{{ old('last_name')  }}">
                                                    @error('last_name')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-clt">
                                                    <label>DNI</label>
                                                    <input type="text" name="document" value="{{ old('document')  }}">
                                                    @error('document')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-clt">
                                                    <label>Ciudad</label>
                                                    <input type="text" name="city" value="{{ old('city')  }}">
                                                    @error('city')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-clt">
                                                    <label>Dirección</label>
                                                    <input type="text" name="address" value="{{ old('address')  }}">
                                                    @error('address')
                                                    <div class="text-danger">
                                                    	{{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-clt">
                                                    <label>Teléfono</label>
                                                    <input type="text" name="phone" value="{{ old('phone') }}">
                                                    @error('phone')
                                                    <div class="text-danger">
                                                    	{{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-clt">
                                                    <label>Correo electrónico</label>
                                                    <input type="text" name="email" value="{{ old('email') }}">
                                                    @error('email')
                                                    <div class="text-danger">
                                                    	{{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <h5>Bien contratado</h5>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-clt">
                                                    <label>Tipo de consumo</label>
                                                    <select name="product_type" class="form-select rounded-0 py-3">
                                                        <option value="">Seleccionar</option>
                                                        <option value="Producto">Producto</option>
                                                        <option value="Servicio">Servicio</option>
                                                    </select>
                                                    @error('product_type')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-clt">
                                                    <label>Descripción</label>
                                                    <input type="text" name="description" value="{{ old('description') }}">
                                                    @error('description')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-clt">
                                                    <label>Monto reclamado</label>
                                                    <input type="text" name="amount" value="{{ old('amount') }}">
                                                    @error('amount')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-clt">
                                                    <label>Número de pedido</label>
                                                    <input type="text" name="order_number" value="{{ old('order_number') }}">
                                                    @error('order_number')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <h5>Detalle de la reclamación y pedido del consumidor</h5>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-clt">
                                                    <label>Reclamo</label>
                                                    <input type="text" name="claim" value="{{ old('claim') }}">
                                                    @error('claim')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-clt">
                                                    <label>Pedido del consumidor</label>
                                                    <input type="text" name="client_request" value="{{ old('client_request') }}">
                                                    @error('client_request')
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