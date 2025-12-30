<!-- Bootstrap Toast Notification Component -->
<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 999999;">

    {{-- Success Message --}}
    @if (session('success'))
        <div class="toast align-items-center text-bg-success border-0 show mb-2" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    @endif

    {{-- Warning Message --}}
    @if (session('warning'))
        <div class="toast align-items-center text-bg-warning border-0 show mb-2" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('warning') }}
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    @endif

    {{-- Error Message --}}
    @if (session('error'))
        <div class="toast align-items-center text-bg-danger border-0 show mb-2" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('error') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    @endif

    {{-- Laravel Validation Errors --}}
    @if ($errors->any())
        <div class="toast align-items-center text-bg-danger border-0 show mb-2" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    <strong>Fix the following errors:</strong>
                    <ul class="mt-2 mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    @endif

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var toastElements = document.querySelectorAll('.toast');
        toastElements.forEach(function(toastEl) {
            var t = new bootstrap.Toast(toastEl, {
                delay: 4000
            });
            t.show();
        });
    });
</script>
