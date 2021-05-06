<!DOCTYPE html>
<html>
    <head>
        <title> NDUB exam management system </title>

        <!-- add icon link -->
        <link rel = "icon" href ="{{asset('contents/admin')}}/assets/img/ndub_logo.png"
        type = "image/x-icon">

        <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/style.css">
    </head>

    <body>

<!-- header section page -->

        <header>
           <div class="container-fluid index_header_container">
                <div class="row p-3 mb-3 index_header_row">
                   <div class="col-lg-12 col-md-12">
                       <img src="{{asset('contents/admin')}}/assets/img/cover.png" alt="logo" class="img-fluid index_header_img">
                   </div>
                </div>
            </div>
        </header>

<!-- page section for text -->

    <section>

          <div class="container-fluid">

            <div class="row content_text bg-info">

                <div class="col-12">

                       <!-- responsive menu start -->

                   <nav class="navbar navbar-expand-md navbar-light"> <!-- responsive break point -->

                       <div class="col-lg-12">

                        <h1 class="text-center text-light"> <b> Exam Management System </b> </h1>

                       </div>
                   </nav>
                </div>
             </div>
           </div>

    </section>

<!-- page section for menu -->

        <section>

             <div class="container-fluid">

                <div class="row index_menu_background">

                   <div class="col-12">

                       <!-- responsive menu start -->

                <nav class="navbar navbar-expand-md navbar-light"> <!-- responsive break point -->

                        <!-- icon & target for collapse -->

                        <button type="button" class="navbar-toggler bg-secondary" data-toggle="collapse"
                            data-target="#index_menus" > <!-- target id collapse -->

                            <span class="navbar-toggler-icon"></span>

                        </button>

                        <!-- div for collapse with target id -->

                        <div id="index_menus" class="collapse navbar-collapse">

                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"> <a href="{{url('login')}}" class="nav-link"> <h4><b>Student</b></h4> </a> </li>
                                <li class="nav-item"> <a href="{{url('login')}}" class="nav-link"> <h4><b>Faculty</b></h4> </a> </li>
                                <li class="nav-item"> <a href="{{url('login')}}" class="nav-link"> <h4><b>Course Coordinator</b></h4> </a> </li>
                                <li class="nav-item"> <a href="{{url('login')}}" class="nav-link"> <h4><b>Exam Controller</b></h4> </a> </li>
                                <li class="nav-item"> <a href="{{url('login')}}" class="nav-link"> <h4><b>Registrar Office</b></h4> </a> </li>
                            </ul>

                        </div>

                       <!-- div end collapse -->

                    </nav>

                   </div>

                </div>

            </div>

        </section>


<!-- footer section page -->

        <footer>

            <div class="container">

                <div class="row">

                </div>

            </div>

        </footer>

<!-- all js link -->

        <script src="{{asset('contents/admin')}}/assets/js/jquery-3.4.1.min.js"></script>
        <script src="{{asset('contents/admin')}}/assets/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('contents/admin')}}/assets/js/custom.js"></script>

    </body>

</html>
