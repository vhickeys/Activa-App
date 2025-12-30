@extends('layouts.client')

@section('title', 'About')

@section('content')

    <!-- Start About Area  -->
    <div class="axil-about-area about-style-1 axil-section-gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-4 col-lg-6">
                    <div class="about-thumbnail">
                        <div class="thumbnail">
                            <img src="{{ asset('client/assets/images/about/about-01.png') }}" alt="About Activa">
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-6">
                    <div class="about-content content-right">
                        <span class="title-highlighter highlighter-primary2">
                            <i class="far fa-heartbeat"></i> About Activa
                        </span>

                        <h3 class="title">
                            Discover, access, and reserve trusted lifestyle & wellness facilities.
                        </h3>

                        <span class="text-heading">
                            Activa connects individuals and organizations to verified gyms, sports clubs,
                            yoga studios, health clubs, and lifestyle spaces, all in one intelligent platform.
                        </span>

                        <div class="row">
                            <div class="col-xl-6">
                                <p>
                                    With Activa, users can explore lifestyle facilities based on quality,
                                    amenities, location, operating hours, and experience standards.
                                    Our scoring and tier system ensures transparency and trust.
                                </p>
                            </div>

                            <div class="col-xl-6">
                                <p class="mb--0">
                                    Seamlessly integrated with Health Passport, Activa enables secure
                                    reservations, access management, and verified user experiences
                                    across Africa’s growing wellness ecosystem.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Area  -->


    <!-- Start About Info Area -->
    <div class="about-info-area">
        <div class="container pb-5">
            <div class="row row--20">

                <div class="col-lg-4">
                    <div class="about-info-box">
                        <div class="thumb">
                            <img src="{{ asset('client/assets/images/about/shape-01.png') }}" alt="Verified Facilities">
                        </div>
                        <div class="content">
                            <h6 class="title">Verified Facilities</h6>
                            <p>
                                Access lifestyle providers that meet quality,
                                safety, and operational standards.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="about-info-box">
                        <div class="thumb">
                            <img src="{{ asset('client/assets/images/about/shape-02.png') }}" alt="Smart Access">
                        </div>
                        <div class="content">
                            <h6 class="title">Smart Reservations</h6>
                            <p>
                                Book and manage access through Health Passport
                                with confidence and ease.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="about-info-box">
                        <div class="thumb">
                            <img src="{{ asset('client/assets/images/about/shape-03.png') }}" alt="Pan-African Network">
                        </div>
                        <div class="content">
                            <h6 class="title">Growing African Network</h6>
                            <p>
                                A fast-growing ecosystem of gyms, hotels,
                                studios, and wellness centers across Africa.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End About Info Area -->


@endsection
