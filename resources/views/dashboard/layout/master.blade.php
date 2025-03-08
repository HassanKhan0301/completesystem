 <!DOCTYPE html>

 <html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
     data-assets-path="../assets/" data-template="vertical-menu-template-free">

 <head>
     <meta charset="utf-8" />
     <meta name="viewport"
         content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

     <title>Factorie | Dashboard</title>

     <meta name="description" content="" />

     <!-- Favicon -->
     <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com" />
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
     <link
         href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
         rel="stylesheet" />

     <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

     <!-- Core CSS -->
     <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
     <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
         class="template-customizer-theme-css" />
     <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

     <!-- Vendors CSS -->
     <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
     <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />


     <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
     <link rel="stylesheet"
         href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
     <link rel="stylesheet"
         href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">

     <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}">

     <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/umd/styles/index.min.css') }}">

     <!-- Data TAble -->

     <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
     <!-- DataTables -->
     <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

     <!-- Page CSS -->

     <!-- Helpers -->
     <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
     <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
     <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
     <script src="{{ asset('assets/js/config.js') }}"></script>

     <script src="{{ asset('assets/vendor/css/rtl/core.css') }}"></script>
     <script src="{{ asset('assets/js/template-customizer.js') }}"></script>

     <script src="{{ asset('assets/vendor/css/rtl/theme-default.css') }}"></script>
     <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

 <body>
     <!-- Layout wrapper -->
     <div class="layout-wrapper layout-content-navbar">
         <div class="layout-container">
             <!-- Menu -->
             @include('dashboard.layout.sidebar')
             <!-- navbar -->

             <!-- nav -->
             <!-- / Menu -->

             <!-- Layout container -->
             <div class="layout-page">
                 <!-- Navbar -->

                 @include('dashboard.layout.header')
                 <!-- / Navbar -->

                 <!-- Content wrapper -->
                 <div class="content-wrapper">
                     <!-- Content -->
                     @yield('content')

                     <!-- / Content -->

                     <!-- Footer -->
                     @include('dashboard.layout.footer')
                     <!-- / Footer -->

                 </div>
                 <!-- Content wrapper -->
             </div>
             <!-- / Layout page -->
         </div>

     </div>
     <!-- / Layout wrapper -->


     <!-- Core JS -->
     <!-- build:js assets/vendor/js/core.js -->

     <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
     <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
     <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
     <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
     <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
     <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
     <script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
     <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>


     <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
     <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>

     <script src="{{ asset('assets/vendor/libs/@form-validation/umd/bundle/popular.min.js') }}"></script>
     <script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
     <script src="{{ asset('assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>

     <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
     <script src="{{ asset('assets/vendor/js/tables-datatables-basic.js') }}"></script>




     <!-- endbuild -->

     <!-- Vendors JS -->
     <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

     <!-- Main JS -->
     <script src="{{ asset('assets/js/main.js') }}"></script>

     <!-- Page JS -->
     <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
     <!-- Data Table -->
     <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
     <!-- Bootstrap 4 -->
     <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
     <!-- DataTables  & Plugins -->
     <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
     <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
     <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
     <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
     <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
     <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
     <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
     <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
     <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
     <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
     <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
     <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

     @yield('script')
 </body>

 </html>
