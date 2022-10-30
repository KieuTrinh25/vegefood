@extends('master')
@section('title', 'Home Cart')

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
                                    <th class="quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @if ($order)
                                        @foreach ($order->orderDetails as $orderDetail)
                                            <td class="cart-product-name"><img src="{{ $orderDetail->product->getFirstMediaUrl('thumbnail') }}"
                                                    width="100px"></td>
                                            <td class="cart-product-name"><a href="javascript:void(0)">
                                                    {{ $orderDetail->product->name }}</a>
                                                <p>{{ $orderDetail->product->description }}</p>
                                            </td>
                                            <td class="product-price">${{ $orderDetail->product->price }}<span
                                                    class="amount"></span></td>
                                            <td class="quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" value="{{ $orderDetail->quantity }}"
                                                        type="text">
                                                </div>
                                            </td>
                                            <td class="product-subtotal"><span class="amount"> ${{ $orderDetail->product->price * $orderDetail->quantity }} </span></td>
                                            <td class="product-remove" >
                                                <form action="{{ route('cart.delete') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="order_detail_id" value="{{ $orderDetail->id }}">
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                </tr>
                                        @endforeach
                                     @endif
                            </tbody>
                        </table>
                        <a href="{{route('history')}}"><button class="btn btn-success" style="width: 200px">Trạng thái đơn hàng</button></a> 

                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>
@endsection
