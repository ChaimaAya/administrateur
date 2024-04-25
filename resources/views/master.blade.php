<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="shortcut icon" type="image/png" href="images/logo.png">
    <!-- Fichiers CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="/vendor/swiper/css/swiper-bundle.min.css" rel="stylesheet">
    <link href="/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="../../cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.4/nouislider.min.css" rel="stylesheet">
    <link href="/vendor/jvmap/jquery-jvectormap.css" rel="stylesheet">
    <link href="/../../cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="/vendor/tagify/dist/tagify.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    {{-- chart cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>

    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>

    <div id="main-wrapper">

        @include('partials.navheader')

        @include('partials.header')



        @include('partials.sidebar')


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            @yield('body')
        </div>



       @include('partials.footer')



    </div>
    @yield('scripts')


        <!-- Scripts -->
        <script src="/vendor/global/global.min.js"></script>
    <script src="/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="/vendor/apexchart/apexchart.js"></script>
    <script src="/js/dashboard/dashboard-1.js"></script>
    <script src="/vendor/draggable/draggable.js"></script>
    <script src="/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/js/buttons.html5.min.js"></script>
    <script src="/vendor/datatables/js/jszip.min.js"></script>
    <script src="/js/plugins-init/datatables.init.js"></script>
    <script src="/vendor/tagify/dist/tagify.js"></script>
    <script src="/vendor/bootstrap-datetimepicker/js/moment.js"></script>
    <script src="/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="/js/custom.js"></script>
    <script src="/js/deznav-init.js"></script>
    <script src="/js/demo.js"></script>
    <script src="/js/styleSwitcher.js"></script>
    <script src="/vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="/vendor/jqvmap/js/jquery.vmap.world.js"></script>
    <script src="/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

</body>
</html>
