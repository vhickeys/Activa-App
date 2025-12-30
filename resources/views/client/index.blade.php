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

                                            <span class="badge bg-primary text-uppercase">
                                                {{ $facility['tier'] }}
                                            </span>

                                            <div class="shop-btn mt-4">
                                                <a href="{{ route('facility.details', ['slug' => $facility['slug']]) }}"
                                                    class="axil-btn">
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
                                    <a href="{{ route('facility.details', ['slug' => $featured['slug']]) }}">
                                        <img src="{{ $apiUrl . '/storage/lifestyle-provider/facilities/media/' . $featuredImage }}"
                                            alt="{{ $featured['facility_name'] }}">
                                    </a>
                                </div>

                                <h6 class="title">
                                    <a href="{{ route('facility.details', ['slug' => $featured['slug']]) }}">
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

    <!-- Start Explore Facilities Area -->
    <div class="axil-product-area bg-color-white axil-section-gap">
        <div class="container">
            <div class="section-title-wrapper text-center mb-5">
                <span class="title-highlighter highlighter-primary">
                    <i class="far fa-building"></i> Our Facilities
                </span>
                <h2 class="title">Explore our Lifestyle Facilities</h2>
            </div>

            <div class="row row--15">
                @forelse ($facilities as $facility)
                    @php
                        $image = $facility['image'] ?? 'placeholder.png';
                        $tier = ucfirst($facility['tier'] ?? 'N/A');
                        $price = $facility['price_range'] ?? null;
                        $hours = $facility['operating_hours'] ?? null;
                        $city = $facility['location']['city'] ?? '';
                        $state = $facility['location']['state'] ?? '';
                    @endphp

                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one h-100 shadow-sm hover-shadow">
                            <div class="thumbnail position-relative overflow-hidden">
                                <a href="{{ route('facility.details', ['slug' => $facility['slug']]) }}">
                                    <img src="{{ $apiUrl . '/storage/lifestyle-provider/facilities/' . $image }}"
                                        alt="{{ $facility['facility_name'] }}" class="img-fluid">
                                </a>

                                @if ($tier)
                                    <span class="badge bg-primary position-absolute top-0 end-0 m-2">{{ $tier }}
                                        Tier</span>
                                @endif
                            </div>

                            <div class="product-content p-3">
                                <h5 class="title mb-2">
                                    <a href="{{ route('facility.details', ['slug' => $facility['slug']]) }}" class="text-dark">
                                        {{ $facility['facility_name'] }}
                                    </a>
                                </h5>

                                @if ($price)
                                    <div class="product-price mb-2">
                                        <span class="text-primary fw-bold">
                                            ₦{{ number_format($price['min']) }} - ₦{{ number_format($price['max']) }}
                                        </span>
                                    </div>
                                @endif

                                <div class="product-meta text-muted small">
                                    <span><i class="far fa-map-marker-alt"></i> {{ $city }},
                                        {{ $state }}</span>
                                    @if ($hours)
                                        <br>
                                        <span><i class="far fa-clock"></i> {{ $hours }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">No facilities found at the moment.</p>
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            @if (!empty($pagination) && $pagination['last_page'] > 1)
                <div class="row mt-4">
                    <div class="col-12 d-flex justify-content-center">
                        <nav>
                            <ul class="pagination pagination-rounded">
                                {{-- Previous Page --}}
                                <li class="page-item {{ !$pagination['prev_page_url'] ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $pagination['prev_page_url'] ?? '#' }}">« Previous</a>
                                </li>

                                {{-- Page Numbers --}}
                                @for ($i = 1; $i <= $pagination['last_page']; $i++)
                                    <li class="page-item {{ $i == $pagination['current_page'] ? 'active' : '' }}">
                                        <a class="page-link"
                                            href="?page={{ $i }}&per_page={{ $pagination['per_page'] }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                {{-- Next Page --}}
                                <li class="page-item {{ !$pagination['next_page_url'] ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $pagination['next_page_url'] ?? '#' }}">Next »</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- End Explore Facilities Area -->

@endsection
