<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> ROOMZIO </title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="{{ asset('css/core/libs.min.css') }}" />

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="{{ asset('css/hope-ui.min.css?v=1.2.0') }}" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('css/custom.min.css?v=1.2.0') }}" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="{{ asset('css/dark.min.css') }}"/>

    <!-- Customizer Css -->
    <link rel="stylesheet" href="{{ asset('css/customizer.min.css') }}" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="{{ asset('css/rtl.min.css') }}"/>

</head>

<body>

    <!-- loader Start -->

    <div id="loading">

      <div class="loader simple-loader">

          <div class="loader-body"></div>

      </div>    

    </div>

    <!-- loader END -->

    <!--Sidebar Start-->

      @section('sidebar')

        @include('layouts.sidebar')

      @show

    <!--Sidebar End-->

    <main class="main-content">

      <div class="position-relative iq-banner">

        <!--Nav Start-->

          @section('nav')

            @include('layouts.nav')

          @show

        <!--Nav End-->

      </div>

      <div class="conatiner-fluid content-inner mt-n5 py-0">

        <div>
        
          @yield('content')

        </div>

      </div>

      <!-- Footer Section Start -->

        @section('footer')

          @include('layouts.footer')

        @show

      <!-- Footer Section End -->

    </main>

    <!-- Wrapper End-->

</body>
</html>

<!-- Scripts -->

<!-- Library Bundle Script -->
<script src="{{ asset('js/core/libs.min.js') }}"></script>

<!-- External Library Bundle Script -->
<script src="{{ asset('js/core/external.min.js') }}"></script>

<!-- Widgetchart Script -->
<script src="{{ asset('js/charts/widgetcharts.js') }}"></script>

<!-- mapchart Script -->
<script src="{{ asset('js/charts/vectore-chart.js') }}"></script>
<script src="{{ asset('js/charts/dashboard.js') }}" ></script>

<!-- fslightbox Script -->
<script src="{{ asset('js/plugins/fslightbox.js') }}"></script>

<!-- Settings Script -->
<script src="{{ asset('js/plugins/setting.js') }}"></script>

<!-- Slider-tab Script -->
<script src="{{ asset('js/plugins/slider-tabs.js') }}"></script>

<!-- Form Wizard Script -->
<script src="{{ asset('js/plugins/form-wizard.js') }}"></script>

<!-- AOS Animation Plugin-->

<!-- App Script -->
<script src="{{ asset('js/hope-ui.js') }}" defer></script>
