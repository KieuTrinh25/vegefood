@extends('master')
@section('title', __("Category Page"))

@section('content')

<section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href="#" class="active">All</a></li>
						@foreach ($categoryList as $cat)
    						<li><a href="{{ route('category.detail', $cat->id) }}">{{ $cat->name }}</a></li>
						@endforeach
    				</ul>
    			</div>
    		</div>
    		
			<div class="row">
				@foreach($productList as $product)
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="product">
							<a href="{{ route('product.detail', $product->id) }}" class="img-prod"><img class="img-fluid" src="{{ $product->getFirstMediaUrl('thumbnail') }}"
									alt="Colorlib Template">
								<span class="status">30%</span>
								<div class="overlay"></div>
								<div>{{ $product->sold }}</div>
							</a>
							<div class="text py-3 pb-4 px-3 text-center">
								<h3><a href="{{ route('product.detail', $product->id) }}">{{ $product->name }}</a></h3>
								<div class="d-flex">
									<div class="pricing">
										<p class="price"><span class="mr-2 price-dc">$120.00</span><span
												class="price-sale">${{ $product->price }}</span></p>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				@endforeach
			</div>
			
    		{{-- <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div> --}}

		{{ $productList->links() }}
		
    	</div>
    </section>
@endsection