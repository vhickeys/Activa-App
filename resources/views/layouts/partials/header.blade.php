    <header class="header axil-header header-style-2">
        <div class="header-top-campaign">
            <div class="container position-relative">
                <div class="campaign-content">
                    <div class="campaign-countdown"></div>
                    <p>Choose the plan that fits your lifestyle <a href="javascript:void(0)">Get Your Offer</a></p>
                </div>
            </div>
            <button class="remove-campaign"><i class="fal fa-times"></i></button>
        </div>
        <!-- Start Header Top Area  -->
        <div class="axil-header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-sm-3 col-5">
                        <div class="header-brand">
                            <a href="{{ route('homepage') }}" class="logo logo-dark">
                                <h4 class="fw-bold">ACTIVA</h4>
                                {{-- <img src="{{ asset('client/assets/images/logo/logo.png') }}" alt="Site Logo"> --}}
                            </a>
                            <a href="{{ route('homepage') }}" class="logo logo-light">
                                <h4 class="fw-bold">ACTIVA</h4>
                                {{-- <img src="{{ asset('client/assets/images/logo/logo-light.png') }}" alt="Site Logo"> --}}
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-sm-9 col-7">
                        <div class="header-top-dropdown dropdown-box-style">
                            <div class="axil-search">
                                <button type="submit" class="icon wooc-btn-search">
                                    <i class="far fa-search"></i>
                                </button>
                                <input type="search" class="placeholder product-search-input" name="search2"
                                    id="search2" value="" maxlength="128"
                                    placeholder="What are you looking for...." autocomplete="off">
                            </div>
                            <div class="dropdown">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    USD
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:void(0)">USD</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)">AUD</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)">EUR</a></li>
                                </ul>
                            </div>
                            <div class="dropdown">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    EN
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:void(0)">EN</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)">ARB</a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0)">SPN</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top Area  -->

        <!-- Start Mainmenu Area  -->
        <div class="axil-mainmenu aside-category-menu">
            <div class="container">
                <div class="header-navbar">
                    <div class="header-nav-department">

                        <aside class="header-department">
                            <button class="header-department-text department-title bg-primary">
                                <span class="icon"><i class="fal fa-bars"></i></span>
                                <span class="text">Our Services</span>
                            </button>

                            <nav class="department-nav-menu">
                                <button class="sidebar-close"><i class="fas fa-times"></i></button>

                                <ul class="nav-menu-list">

                                    @forelse ($categories as $category)
                                        <li>
                                            <a href="javascript:void(0)" class="nav-link has-megamenu">

                                                <span class="menu-icon">
                                                    <img src="{{ $apiUrl . '/storage/activa/facility-categories/' . ($category['image'] ?? 'placeholder.png') }}"
                                                        alt="{{ $category['name'] }}">
                                                </span>

                                                <span class="menu-text">
                                                    {{ $category['name'] }}
                                                </span>
                                            </a>

                                            {{-- Mega Menu --}}
                                            <div class="department-megamenu">
                                                <div class="department-megamenu-wrap">

                                                    <div class="department-submenu-wrap">
                                                        <div class="department-submenu">
                                                            <h3 class="submenu-heading">
                                                                {{ $category['name'] }} Facilities
                                                            </h3>

                                                            <ul>
                                                                @forelse ($category['lifestyle_provider_facilities'] as $facility)
                                                                    <li>
                                                                        <a
                                                                            href="{{ route('facility.details', ['slug' => $facility['slug']]) }}">
                                                                            {{ $facility['facility_name'] }}

                                                                            @if (!empty($facility['location']))
                                                                                <small class="text-muted">
                                                                                    ({{ $facility['location']['city'] }})
                                                                                </small>
                                                                            @endif
                                                                        </a>
                                                                    </li>
                                                                @empty
                                                                    <li>
                                                                        <span class="text-muted">
                                                                            No facilities available
                                                                        </span>
                                                                    </li>
                                                                @endforelse
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    {{-- Featured Images --}}
                                                    @php
                                                        $firstFacility =
                                                            $category['lifestyle_provider_facilities'][0] ?? null;
                                                        $images = $firstFacility['media']['facility_images'] ?? [];
                                                    @endphp

                                                    @if (!empty($images))
                                                        <div class="featured-product">
                                                            <h3 class="featured-heading">Featured</h3>

                                                            <div class="product-list">
                                                                @foreach (array_slice($images, 0, 4) as $image)
                                                                    <div class="item-product">
                                                                        <a
                                                                            href="{{ route('facility.details', ['slug' => $firstFacility['slug']]) }}">
                                                                            <img src="{{ $apiUrl . '/storage/lifestyle-provider/facilities/media/' . $image }}"
                                                                                alt="Activa">
                                                                        </a>
                                                                    </div>
                                                                @endforeach
                                                            </div>

                                                            <a href="{{ route('facility.details', ['slug' => $facility['slug']]) }}"
                                                                class="axil-btn btn-bg-primary">
                                                                View All {{ $category['name'] }}
                                                            </a>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        <li>
                                            <span class="menu-text">No categories found</span>
                                        </li>
                                    @endforelse

                                </ul>
                            </nav>
                        </aside>


                    </div>
                    <div class="header-main-nav">
                        <!-- Start Mainmanu Nav -->
                        <nav class="mainmenu-nav">
                            <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                            <div class="mobile-nav-brand">
                                <a href="{{ route('homepage') }}" class="logo">
                                    <h4 class="fw-bold">ACTIVA</h4>
                                    {{-- <img src="{{ asset('client/assets/images/logo/logo.png') }}" alt="Site Logo"> --}}
                                </a>
                            </div>
                            <ul class="mainmenu">
                                <li><a href="{{ route('homepage') }}"
                                        class="{{ request()->routeIs('homepage') ? 'active' : '' }}">Home</a></li>
                                <li><a href="{{ route('about') }}"
                                        class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
                                <li><a href="https://healthpassport.africa/contact">Contact</a></li>
                            </ul>
                        </nav>
                        <!-- End Mainmanu Nav -->
                    </div>
                    <div class="header-action">
                        <ul class="action-list">
                            <li class="axil-search d-sm-none d-block">
                                <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                    <i class="flaticon-magnifying-glass"></i>
                                </a>
                            </li>
                            <li class="my-account">
                                <a href="javascript:void(0)">
                                    <i class="flaticon-person"></i>
                                </a>
                                <div class="my-account-dropdown">
                                    <span class="title">QUICKLINKS</span>
                                    <ul>
                                        <li>
                                            <a href="https://healthpassport.africa/auth/login">My Account</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Support</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">Language</a>
                                        </li>
                                    </ul>
                                    <div class="login-btn">
                                        <a href="https://healthpassport.africa/auth/login"
                                            class="axil-btn btn-bg-primary">Login</a>
                                    </div>
                                    <div class="reg-footer text-center">No account yet? <a
                                            href="https://healthpassport.africa/auth/register"
                                            class="btn-link">REGISTER HERE.</a></div>
                                </div>
                            </li>
                            <li class="axil-mobile-toggle">
                                <button class="menu-btn mobile-nav-toggler">
                                    <i class="flaticon-menu-2"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mainmenu Area  -->
    </header>
