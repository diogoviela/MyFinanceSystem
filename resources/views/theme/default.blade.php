<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

        <!-- Global stylesheets -->
        <link href="{!! asset('theme/global/assets/fonts/inter/inter.css') !!}" rel="stylesheet" type="text/css">
        <link href="{!! asset('theme/global/assets/icons/phosphor/styles.min.css') !!}" rel="stylesheet" type="text/css">
        <link href="{!! asset('theme/local/assets/css/ltr/all.min.css" id="stylesheet') !!}" rel="stylesheet"
              type="text/css">
        <!-- /global stylesheets -->

        <!-- Core JS files -->
        <script src="{!! asset('theme/global/assets/demo/demo_configurator.js') !!}"></script>
        <script src="{!! asset('theme/global/assets/js/bootstrap/bootstrap.bundle.min.js') !!}"></script>
        <!-- /core JS files -->

        <!-- Theme JS files -->
        <script src="{!! asset('theme/global/assets/js/vendor/visualization/d3/d3.min.js') !!}"></script>
        <script src="{!! asset('theme/global/assets/js/vendor/visualization/d3/d3_tooltip.js') !!}"></script>

        <script src="{!! asset('theme/local/assets/js/app.js') !!}"></script>
        <script src="{!! asset('theme/global/assets/demo/pages/dashboard.js') !!}"></script>
        <!-- /theme JS files -->

    </head>

    <body>

        <!-- Page content -->
        <div class="page-content">

            <!-- Main sidebar -->
            <div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">
                @include('theme.sidebar')
            </div>
            <!-- /main sidebar -->


            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Main navbar -->
                <div class="navbar navbar-expand-lg navbar-static shadow">
                    @include('theme.navbar')
                </div>
                <!-- /main navbar -->


                <!-- Inner content -->
                <div class="content-inner">

                    <!-- Page header -->
                    <div class="page-header">
                        @include('theme.header')
                    </div>
                    <!-- /page header -->


                    <!-- Content area -->
                    <div class="content pt-0">

                        @yield('content')

                    </div>
                    <!-- /content area -->


                    <!-- Footer -->
                    <div class="navbar navbar-sm navbar-footer border-top">
                        @include('theme.footer')
                    </div>
                    <!-- /footer -->

                </div>
                <!-- /inner content -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->
    </body>
</html>
