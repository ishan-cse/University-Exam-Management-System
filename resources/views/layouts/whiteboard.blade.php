<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <title> NDUB exam management system </title>

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="csrf-token" content="{{ csrf_token() }}">
         <!-- add icon link -->
        <link rel = "icon" href ="{{asset('contents/admin')}}/assets/img/ndub_logo.png" type = "image/x-icon">
        <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/fonts/fontawesome-free-5.12.0-web/css/all.min.css">
        <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/style.css">
        <script src="{{asset('contents/admin')}}/assets/js/jquery-3.4.1.min.js"></script>
        <script src="{{asset('contents/admin')}}/assets/js/sweetalert.min.js"></script>
    </head>

    <body>


        <header>
            <div class="container-fluid header_container">
                <div class="row p-3 mb-3 header_row">
                    <img src="{{asset('contents/admin')}}/assets/img/cover.png" alt="logo" class="img-fluid header_img">
                </div>
            </div>
        </header>

        <section class="content-section">
            <div class="container-fluid">
                <div class="row">  <!-- dashboard -->

                  <div class="col-md-12 p-3 mb-2 bg-light text-dark" id="dashboard_section"> <!-- dashboard information section -->
            <!--       <div class="scrollable">  -->

                      <!--data -->
                    @yield('dashboard_information')

                   </div>
                  </div>


                </div>
        </section>

        <footer class="footer-section">

            <div class="container-fluid">

            </div>

        </footer>

<!-- all js link -->

        <script src="{{asset('contents/admin')}}/assets/js/jquery.dataTables.min.js"></script>
        <script src="{{asset('contents/admin')}}/assets/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('contents/admin')}}/assets/js/custom.js"></script>
        <script src="{{asset('contents/admin')}}/assets/js/pdf.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>


    </body>


</html>
