@extends('master')
@section('title', 'History')

@section('content')
    <section id="home-section" class="hero">
        <div class="home-slider owl-carousel">
            <div class="slider-item" style="background-image: url(images/bg_1.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                        <div class="col-md-12 ftco-animate text-center">
                            <h1 class="mb-2">Histroy</h1>
                            <h2 class="subheading mb-4">My Order</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-item" style="background-image: url(images/bg_2.jpg);">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                        <div class="col-sm-12 ftco-animate text-center">
                            <h1 class="mb-2">Home Histroy</h1>
                            <h2 class="subheading mb-4">My Order</h2>
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
                                    <th class="cart-product-name">code</th>
                                    <th class="product-price">product Name</th>
                                    <th class="cart-product-name">status</th>
                                    <th class="quantity">Price</th>
                                    <th class="quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @if ($order)
                                        @foreach ($order->orderDetails as $orderDetail)
                                            <td class="cart-product-name">
                                                {{ $orderDetail->order->code }}</a>
                                            <td class="cart-product-name"><a href="javascript:void(0)">
                                                    {{ $orderDetail->product->name }}</a>
                                            </td>
                                            <td class="cart-product-name">
                                                {{ $orderDetail->order->status }}</a>
                                            </td>
                                            <td class="product-price">${{ $orderDetail->product->price }}<span
                                                    class="amount"></span></td>
                                            <td class="quantity">
                                                <div class="cart-plus-minus">
                                                    {{ $orderDetail->quantity }}
                                                </div>
                                            </td>
                                            <td class="product-subtotal"><span class="amount">
                                                    ${{ $orderDetail->product->price * $orderDetail->quantity }} </span>
                                            </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-3">
                    <div class="order-status-Uncheckout">
                        <span class="order-status">Ancheckout</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="order-status-pending">
                        <span class="order-status">Pending</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="order-status-unpay">
                        <span class="order-status">Processing
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="order-status-finish">
                        <span class="order-status">Finish</span>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="mouse">
                        <a href="#" class="mouse-icon">
                            <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                        </a>
                    </div>
                </div> --}}
            </div>
        </div>
        </div>
    </section>
@endsection
<style>
.order-status-Uncheckout{
    padding: 20px;
    width: 100px;
    height: 70px;
    background: gray;
    border-radius: 50%;
}
.order-status-pending{
    padding: 20px;
    width: 100px;
    height: 70px;
    background: rgb(229, 147, 75);
    border-radius: 50%;
}
.order-status-unpay{
    padding: 20px;
    width: 100px;
    height: 70px;
    background: rgb(41, 163, 215);
    border-radius: 50%;
}

.order-status-finish{
    padding: 20px;
    width: 100px;
    height: 70px;
    background: rgb(3, 131, 26);
    border-radius: 50%;
}
.order-status{
    border-radius: 50%;
    text-align: center;
    color: white;
    margin-left: -10px;
    
}
</style>