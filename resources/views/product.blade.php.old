@extends('template')

@section('content')
<!-- Shop Details Section Start -->
<section class="shop-details-section section-padding fix shop-bg">
	<div class="container">
		<div class="shop-details-wrapper">
			<div class="row g-4">
				<div class="col-lg-6">
					<div class="shop-details-image">
						<div class="tab-content">
							<div id="thumb1" class="tab-pane fade show active">
								<div class="shop-thumb">
									<img src="{{ asset('storage/'.$product->image) }}">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="product-details-content">
						<h3 class="pb-3">{{ $product->name }}</h3>
						<p class="mb-3">
							{{ $product->description }}
						</p>
						<div class="price-list">
							<h3>S/{{ $product->price }}</h3>
						</div>
						<form method="POST" class="quantity" action="{{ route('cart.add') }}">
							@csrf
							<div class="cart-wrp">
								<div class="cart-quantity">
										<input type="hidden" name="id" value="{{ $product->id }}">
										<input type='button' value='-' class='qtyminus minus'>
										<input type='text' name='quantity' value='1' class='qty'>
										<input type='button' value='+' class='qtyplus plus'>
								</div>
							</div>
							<div class="shop-btn">
								<button type="submit" class="theme-btn">
									<span> Añadir al carrito</span>
								</button>
							</div>
						</form>
						<h6 class="details-info"><span>Código:</span><a href="#">{{ $product->code }}</a></h6>
						<h6 class="details-info"><span>Categoría:</span><a href="#">{{ $product->category->name }}</a></h6>
						<h6 class="details-info"><span>Marca:</span><a href="#">{{ $product->brand->name }}</a></h6>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection