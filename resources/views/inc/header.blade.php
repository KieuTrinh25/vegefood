<div class="py-1 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-phone2"></span></div>
                        <span class="text">+ 079 2545 710</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-paper-plane"></span></div>
                        <span class="text">trinh0792545710@gmail.com</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text">3-5 Business days delivery &amp; Free Returns</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Vegefoods</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{ route('product.search') }}" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Shop</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        @foreach ($categoryList as $category)
                            <a class="dropdown-item"
                                href="{{ route('category.detail', $category->slug) }}">{{ $category->name }}</a>
                        @endforeach
                    </div>

                </li>
                <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                <li>
                    <div class="sample ten">
                        <form action="{{ route('product.search') }}" method="get">
                            <input type="text" name="search" placeholder="search..." id="search-input"
                                style="border-color:#82AE46; border-radius:10px; margin-top: 15px;">
                            <button type="submit" class="btn btn-search">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('show.cart') }}" class="nav-link"><span class="icon-shopping_cart" style="color: #82AE46; font-size:15px; margin-top:10px"></span>[0]</a>
                </li>

                @if (Auth::user() != null)
                    <li>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <button type="submit" style="background: #fff; border-color:#fff"><i
                                    class="fas fa-sign-out-alt"
                                    style="color: #82AE46; font-size:15px; margin-top:10px"></i></button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}" class="nav-link"><i class="fas fa-sign-in-alt"
                                style="color: #82AE46; font-size:25px; margin-top:10px"></i></a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
