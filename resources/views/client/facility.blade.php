@extends('layouts.client')

@section('title', $facility['facility_name'] ?? '')

@section('content')

    <!-- Start Single Facility Area -->
    <div class="axil-single-product-area bg-color-white">
        <div class="single-product-thumb axil-section-gap pb--20 pb_sm--0 bg-vista-white">
            <div class="container">
                <div class="row row--25">

                    <!-- Images Gallery -->
                    <div class="col-lg-6 mb--40">
                        <div class="h-100 position-sticky sticky-top">
                            <div id="facilityCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @if (!empty($facility['media']['facility_images']))
                                        @foreach ($facility['media']['facility_images'] as $index => $image)
                                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                <img src="{{ $apiUrl . '/storage/lifestyle-provider/facilities/media/' . $image }}"
                                                    class="d-block w-100" alt="{{ $facility['facility_name'] }}">
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="carousel-item active">
                                            <img src="{{ $apiUrl . '/storage/lifestyle-provider/facilities/' . $facility['image'] }}"
                                                class="d-block w-100" alt="{{ $facility['facility_name'] }}">
                                        </div>
                                    @endif
                                </div>
                                @if (!empty($facility['media']['facility_images']) && count($facility['media']['facility_images']) > 1)
                                    <button class="carousel-control-prev" type="button" data-bs-target="#facilityCarousel"
                                        data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#facilityCarousel"
                                        data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Facility Details -->
                    <div class="col-lg-6 mb--40">
                        <div class="h-100 position-sticky sticky-top">
                            <div class="single-product-content">
                                <div class="inner">
                                    <h2 class="product-title">
                                        {{ $facility['facility_name'] ?? '' }}
                                        @if (!empty($facility['branch_name']))
                                            ({{ $facility['branch_name'] }})
                                        @endif
                                    </h2>

                                    <!-- Actual Price -->
                                    <span class="price-amount">₦{{ number_format($facility['actual_price'] ?? 0) }}</span>
                                    <span class="badge bg-secondary">{{ ucfirst($tier) }} Tier</span>

                                    <!-- Location -->
                                    <ul class="list-group list-group-flush mt-3">
                                        <!-- Location -->
                                        <li class="list-group-item d-flex align-items-center gap-2">
                                            <i class="fas fa-map-marker-alt text-primary"></i>
                                            <span>
                                                {{ $facility['location']['address'] ?? '' }},
                                                {{ $facility['location']['city'] ?? '' }},
                                                {{ $facility['location']['state'] ?? '' }}
                                            </span>
                                        </li>

                                        <!-- Operating Hours -->
                                        @if (!empty($facility['operating_hours']['opening_hours']))
                                            <li class="list-group-item">
                                                <i class="far fa-clock text-secondary"></i>
                                                <span class="ms-2">Operating Hours:</span>
                                                <ul class="mb-0 mt-1 ps-3">
                                                    @foreach ($facility['operating_hours']['opening_hours'] as $day => $hours)
                                                        @php
                                                            $open = $hours[0] ?? null;
                                                            $close = $hours[1] ?? null;
                                                        @endphp
                                                        <li class="d-flex justify-content-between">
                                                            <strong>{{ ucfirst($day) }}:</strong>
                                                            <span>{{ $open && $close ? "$open - $close" : 'Closed' }}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    </ul>


                                    <!-- Description -->
                                    <p class="description mt-3">
                                        {{ $facility['description'] ?? 'No description available.' }}</p>

                                    <!-- Amenities -->
                                    @if (!empty($facility['amenities']))
                                        <div class="facility-amenities mb--20 mt-4">
                                            <h5>Amenities:</h5>
                                            <ul class="list-inline">
                                                @foreach ($facility['amenities'] as $amenity)
                                                    <li class="list-inline-item badge bg-light text-dark m-1">
                                                        {{ ucfirst(str_replace('_', ' ', $amenity['amenity'])) }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <!-- Programs -->
                                    @if (!empty($facility['programs']))
                                        <div class="facility-programs mb--20">
                                            <h5>Programs Offered:</h5>
                                            <ul class="list-inline">
                                                @foreach ($facility['programs'] as $program)
                                                    @if (!empty($program['group_class_types']))
                                                        @foreach ($program['group_class_types'] as $class)
                                                            <li class="list-inline-item badge bg-primary m-1">
                                                                {{ ucfirst($class) }}</li>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <!-- Action Buttons -->
                                    <div class="product-action-wrapper d-flex-center mt-4">
                                        <a href="#" class="axil-btn btn-bg-primary mr-2" data-bs-toggle="modal"
                                            data-bs-target="#reserveModal">Reserve Now</a>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Facility Details -->

                </div>
            </div>
        </div>
    </div>
    <!-- End Single Facility Area -->

    <!-- Reserve Modal -->
    <div class="modal fade" id="reserveModal" tabindex="-1" aria-labelledby="reserveModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reserveModalLabel">Ready to Reserve?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        You’re about to leave this page and go to our <strong>Health
                            Passport portal</strong> to complete your reservation.
                        Make sure you’re logged in or register if you don’t have an account
                        yet.
                    </p>
                    <p class="text-muted">
                        This is the safest and fastest way to reserve your spot and view all
                        available options for this facility.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="axil-btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="https://healthpassport.africa/auth/login" target="_blank" class="axil-btn btn-bg-primary w-100  text-center">Go to
                        Health Passport</a>
                </div>
            </div>
        </div>
    </div>

@endsection
