@extends('master')
@section('title', __('web.cart_title'))
@section('content')
    <section id="home-section" class="hero">
        <div class="home-slider owl-carousel">
            <div class="slider-item" style="background-image: url(images/bg_1.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                        <div class="col-md-12 ftco-animate text-center">
                            <h1 class="mb-2">Home Cart</h1>
                            <h2 class="subheading mb-4">My Cart</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-item" style="background-image: url(images/bg_2.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                        <div class="col-sm-12 ftco-animate text-center">
                            <h1 class="mb-2">Home Cart</h1>
                            <h2 class="subheading mb-4">My Cart</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th class="cart-product-name">Images</th>
                                    <th class="cart-product-name">Product name</th>
                                    <th class="product-price">Price</th>
                                    <th></th>
                                    <th class="quantity">Quantity</th>
                                    <th></th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    {{-- <td class="product-remove">
                                        <form action="OrderServlet" method="post">
                                            <input type="hidden" name="action" value="delete">
                                            <button><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                                            <input type="hidden" name="productId" value="name">
                                        </form>
                                    </td> --}}
                                    @if ($order)
                                        @foreach ($order->orderDetails as $orderDetail)
                                            <td class="cart-product-name"><img
                                                    src="{{ $orderDetail->product->getFirstMediaUrl('thumbnail') }}"
                                                    width="100px"></td>
                                            <td class="cart-product-name"><a href="javascript:void(0)">
                                                    {{ $orderDetail->product->name }}</a>
                                                <p>{{ $orderDetail->product->description }}</p>
                                            </td>
                                            <td class="product-price">
                                                {{ currency_format($orderDetail->product->price) }}<span
                                                    class="amount"></span></td>
                                            <td>
                                                    <form action="{{ route('cart.update') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="quantity" value="-1">
                                                        <input type="hidden" name="orderDetailId"
                                                            value="{{ $orderDetail->id }}">
                                                        <button class="btn btn-light" type="submit">
                                                            <h1>-</h1>
                                                        </button>
                                                    </form>
                                            </td>
                                            <td class="quantity">

                                                
                                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="{{ $orderDetail->quantity }}">
                                               
                                            </td>
                                            <td>
                                                <form action="{{ route('cart.update') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="quantity" value="1">
                                                    <input type="hidden" name="orderDetailId"
                                                        value="{{ $orderDetail->id }}">
                                                    <button class="btn btn-light" type="submit">
                                                       <h1>+</h1>
                                                    </button>
                                                </form>

                                            </td>
                                            <td class="product-subtotal"><span class="amount">{{ currency_format($orderDetail->total()) }}</span></td>
                                                <td class="product-remove">
                                                <form action="{{ route('cart.delete') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="order_detail_id"
                                                        value="{{ $orderDetail->id }}">
                                                    <button class="btn btn-light" type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="30"
                                                            height="30" fill="currentColor" class="bi bi-x-circle"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                            <path
                                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <div class="container">
        <form action="{{ route('cart.store', $user->id) }}" class="info" method="post">
            @csrf
            <input type="hidden" name="orderId" value="{{ $order->id }}">
            <div class="row justify-content-end">
                <div class="col-md-7 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Estimate shipping and tax</h3>
                        <p>Enter your destination to get a shipping estimate</p>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="exampleInputName1">Full Name</label>
                                    <input name="name" class="form-control text-left px-3" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="exampleInputName1">Phone Number</label>
                                    <input name="phone" value="{{ old('phone') }}" type="text"
                                        class="form-control text-left px-3" placeholder="phone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" class="form-control text-left px-3"
                                        value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <select class="form-control" name="country" id="location">
                                        @foreach ($locationList as $location)
                                            <option value="{{ $location->code }}">{{ $location->country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="country">Address</label>
                            <input name="address" type="text" class="form-control text-left px-3"
                                placeholder="Address">
                        </div>
                        <div class="form-group">
                            <label for="country">Note</label>
                            <input name="note" type="text" class="form-control text-left px-3" placeholder="Note">
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mt-5 cart-wrap ftco-animate">
                    <div class="list-voucher mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Code</h3>
                                @foreach($voucherList as $voucher)
                                    <p>{{$voucher->code}}</p>
                                @endforeach
                            </div>
                            <div class="col-md-6">
                            <h3>Discount</h3>
                                @foreach($voucherList as $voucher)
                                    <p>{{$voucher->discount}}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Coupon Code</h6>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="code" type="text" class="form-control text-left px-3"
                                        placeholder="voucher code">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Ship</h6>
                            </div>
                            <div class="col-md-6">
                                <span disabled="disabled" id="ship_label" class="form-control text-left px-3"> </span> 
                                <input type="hidden" id="ship" class="form-control text-left px-3">  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Total</h4>
                            </div>
                            <div class="col-md-6">
                                <span  id="total_label" class="form-control text-left px-3" >{{ currency_format($total) }} </span>
                                <input type="hidden" id="total" class="form-control text-left px-3" value="{{ $total }}"> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Total Payments</h4>
                            </div>
                            <div class="col-md-6">
                                 <span id="total_payment_label" class="form-control text-left px-3" > </span>
                                 <input type="hidden" id="total_payment" class="form-control text-left px-3" value="{{ $total }}"> 
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary py-3 px-4">Proceed to checkout</button>
                </div>
            </div>
        </form>
    </div>
@endsection
