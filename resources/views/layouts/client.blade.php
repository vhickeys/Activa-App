<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.partials.head')

<body>

    @include('layouts.partials.header')

    <main class="main-wrapper">

        <x-toast />

        @yield('content')

    </main>

    @include('layouts.partials.footer')

    @include('layouts.partials.scripts')

</body>

</html>
