<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>| @yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('users/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('users/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('users/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('users/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('users/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('users/js/select.dataTables.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('users/css/vertical-layout-light/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('users/images/favicon.png')}}" />

    <!-- font-awesome Link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @stack('style')
</head>

<body>
    <div class="container-scroller">
        @include('partials.stores.header')
        <div class="container-fluid page-body-wrapper">
            @include('partials.stores.settings-panel')
            @include('partials.stores.sidebar')
            @yield('store-content')
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{asset('users/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('users/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('users/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('users/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('users/js/dataTables.select.min.js')}}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('users/js/off-canvas.js')}}"></script>
    <script src="{{asset('users/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('users/js/template.js')}}"></script>
    <script src="{{asset('users/js/settings.js')}}"></script>
    <script src="{{asset('users/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('users/js/dashboard.js')}}"></script>
    <script src="{{asset('users/js/Chart.roundedBarCharts.js')}}"></script>
    <!-- End custom js for this page-->
    <!-- Data Table Script -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

    @stack('script')
</body>

</html>