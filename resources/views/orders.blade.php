@extends('template')

@section('content')
<section class="my-account-section section-padding fix">
    <div class="container">
        <div class="my-account-wrapper">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="wrap-sidebar-account">
                        <div class="sidebar-account">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="{{ route('profile') }}" class="nav-link">
                                        <i class="fa-regular fa-user"></i>
                                        Perfil
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('orders') }}" class="nav-link active">
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
                            <div class="cart-list-area">
                            	<h3>Pedidos</h3>
                                <div class="table-responsive">
                                    <table class="table common-table">
                                        <thead data-aos="fade-down">
                                            <tr>
                                                <th class="text-center">Fecha</th>
                                                <th class="text-center">Total</th>
                                                <th class="text-center">Estado</th>
                                                <th class="text-center">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($sales as $sale)
                                            <tr class="align-items-center py-3">
                                                <td align="center">
                                                    {{ $sale->date }}
                                                </td>
                                                <td align="center">
                                                    {{ $sale->total }}
                                                </td>
                                                <td align="center">
                                                    {{ $sale->status }}
                                                </td>
                                                <td align="center">
                                                    <a href="{{ route('sales.pdf', $sale) }}" target="_blank">PDF</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection