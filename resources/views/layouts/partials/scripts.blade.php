<!-- Modernizer JS -->
<script src="{{ asset('client/assets/js/vendor/modernizr.min.js') }}"></script>
<!-- jQuery JS -->
<script src="{{ asset('client/assets/js/vendor/jquery.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('client/assets/js/vendor/popper.min.js') }}"></script>
<script src="{{ asset('client/assets/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('client/assets/js/vendor/slick.min.js') }}"></script>
<script src="{{ asset('client/assets/js/vendor/js.cookie.js') }}"></script>
<!-- <script src="assets/js/vendor/jquery.style.switcher.js') }}"></script> -->
<script src="{{ asset('client/assets/js/vendor/jquery-ui.min.js') }}"></script>
<script src="{{ asset('client/assets/js/vendor/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{ asset('client/assets/js/vendor/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('client/assets/js/vendor/sal.js') }}"></script>
<script src="{{ asset('client/assets/js/vendor/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('client/assets/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('client/assets/js/vendor/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('client/assets/js/vendor/counterup.js') }}"></script>
<script src="{{ asset('client/assets/js/vendor/waypoints.min.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('client/assets/js/main.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const input = document.getElementById('facility-search-input');
        const resultsBox = document.getElementById('facility-search-results');
        let debounceTimer = null;

        function renderFacilities(facilities) {
            if (!facilities.length) {
                resultsBox.innerHTML =
                    `<p class="text-muted text-center">No facilities found</p>`;
                return;
            }

            resultsBox.innerHTML = facilities.map(facility => `
            <div class="axil-product-list">
                <div class="thumbnail">
                    <a href="${facility.url}">
                        <img src="${facility.image}" alt="${facility.name}" class="facility-search-thumb">
                    </a>
                </div>
                <div class="product-content">
                    <h6 class="product-title">
                        <a href="${facility.url}">
                            ${facility.name}
                        </a>
                    </h6>

                    <span class="badge bg-secondary mb-1">
                        ${facility.tier ? facility.tier.toUpperCase() : ''}
                    </span>

                    <div class="product-price-variant">
                        ₦${Number(facility.price).toLocaleString()}
                    </div>
                </div>
            </div>
        `).join('');
        }

        async function fetchFacilities(query = '') {
            resultsBox.innerHTML =
                `<p class="text-muted text-center">Searching...</p>`;

            try {
                const res = await fetch(
                    `/search/facilities?q=${encodeURIComponent(query)}`
                );
                const data = await res.json();
                renderFacilities(data);
            } catch (e) {
                resultsBox.innerHTML =
                    `<p class="text-danger text-center">Failed to load results</p>`;
            }
        }

        // Initial load
        fetchFacilities();

        input.addEventListener('input', () => {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                fetchFacilities(input.value);
            }, 300);
        });
    });
</script>
