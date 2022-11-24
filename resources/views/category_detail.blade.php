@extends('master')
@section('title', __('category.page.title'))

@section('content')

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 mb-5 text-center">
                    <ul class="product-category">
                        <li><a href="#" class="active">All</a></li>
                        @foreach ($categoryList as $cat)
                            <li>
                                <a href="{{ route('category.detail', $cat->id) }}">{{ $cat->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="amount">Sắp xếp theo</label>
                    <form action="{{ route('category.detail', $category->id) }}" method="get">
                        <div class="filter">
                            <select name="sort_by" id="sort" class="form-select btn btn-outline-success ml-2">
                                <option value="">--Lọc--</option>
                                <option value="price">--Giá--</option>
                                <option value="name">--Lọc theo tên--</option>
                            </select>
                            <select name="order_by" id="sort" class="form-select btn btn-outline-success ml-2">
                                <option value="asc">--tăng dần--</option>
                                <option value="desc">--giảm dần--</option>
                            </select>
                            <button type="submit" class="btn btn-primary ml-2">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <div class="row">
                @foreach ($productList as $product)
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="product">
                            <a href="{{ route('product.detail', $product->slug) }}" class="img-prod">
                                <img src="{{ $product->getFirstMediaUrl('thumbnail') }}" class="img-fluid"
                                    alt="Colorlib Template">
                                <span class="status">30%</span>
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="{{ route('product.detail', $product->id) }}">{{ $product->name }}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price">
                                            <span class="mr-2 price-dc">$120.00</span>
                                            <span class="price-sale">${{ $product->price }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                        <a href="#"
                                            class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-menu"></i></span>
                                        </a>
                                        <a href="#"
                                            class="buy-now d-flex justify-content-center align-items-center mx-1">
                                            <span><i class="ion-ios-cart"></i></span>
                                        </a>
                                        <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                            <span><i class="ion-ios-heart"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $productList->links('pagination::custom-pagination') }}
            {{-- {{ $productList->links() }} --}}

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
        </div>
    </section>
@endsection
