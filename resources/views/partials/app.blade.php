<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>| @yield('title') </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('adminPanel/images/favicon.png')}}">
    <link href="{{asset('adminPanel/vendor/pg-calendar/css/pignose.calendar.min.css')}}" rel="stylesheet">
    <link href="{{asset('adminPanel/vendor/chartist/css/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('adminPanel/css/style.css')}}" rel="stylesheet">
    <!-- {{asset('adminPanel/')}} -->

    <!-- Datatable -->
    <link href="{{asset('adminPanel/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <!-- font-awesome Link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{asset('adminPanel/vendor/select2/css/select2.min.css')}}">
    @stack('style')
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{route('admin.home')}}" class="brand-logo">
                <h3 class="text-success">Admin Panel</h3><br>
                <!-- <img class="logo-abbr" src="{{asset('adminPanel/images/logo.png')}}" alt="">
                <img class="logo-compact" src="{{asset('adminPanel/images/logo-text.png')}}" alt="">
                <img class="brand-title" src="{{asset('adminPanel/images/logo-text.png')}}" alt=""> -->
            </a>



            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        @include('partials.header')
        @include('partials.sidebar')
        @yield('content')
        @include('partials.footer')



    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('adminPanel/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('adminPanel/js/quixnav-init.js')}}"></script>
    <script src="{{asset('adminPanel/js/custom.min.js')}}"></script>

    <script src="{{asset('adminPanel/vendor/chartist/js/chartist.min.js')}}"></script>

    <script src="{{asset('adminPanel/vendor/moment/moment.min.js')}}"></script>
    <script src="{{asset('adminPanel/vendor/pg-calendar/js/pignose.calendar.min.js')}}"></script>


    <script src="{{asset('adminPanel/js/dashboard/dashboard-2.js')}}"></script>
    <!-- Circle progress -->

    <!-- Datatable -->
    <script src="{{asset('adminPanel/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('adminPanel/js/plugins-init/datatables.init.j')}}s"></script>

    <!-- Select2 Script -->
    <script src="{{asset('adminPanel/vendor/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('adminPanel/js/plugins-init/select2-init.js')}}"></script>

    @stack('script')

</body>

</html>