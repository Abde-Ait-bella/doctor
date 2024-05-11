<!doctype HTML>
<html>

<head>
    @php
        $setting = App\Models\Setting::first();
    @endphp
    <title>{{ $setting->business_name }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ $setting->favicon }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <input type="hidden" name="base_url" id="base_url" value="{{ url('/') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <link rel="stylesheet" href="{{ url('assets/plugins/fancybox/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_admin/css/select2.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_admin/css/datatables.min.css') }}" />
    <script type="text/javascript" src="{{ url('assets_admin/js/sweetalert2@10.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/appointment_booking.css') }}">
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


    @yield('css')
    <style>
        :root {
            --site_color: <?php echo $setting->website_color;
            ?>;
            --site_color_hover: <?php echo $setting->website_color . '70';
            ?>;
        }
    </style>
</head>

@if (session()->has('direction') && session()->get('direction') == 'rtl')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">

    <body dir="rtl">
    @else

        <body>
@endif
@include('layout.partials.navbar_website')

@if (auth()->check())

    @if (auth()->user()->verify == 0)
        <script>
            var url = window.location.origin + window.location.pathname;
            var to = url.lastIndexOf('/');
            to = to == -1 ? url.length : to;
            url2 = url.substring(0, to);
            var a = url2 + '/send_otp';
            console.log(a);
            if (window.location.origin + window.location.pathname != a) {
                window.location.replace(a);
            }
        </script>
    @endif
@endif
<div class="main_content">
    @yield('content')
</div>
@include('layout.partials.footer')


<script src="{{ url('assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets_admin/js/datatables.min.js') }}"></script>
<script src="{{ url('assets_admin/js/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.js"></script>
<script src="{{ url('assets/js/custom.js') }}"></script>
<script src="{{ url('js/app.js') }}"></script>
{{-- <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initAutocomplete&libraries=places&v=weekly"
    defer></script> --}}
@yield('js')
</body>

</html>
