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


                  <div class="col-lg-3 col-md-12 p-3 mb-2 text-white side_bars"> <!-- sidebar menu -->

                  <p class="dsb_text text-center">Dashboard</p>

                  @if(Auth::user()->image_name!='')

                  @if(Auth::user()->role_name=='Student')
                  <img src="{{asset('uploads/Student')}}/{{Auth::user()->image_name}}" alt="photo" class="rounded-circle img-fluid mx-auto d-block profile-img img-thumbnail" height="85px" width="85px">
                  @elseif(Auth::user()->role_name=='Faculty')
                  <img src="{{asset('uploads/Faculty')}}/{{Auth::user()->image_name}}" alt="photo" class="rounded-circle img-fluid mx-auto d-block profile-img img-thumbnail" height="85px" width="85px">
                  @elseif(Auth::user()->role_name=='Course Coordinator')
                  <img src="{{asset('uploads/Course Coordinator')}}/{{Auth::user()->image_name}}" alt="photo" class="rounded-circle img-fluid mx-auto d-block profile-img img-thumbnail" height="85px" width="85px">
                  @elseif(Auth::user()->role_name=='Registrar')
                  <img src="{{asset('uploads/Registrar')}}/{{Auth::user()->image_name}}" alt="photo" class="rounded-circle img-fluid mx-auto d-block profile-img img-thumbnail" height="85px" width="85px">
                  @elseif(Auth::user()->role_name=='Exam Controller')
                  <img src="{{asset('uploads/Exam Controller')}}/{{Auth::user()->image_name}}" alt="photo" class="rounded-circle img-fluid mx-auto d-block profile-img img-thumbnail" height="85px" width="85px">
                  @endif

                  @else
                  <img src="{{asset('uploads')}}/avatar.jpg" alt="photo" class="rounded-circle img-fluid mx-auto d-block profile-img img-thumbnail" height="85px" width="85px">
                  @endif

                  <h5 class="text-center dsb_sidebar_info">{{Auth::user()->name}}</h5>

                  <h6 class="text-center dsb_sidebar_info">{{Auth::user()->role_name}}</h6>

                  <nav class="navbar navbar-expand-lg navbar-light"> <!-- responsive break point -->

                      <!-- icon & target for collapse -->

                      <div class="col-xl-12">

                  <button type="button" class="navbar-toggler bg-light" data-toggle="collapse"
                      data-target="#menus" > <!-- target id collapse -->

                      <span class="navbar-toggler-icon"></span>

                  </button>

                  <div class="row menu">

                      <!-- div for collapse with target id -->

                      <div id="menus" class="collapse navbar-collapse sidevars">

                          <ul>
                              <li><a href="{{url('/dashboard')}}" class="menup"><i class="fas fa-user-circle"></i> My Profile</a></li>

                              <li><a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-edit"></i> Update Your Profile </a>

                                  <ul class="collapse list-unstyled" id="homeSubmenu1">

                                      <li><a href="{{url('/update/profile')}}"> <i class="fas fa-edit"></i> Profile Information </a></li>
                                      <li><a href="{{url('/update/profile/photo')}}"> <i class="fas fa-upload"></i> Upload New Photo </a></li>
                                      <li><a href="{{url('/update/profile/password')}}"> <i class="fas fa-edit"></i> Change Password </a></li>

                                  </ul>

                              </li>

                          @if(Auth::user()->role_name=='Registrar')


                              <li><a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-user-edit"></i> Create New Account </a>

                                  <ul class="collapse list-unstyled" id="homeSubmenu2">

                                    @php
                                      $fac="Faculty";
                                      $stu="Student";
                                      $cco="Course Coordinator";
                                    @endphp

                                      <li><a href="{{url('/registrar/add/'.$fac)}}"> <i class="fas fa-user-circle"></i> Faculty </a></li>
                                      <li><a href="{{url('/registrar/add/'.$stu)}}"> <i class="fas fa-user-circle"></i> Student </a></li>
                                      <li><a href="{{url('/registrar/add/'.$cco)}}"> <i class="fas fa-user-circle"></i> Course Coordinator </a></li>

                                  </ul>

                              </li>


                              <li><a href="{{url('registrar/create/department')}}"><i class="fas fa-edit"></i> Create New Department </a></li>

                              <li><a href="{{url('registrar/create/batch')}}"><i class="fas fa-edit"></i> Create New Batch </a></li>

                              <li><a href="{{url('registrar/create/trimester')}}"><i class="fas fa-edit"></i> Create New Trimester </a></li>

                              <li><a href="{{url('registrar/all_department')}}"><i class="fas fa-archive"></i> All Departments </a></li>

                              <li><a href="{{url('registrar/all_batch')}}"><i class="fas fa-archive"></i> All Batches </a></li>

                              <li><a href="{{url('registrar/view_all_student')}}"><i class="fas fa-user-friends"></i> All Students </a></li>

                              <li><a href="{{url('registrar/view_all_faculty')}}"><i class="fas fa-user-friends"></i> All Faculties </a></li>

                              <li><a href="#homeSubmenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="far fa-envelope"></i> Request for Assigning Faculty </a>

                                  <ul class="collapse list-unstyled" id="homeSubmenu6">

                                      <li><a href="{{url('/registrar/view_regular_assign_courses/only_select_trimester')}}"> <i class="fas fa-folder-open"></i> Regular Course </a></li>
                                      <li><a href="{{url('/registrar/view_repeat_retake_assign_courses/only_select_trimester')}}"> <i class="fas fa-folder-open"></i> Repeat/Retake Course </a></li>
                                      <li><a href="{{url('/registrar/view_supplementary_assign_courses/only_select_trimester')}}"> <i class="fas fa-folder-open"></i> Supplementary Exam </a></li>


                                  </ul>

                              </li>

                          @endif

                          @if(Auth::user()->role_name=='Course Coordinator')
<!--
                          <li><a href="{{url('/course_coordinator/create/course_edition')}}" class="menup"><i class="fas fa-user-circle icon"></i> Create New Course Edition </a></li>

                          <li><a href="{{url('/course_coordinator/create/course/select_edition')}}" class="menup"><i class="fas fa-user-circle icon"></i> Create New Course </a></li>
-->

                          <li><a href="{{url('/course_coordinator/see_maximum_credit_hours_for_faculty/first_step')}}" class="menup"><i class="far fa-folder-open"></i> Faculties maximum Credit Hours </a></li>

                          <li><a href="{{url('/course_coordinator/assign_regular_course_to_batch/first_step')}}" class="menup"><i class="fas fa-edit"></i> Assign Regular Course for Batch </a></li>

                          <li><a href="{{url('/course_coordinator/assign/repeat_retake_course/student/first_step')}}"> <i class="fas fa-edit"></i> Assign Repeat/Retake Course </a></li>

                          <li><a href="{{url('/course_coordinator/assign/supplemetary_exam/first_step')}}" class="menup"><i class="fas fa-edit"></i> Assign Supplementary Exam </a></li>

                          <li><a href="{{url('/course_coordinator/assign/single_course_with_batch/first_step')}}" class="menup"><i class="fas fa-edit"></i> Assign Single Course with Batch </a></li>

                          <li><a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-edit"></i> Assign Faculty </a>

                              <ul class="collapse list-unstyled" id="homeSubmenu4">

                                  <li><a href="{{url('/course_coordinator/view_regular_assign_courses/only_select_trimester')}}"> <i class="fas fa-edit"></i> Regular Course </a></li>
                                  <li><a href="{{url('/course_coordinator/view_repeat_retake_assign_courses/only_select_trimester')}}"> <i class="fas fa-edit"></i> Single Repeat/Retake Course </a></li>
                                  <li><a href="{{url('/course_coordinator/view_supplementary_assign_courses/only_select_trimester')}}"> <i class="fas fa-edit"></i> Supplementary Exam </a></li>

                              </ul>

                          </li>

                          @endif

                          @if(Auth::user()->role_name=='Faculty')


                          <li><a href="#homeSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="far fa-envelope"></i> Assigned Courses </a>

                              <ul class="collapse list-unstyled" id="homeSubmenu5">

                                  <li><a href="{{url('/faculty/view_regular_assign_courses/only_select_trimester')}}"> <i class="fas fa-folder-open"></i> Regular Courses </a></li>
                                  <li><a href="{{url('/faculty/view_repeat_retake_assign_courses/only_select_trimester')}}"> <i class="fas fa-folder-open"></i> Single Repeat/Retake Courses </a></li>
                                  <li><a href="{{url('/faculty/view_supplementary_assign_courses/only_select_trimester')}}"> <i class="fas fa-folder-open"></i> Supplementary Courses </a></li>

                              </ul>

                          </li>


                          <li><a href="{{url('faculty/mark_updated_by_exam_controller_information')}}" class="menup"><i class="fas fa-folder-open"></i> Mark Update Information </a></li>


                          @endif

                          @if(Auth::user()->role_name=='Exam Controller')


                          <li><a href="#homeSubmenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="far fa-file-alt"></i> Mark Sheets </a>

                              <ul class="collapse list-unstyled" id="homeSubmenu6">

                                  <li><a href="{{url('/exam_controller/view_regular_assign_courses/only_select_trimester')}}"> <i class="far fa-file-alt"></i> Regular Courses </a></li>
                                  <li><a href="{{url('/exam_controller/view_repeat_retake_assign_courses/only_select_trimester')}}"> <i class="far fa-file-alt"></i> Single Repeat/Retake Courses </a></li>
                                  <li><a href="{{url('/exam_controller/view_supplementary_assign_courses/only_select_trimester')}}"> <i class="far fa-file-alt"></i> Supplementary Courses </a></li>

                              </ul>

                          </li>

                          <li><a href="{{url('exam_controller/view_trimester_for_publish_result')}}" class="menup"><i class="fas fa-poll-h"></i> Publish Trimester Result </a></li>

                          <li><a href="{{url('exam_controller/view_unsubmit_marksheets/only_select_trimester')}}" class="menup"><i class="far fa-folder-open"></i> Unsubmit Marksheets </a></li>

                          @endif

                          @if(Auth::user()->role_name=='Student')

                          <li><a href="{{url('student/view_trimester_result/only_select_trimester')}}" class="menup"><i class="far fa-file-alt"></i> Trimester Result </a></li>
                          <li><a href="{{url('student/view_all_the_completed_trimester_result')}}" class="menup"><i class="fas fa-poll-h"></i> Mark Sheet's Transcript </a></li>
                          <li><a href="{{url('student/view_total_remaining_credit_hours')}}" class="menup"><i class="fas fa-stopwatch"></i> Remaining Credit Hours/Trimester </a></li>

                          @endif



                              <!-- dropdown menu

                              <li><a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="far fa-envelope icon"></i> mail </a>

                                  <ul class="collapse list-unstyled" id="homeSubmenu">

                                      <li><a href="#"> <i class="fas fa-user-circle icon"></i> home1</a></li>
                                      <li><a href="#"> <i class="fas fa-user-circle icon"></i> home2</a></li>
                                      <li><a href="#"> <i class="fas fa-user-circle icon"></i> home3</a></li>

                                  </ul>

                              </li>

                              <li><a href="#"><i class="far fa-envelope icon"></i> Email </a></li>
            -->
                              <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="menul"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                          </ul>

                       </div>
                    </div>

                  </div>

                  <!-- div end collapse -->

                  </nav>

                  </div>


                  <div class="col-lg-9 col-md-12 p-3 mb-2 bg-light text-dark" id="dashboard_section"> <!-- dashboard information section -->
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
