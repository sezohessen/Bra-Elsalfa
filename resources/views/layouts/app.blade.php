<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- favicon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">
    <title>Guess Who</title>
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- Page-Revealer -->
    <script src="{{ asset('js/tg-page-head.js') }}"></script>


</head>

<body>
    {{-- <button class="scroll__top scroll-to-target" data-target="html">
        <i class="fa-sharp fa-light fa-up-to-line"></i>
    </button> --}}
    <div id="app">
        @yield('content')
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/ajax-form.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
