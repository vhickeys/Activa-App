@extends('layouts.client')

@section('title', 'Homepage')

@section('content')

    <!-- Start Slider Area -->
    <div class="axil-main-slider-area main-slider-style-2">
        <div class="container">
            <div class="slider-offset-left">
                <div class="row row--20">
                    <div class="col-lg-9">
                        <div class="slider-box-wrap">
                            <div class="slider-activation-one axil-slick-dots">

                                @foreach ($categories as $category)
                                    @php
                                        $facility = $category['lifestyle_provider_facilities'][0] ?? null;
                                        if (!$facility) {
                                            continue;
                                        }

                                        $image = $facility['media']['facility_images'][0] ?? null;
                                    @endphp

                                    <div class="single-slide slick-slide">
                                        <div class="main-slider-content">
                                            <span class="subtitle">
                                                <i class="fal fa-dumbbell"></i>
                                                {{ $category['name'] }}
                                            </span>

                                            <h1 class="title">
                                                {{ $facility['facility_name'] }}
                                            </h1>

                                            <p class="mb-3">
                                                {{ $facility['location']['city'] ?? '' }},
                                                {{ $facility['location']['state'] ?? '' }}
                                            </p>

                                            <span class="badge bg-success text-uppercase">
                                                {{ $facility['tier'] }}
                                            </span>

                                            <div class="shop-btn mt-4">
                                                <a href="{{ url('/facility/' . $facility['slug']) }}" class="axil-btn">
                                                    View Facility
                                                    <i class="fal fa-long-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="main-slider-thumb">
                                            @if ($image)
                                                <img src="{{ $apiUrl . '/storage/lifestyle-provider/facilities/media/' . $image }}"
                                                    alt="{{ config('app.name') . ' ' . $facility['facility_name'] }}">
                                            @else
                                                <img src="{{ $apiUrl . '/storage/lifestyle-provider/facilities/media/placeholder.jpg' }}"
                                                    alt="Activa Facility Image">
                                            @endif
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    {{-- Optional Right Side Highlight --}}
                    <div class="col-lg-3">
                        @if (!empty($categories[0]['lifestyle_provider_facilities'][0]))
                            @php
                                $featured = $categories[0]['lifestyle_provider_facilities'][0];
                                $featuredImage = $featured['media']['facility_images'][0] ?? null;
                            @endphp

                            <div class="slider-product-box">
                                <div class="product-thumb">
                                    <a href="{{ url('/facility/' . $featured['slug']) }}">
                                        <img src="{{ $apiUrl . '/storage/lifestyle-provider/facilities/media/' . $featuredImage }}"
                                            alt="{{ $featured['facility_name'] }}">
                                    </a>
                                </div>

                                <h6 class="title">
                                    <a href="{{ url('/facility/' . $featured['slug']) }}">
                                        {{ $featured['facility_name'] }}
                                    </a>
                                </h6>

                                <span class="price text-uppercase">
                                    {{ $featured['tier'] }} Facility
                                </span>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Slider Area -->

    <!-- Start New Arrivals Product Area  -->
    {{-- <div class="axil-new-arrivals-product-area fullwidth-container bg-color-white axil-section-gap pb--0">
        <div class="container ml--xxl-0">
            <div class="product-area pb--50">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i> This
                        Week’s</span>
                    <h2 class="title">New Arrivals</h2>
                </div>
                <div class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets/images/product/fashion/product-1.png" alt="Product Images">
                                    <img class="hover-img" src="assets/images/product/fashion/product-4.png"
                                        alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">20% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Top Handle Handbag</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$80</span>
                                        <span class="price current-price">$60</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500"
                                        src="assets/images/product/fashion/product-2.png" alt="Product Images">
                                    <img class="hover-img" src="assets/images/product/fashion/product-6.png"
                                        alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Leather Bag For Men</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$40</span>
                                        <span class="price current-price">$40</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="300" data-sal-duration="1500"
                                        src="assets/images/product/fashion/product-3.png" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">15% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Long Sleeve Sweater</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$30</span>
                                        <span class="price current-price">$24</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="400" data-sal-duration="1500"
                                        src="assets/images/product/fashion/product-4.png" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">30% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Men's Winter Jacket</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$50</span>
                                        <span class="price current-price">$40</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="assets/images/product/fashion/product-5.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Micro Fiber Sheet</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$60</span>
                                        <span class="price current-price">$50</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500"
                                        src="assets/images/product/fashion/product-3.png" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">15% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Long Sleeve Sweater</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$30</span>
                                        <span class="price current-price">$24</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="300" data-sal-duration="1500"
                                        src="assets/images/product/fashion/product-4.png" alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">30% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Men's Winter Jacket</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$50</span>
                                        <span class="price current-price">$40</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-four">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="400" data-sal-duration="1500"
                                        src="assets/images/product/fashion/product-5.png" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product.html">Micro Fiber Sheet</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$60</span>
                                        <span class="price current-price">$50</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End New Arrivals Product Area  -->

    <!-- Start Expolre Product Area  -->
    <div class="axil-product-area bg-color-white axil-section-gap">
        <div class="container">
            <div class="section-title-wrapper">
                <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i> Our
                    Products</span>
                <h2 class="title">Explore our Products</h2>
            </div>
            <div
                class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                <div class="slick-single-layout">
                    <div class="row row--15">
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                            src="assets/images/product/fashion/product-8.png" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                        <div class="product-badget">20% Off</div>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.html">Leather Jacket</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$29.99</span>
                                            <span class="price old-price">$49.99</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                    </div>
                </div>
                <!-- End .slick-single-layout -->
                <div class="slick-single-layout">
                    <div class="row row--15">
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                            <div class="axil-product product-style-one">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img src="assets/images/product/fashion/product-8.png" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                        <div class="product-badget">20% Off</div>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.html">Leather Jacket</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$29.99</span>
                                            <span class="price old-price">$49.99</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product  -->
                    </div>
                </div>
                <!-- End .slick-single-layout -->
            </div>
            <div class="row">
                <div class="col-lg-12 text-center mt--20 mt_sm--0">
                    <a href="shop.html" class="axil-btn btn-bg-lighter btn-load-more">View All Products</a>
                </div>
            </div>

        </div>
    </div>
    <!-- End Expolre Product Area  -->
@endsection
