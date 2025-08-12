<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'E-VotePortal Admin') - {{ config('app.name', 'E-VotePortal') }}</title>
    
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <!-- End plugin css for this page -->
    
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/style.css') }}">
    <!-- Custom voting system styles -->
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/voting-system.css') }}">
    <!-- End layout styles -->
    
    <link rel="shortcut icon" href="{{ asset('admin-assets/assets/images/favicon.png') }}" />
    
    @stack('styles')
</head>
<body class="admin-layout light-theme">
    <div class="container-scroller light-theme">
        <!-- Top Banner (can be removed later) -->
        @include('admin.partials.banner')
        
        <!-- Sidebar -->
        @include('admin.partials.sidebar')
        
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- Navbar -->
            @include('admin.partials.navbar')
            
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                
                <!-- Footer -->
                @include('admin.partials.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    
    <!-- plugins:js -->
    <script src="{{ asset('admin-assets/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    
    <!-- Plugin js for this page -->
    <script src="{{ asset('admin-assets/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    
    <!-- inject:js -->
    <script src="{{ asset('admin-assets/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/js/misc.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/js/settings.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    
    <!-- Custom js for this page -->
    <script src="{{ asset('admin-assets/assets/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->
    
    @stack('scripts')
</body>
</html>
