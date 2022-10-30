@extends('master')
@section('title', 'Product-Single')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('./css/animate.css')}}">
<link rel="stylesheet" href="{{ asset('./css/flaticon.css')}}">
	<link rel="stylesheet" href="{{ asset('./css/icomoon.css')}}">
	<link rel="stylesheet" href="{{ asset('./css/style.css')}}">
	<link rel="stylesheet" href="{{ asset('./css/ionicons.css')}}">
@endsection
@section('content')

<form action="{{ route('addToCart')}}" method="POST">
  @csrf
	<section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
					<img src="{{ $product->getFirstMediaUrl('thumbnail') }}" class="img-fluid" alt="Colorlib Template">
					<div class = "row">
						@foreach($product->getMedia('photos') as $photo)
							<div class="col-lg-4 mt-2">
								<img src="{{ $photo->getUrl() }}" style = "height: 180px; width: 160px ;">
							</div> 
						@endforeach
					</div>			
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
					<h2>{{ $product->name }}</h2>
					<h3>Categogy: {{ $product->category->name }}</h3>
						<div class="rating d-flex">
							<p class="text-left mr-4">
								<a href="#" class="mr-2">5.0</a>
								<a href="#"><i class="fa-regular fa-star"></i></a>
								<a href="#"><i class="fa-regular fa-star"></i></a>
								<a href="#"><i class="fa-regular fa-star"></i></a>
								<a href="#"><i class="fa-regular fa-star"></i></a>
								<a href="#"><i class="fa-regular fa-star"></i></a>
								
							</p>
							<p class="text-left mr-4">
								<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
							</p>
							<p class="text-left">
								<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
							</p>
						</div>
    				<h4 class="price" style="color: #fdc020 ;"> {{ currency_format($product->price) }} </h4>
    				<p >{{ $product->description }}</p>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
		              <div class="select-wrap">
	                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                  <select name="" id="" class="form-control">
	                  	<option value="">Small</option>
	                    <option value="">Medium</option>
	                    <option value="">Large</option>
	                    <option value="">Extra Large</option>
	                  </select>
	                </div>
		            </div>
							</div>
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
	                   <i class="ion-ios-remove"></i>
	                	</button>
	            		</span>
	             	<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
	             	<span class="input-group-btn ml-2">
	                	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
	                     <i class="ion-ios-add"></i>
	                 </button>
	             	</span>
	          	</div>
	          	 
          	</div>
				<input type="hidden" name="product_id" value="{{$product->id}}">
				<input type="submit" value="Add to Cart"
				class="btn btn-black py-3 px-5 add_to_card">
			</div>
		</div>
	</div>
</form>

			
    </section>


@endsection
