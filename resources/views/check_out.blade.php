@extends('master')
@section('title', 'Vegefoods Page')

@section('content')
<div class="container">
    <form action="{{ route('checkout') }}" class="info" method="post">
        @csrf
        <div class="row justify-content-end">
            <div class="col-md-7 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Estimate shipping and tax</h3>
                    <p>Enter your destination to get a shipping estimate</p>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="exampleInputName1">Full Name</label>
                                <input name="name" type="text" class="form-control text-left px-3" placeholder="full name">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="exampleInputName1">Phone Number</label>
                                <input  name="phone" type="text" class="form-control text-left px-3" placeholder="phone">
                            </div> 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="country">Country</label> 
                        <select class="form-control" name="country" >
                                @foreach($localtionList as $local)
                                    <option value="{{ $country->id }}">{{ $local->country }}</option>
                                @endforeach
                                <p class="price">${{ $local->ship }} </p>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="country">Address</label>
                        <input  name="address" type="text" class="form-control text-left px-3" placeholder="">
                    </div>                 
              </div>
            </div>
            <div class="col-md-5 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
                    <div class="row">
                        <div class="col-md-6"><h4>Coupon Code</h4></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="code" type="text" class="form-control text-left px-3" placeholder="voucher code">
                            </div>
                        </div>
                    </div>
                
                    <!-- <th>${total} $</th> -->
                </div>
               <button type="submit" href="#"class="btn btn-primary py-3 px-4">Proceed to checkout</button>
            </div>
        </div>
   </form>
</div>
@endsection