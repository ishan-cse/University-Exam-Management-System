@extends('layouts.whiteboard')


@section('dashboard_information')

@if(Session::has('mark_sheet_submit'))
  <script>
    swal({ title: "Done", text: "Mark Sheet Sunmitted Successfully!", icon: "success", button: "Ok",});
  </script>
@endif



<a type="button" class="btn btn-warning btn-lg text-white float-left" href="{{url('/dashboard')}}"><b>Close</b></a>

<br>
<br>
<br>

<div class="row">
<div class="col-md-12">
<div class="card">
  <div class="card-header">
    <b> Mark Sheets Transcript </b>
    <button class="btn btn-danger btn-md text-white float-right" id="download"><b>Download as PDF</b></a>
  </div>
  <div class="card-body">


    <blockquote class="blockquote mb-0">
      <div class="row scrollable">
        <div class="col-md-12" id="result">


      @php
      $id=Auth::user()->id;
      $student_details=DB::table('students')->where('id','=',$id)->first();
      $department_name=DB::table('departments')->where('id','=',$student_details->department_id)->value('department_name');
      @endphp

      <hr>
      <h4 class="text-center"><b class="text-success"> ID : </b><b>{{$student_details->uni_id}}</b></b></h4>
      <h4 class="text-center"><b class="text-success"> Name : </b><b>{{$student_details->name}}</b></b></h4>
      <h4 class="text-center"><b class="text-success"> Department : </b><b>{{$department_name}}</b></b></h4>

      @php
        $total_trimester_gpa=0;
        $total_trimester_credit=0;
      @endphp

      @foreach($trimester_list as $trimester)

      @php

      $trimester_active_status=DB::table('trimesters')->where('id','=',$trimester->trimester_id)->value('active_status');

      @endphp



      @if($trimester_active_status==0)
      @php

      $trimester_name=DB::table('trimesters')->where('id','=',$trimester->trimester_id)->value('trimester_name');

      @endphp

      <hr>
      <h2 class="text-center text-primary"> <b> {{$trimester_name}} </b> </h2>
      <br>

        <table class="table table-bordered">

          <thead>

            <tr>
              <th>Course Code</th>
              <th>Course Title</th>
              <th>Credit Hours</th>
              <th>Attendance</th>
              <th>Assignment & Presentationn</th>
              <th>Quiz</th>
              <th>Mid</th>
              <th>Final</th>
              <th>Total</th>
              <th>Grade</th>
              <th>GPA</th>
            </tr>

          </thead>

          <tbody>


          @php

          $i=1;

          @endphp

          @php
            $total_gpa=0;
            $total_credit=0;
          @endphp

          @foreach($assigned_courses as $assigned_course)
          @if($trimester->trimester_id==$assigned_course->trimester_id)
          @php

          $course_details=DB::table('batch_course_lists')->where('id','=',$assigned_course->batch_course_list_id)->first();

          @endphp

          <tr>
            <td>{{$course_details->course_code}}</td>
            <td>{{$course_details->course_title}}</td>
            <td>{{$course_details->credit_hours}}</td>
            <td>

              @if($assigned_course->attendance_marks_attend_status==1)
                <b class="text-danger">A<b>
              @elseif($assigned_course->attendance_marks_attend_status==0)
                <b>{{$assigned_course->attendance_marks}}</b>
              @endif
            </td>
            <td>
              @if($assigned_course->assignment_and_presentation_marks_attend_status==1)
                <b class="text-danger">A<b>
              @elseif($assigned_course->assignment_and_presentation_marks_attend_status==0)
                <b>{{$assigned_course->assignment_and_presentation_marks}}</b>
              @endif
            </td>
            <td>
              @if($assigned_course->quiz_marks_attend_status==1)
                <b class="text-danger">A<b>
              @elseif($assigned_course->quiz_marks_attend_status==0)
                <b>{{$assigned_course->quiz_marks}}</b>
              @endif
            <td>
              @if($assigned_course->mid_term_marks_attend_status==1)
                <b class="text-danger">A<b>
              @elseif($assigned_course->mid_term_marks_attend_status==0)
                <b>{{$assigned_course->mid_term_marks}}</b>
              @endif
            <td>
              @if($assigned_course->final_marks_attend_status==1)
                <b class="text-danger">A<b>
              @elseif($assigned_course->final_marks_attend_status==0)
                <b>{{$assigned_course->final_marks}}</b>
              @endif
            <td>{{$assigned_course->total_marks}}</td>

            @php
              $mid=NULL;
              $final=NULL;
            if($assigned_course->mid_term_marks_attend_status==0){
              $mid=$assigned_course->mid_term_marks;
            }
            if($assigned_course->final_marks_attend_status==0){
              $final=$assigned_course->final_marks;
            }
            $seventy_marks=$mid+$final;
            @endphp

            @if($seventy_marks>=28 && $assigned_course->total_marks>=80 && $assigned_course->total_marks<=100)
            <td><b>A+</b></td>
            <td><b>4.0</b></td>
            @php
              $credit_hour=DB::table('batch_course_lists')->where('id','=',$assigned_course->batch_course_list_id)->value('credit_hours');
              $total_gpa=4.0*$credit_hour+$total_gpa;
              $total_credit=$credit_hour+$total_credit;
            @endphp
            @elseif($seventy_marks>=28 && $assigned_course->total_marks>=75 && $assigned_course->total_marks<=79)
            <td><b>A</b></td>
            <td><b>3.75</b></td>
            @php
              $credit_hour=DB::table('batch_course_lists')->where('id','=',$assigned_course->batch_course_list_id)->value('credit_hours');
              $total_gpa=3.75*$credit_hour+$total_gpa;
              $total_credit=$credit_hour+$total_credit;
            @endphp
            @elseif($seventy_marks>=28 && $assigned_course->total_marks>=70 && $assigned_course->total_marks<=74)
            <td><b>A-</b></td>
            <td><b>3.50</b></td>
            @php
              $credit_hour=DB::table('batch_course_lists')->where('id','=',$assigned_course->batch_course_list_id)->value('credit_hours');
              $total_gpa=3.50*$credit_hour+$total_gpa;
              $total_credit=$credit_hour+$total_credit;
            @endphp
            @elseif($seventy_marks>=28 && $assigned_course->total_marks>=65 && $assigned_course->total_marks<=69)
            <td><b>B+</b></td>
            <td><b>3.25</b></td>
            @php
              $credit_hour=DB::table('batch_course_lists')->where('id','=',$assigned_course->batch_course_list_id)->value('credit_hours');
              $total_gpa=3.25*$credit_hour+$total_gpa;
              $total_credit=$credit_hour+$total_credit;
            @endphp
            @elseif($seventy_marks>=28 && $assigned_course->total_marks>=60 && $assigned_course->total_marks<=64)
            <td><b>B</b></td>
            <td><b>3.00</b></td>
            @php
              $credit_hour=DB::table('batch_course_lists')->where('id','=',$assigned_course->batch_course_list_id)->value('credit_hours');
              $total_gpa=3.00*$credit_hour+$total_gpa;
              $total_credit=$credit_hour+$total_credit;
            @endphp
            @elseif($seventy_marks>=28 && $assigned_course->total_marks>=55 && $assigned_course->total_marks<=59)
            <td><b>B-</b></td>
            <td><b>2.75</b></td>
            @php
              $credit_hour=DB::table('batch_course_lists')->where('id','=',$assigned_course->batch_course_list_id)->value('credit_hours');
              $total_gpa=2.75*$credit_hour+$total_gpa;
              $total_credit=$credit_hour+$total_credit;
            @endphp
            @elseif($seventy_marks>=28 && $assigned_course->total_marks>=50 && $assigned_course->total_marks<=54)
            <td><b>C+</b></td>
            <td><b>2.50</b></td>
            @php
              $credit_hour=DB::table('batch_course_lists')->where('id','=',$assigned_course->batch_course_list_id)->value('credit_hours');
              $total_gpa=2.50*$credit_hour+$total_gpa;
              $total_credit=$credit_hour+$total_credit;
            @endphp
            @elseif($seventy_marks>=28 && $assigned_course->total_marks>=45 && $assigned_course->total_marks<=49)
            <td><b>C</b></td>
            <td><b>2.25</b></td>
            @php
              $credit_hour=DB::table('batch_course_lists')->where('id','=',$assigned_course->batch_course_list_id)->value('credit_hours');
              $total_gpa=2.25*$credit_hour+$total_gpa;
              $total_credit=$credit_hour+$total_credit;
            @endphp
            @elseif($seventy_marks>=28 && $assigned_course->total_marks>=40 && $assigned_course->total_marks<=44)
            <td><b>D</b></td>
            <td><b>2.00</b></td>
            @php
              $credit_hour=DB::table('batch_course_lists')->where('id','=',$assigned_course->batch_course_list_id)->value('credit_hours');
              $total_gpa=2.00*$credit_hour+$total_gpa;
              $total_credit=$credit_hour+$total_credit;
            @endphp
            @elseif($seventy_marks<=27 || ($assigned_course->total_marks>=0 && $assigned_course->total_marks<=39))
            <td><b>F</b></td>
            <td><b>0.00</b></td>
            @php
              $credit_hour=DB::table('batch_course_lists')->where('id','=',$assigned_course->batch_course_list_id)->value('credit_hours');
              $total_gpa=0.00*$credit_hour+$total_gpa;
              $total_credit=$credit_hour+$total_credit;
            @endphp
            @endif

            @endif

            @endforeach


            @php
            $sgpa=0;
            if($total_credit!=0){
              $sgpa=round($total_gpa/$total_credit, 2);
            }

            @endphp



          </tr>
          <hr>
    <h3> <b class="text-danger"> SGPA :</b> <b> {{$sgpa}} </b> </h3>
    <hr>

    </tbody>

    </table>


    @php
      $total_trimester_gpa=$total_gpa+$total_trimester_gpa;
      $total_trimester_credit=$total_credit+$total_trimester_credit;
    @endphp

    @endif
    @endforeach

    @php
    $cgpa=0;
    if($total_trimester_credit!=0){
      $cgpa=round($total_trimester_gpa/$total_trimester_credit, 2);
    }
    @endphp



    <hr>
    <h2 class="text-center"><b>CGPA : {{$cgpa}}</b></h2>
    <hr>




    @php
      //$total_trimester_gpa=0;
      $total_trimester_credit=0;
    @endphp

    @foreach($trimester_list as $trimester)

    @php


    $trimester_active_status=DB::table('trimesters')->where('id','=',$trimester->trimester_id)->value('active_status');

    @endphp



    @if($trimester_active_status==0)
        @php

        $i=1;

        @endphp

        @php
          //$total_gpa=0;
          $total_credit=0;
        @endphp

        @foreach($assigned_courses as $assigned_course)
        @if($trimester->trimester_id==$assigned_course->trimester_id)
        @php

        $course_details=DB::table('batch_course_lists')->where('id','=',$assigned_course->batch_course_list_id)->first();

        @endphp


        @php
          $mid=NULL;
          $final=NULL;
        if($assigned_course->mid_term_marks_attend_status==0){
          $mid=$assigned_course->mid_term_marks;
        }
        if($assigned_course->final_marks_attend_status==0){
          $final=$assigned_course->final_marks;
        }
        $seventy_marks=$mid+$final;
        @endphp

        @if($seventy_marks>=28 && $assigned_course->total_marks>=80 && $assigned_course->total_marks<=100)
        @php
          $credit_hour=DB::table('batch_course_lists')->where('id','=',$assigned_course->batch_course_list_id)->value('credit_hours');
          $total_credit=$credit_hour+$total_credit;
        @endphp
        @elseif($seventy_marks>=28 && $assigned_course->total_marks>=75 && $assigned_course->total_marks<=79)
        @php
          $credit_hour=DB::table('batch_course_lists')->where('id','=',$assigned_course->batch_course_list_id)->value('credit_hours');
          $total_credit=$credit_hour+$total_credit;
        @endphp
        @elseif($seventy_marks>=28 && $assigned_course->total_marks>=70 && $assigned_course->total_marks<=74)
        @php
          $credit_hour=DB::table('batch_course_lists')->where('id','=',$assigned_course->batch_course_list_id)->value('credit_hours');
          $total_credit=$credit_hour+$total_credit;
        @endphp
        @elseif($seventy_marks>=28 && $assigned_course->total_marks>=65 && $assigned_course->total_marks<=69)
        @php
          $credit_hour=DB::table('batch_course_lists')->where('id','=',$assigned_course->batch_course_list_id)->value('credit_hours');
          $total_credit=$credit_hour+$total_credit;
        @endphp
        @elseif($seventy_marks>=28 && $assigned_course->total_marks>=60 && $assigned_course->total_marks<=64)
        @php
          $credit_hour=DB::table('batch_course_lists')->where('id','=',$assigned_course->batch_course_list_id)->value('credit_hours');
          $total_credit=$credit_hour+$total_credit;
        @endphp
        @elseif($seventy_marks>=28 && $assigned_course->total_marks>=55 && $assigned_course->total_marks<=59)
        @php
          $credit_hour=DB::table('batch_course_lists')->where('id','=',$assigned_course->batch_course_list_id)->value('credit_hours');
          $total_credit=$credit_hour+$total_credit;
        @endphp
        @elseif($seventy_marks>=28 && $assigned_course->total_marks>=50 && $assigned_course->total_marks<=54)
        @php
          $credit_hour=DB::table('batch_course_lists')->where('id','=',$assigned_course->batch_course_list_id)->value('credit_hours');
          $total_credit=$credit_hour+$total_credit;
        @endphp
        @elseif($seventy_marks>=28 && $assigned_course->total_marks>=45 && $assigned_course->total_marks<=49)
        @php
          $credit_hour=DB::table('batch_course_lists')->where('id','=',$assigned_course->batch_course_list_id)->value('credit_hours');
          $total_credit=$credit_hour+$total_credit;
        @endphp
        @elseif($seventy_marks>=28 && $assigned_course->total_marks>=40 && $assigned_course->total_marks<=44)
        @php
          $credit_hour=DB::table('batch_course_lists')->where('id','=',$assigned_course->batch_course_list_id)->value('credit_hours');
          $total_credit=$credit_hour+$total_credit;
        @endphp
        @elseif($seventy_marks<=27 || ($assigned_course->total_marks>=0 && $assigned_course->total_marks<=39))
        @php
          $credit_hour=0;
          $total_credit=$credit_hour+$total_credit;
        @endphp
        @endif

          @endif
          @endforeach

  @php
    $total_trimester_credit=$total_credit+$total_trimester_credit;
  @endphp

  @endif
  @endforeach

  @php

    $id=Auth::user()->id;

    $student_details=DB::table('students')->where('id','=',$id)->first();
    $course_version_id=DB::table('batches')->where('id','=',$student_details->batch_id)->value('course_version_id');
    $total_credit_hours_for_graduation=DB::table('course_versions')->where('id','=',$course_version_id)->value('total_credit_hours');

    $remaining_credit_hours=($total_credit_hours_for_graduation-$total_trimester_credit);

    //$remaining_trimesters=(21-$no_of_trimesters_after_admission);

  @endphp

  <h2 class="text-center"><b class="text-primary"> Completed credit hours : </b><b>{{$total_trimester_credit}}</b></b></h2>


  @if($remaining_credit_hours>0)
  <hr>
  <h2 class="text-center"><b class="text-danger"> Graduation status : </b><b> Ongoing </b></b></h2>

  <hr>
  @elseif($remaining_credit_hours<=0)

  <hr>
  <h2 class="text-center"><b class="text-danger"> Graduation status : <br><br> Graduated </b></h2>
  <hr>
  @endif


    </div>
  </div>

    </blockquote>
  </div>
</div>
</div>
</div>

@endsection
