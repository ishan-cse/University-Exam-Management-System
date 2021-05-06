@extends('layouts.dashboard')


@section('dashboard_information')

@if(Session::has('mark_sheet_submit'))
  <script>
    swal({ title: "Done", text: "Mark Sheet Sunmitted Successfully!", icon: "success", button: "Ok",});
  </script>
@endif

<div class="row">
<div class="col-md-12">
<div class="card">
  <div class="card-header">
    <b> Trimester Result </b>
  </div>
  <div class="card-body">


    <blockquote class="blockquote mb-0">

      <form method="post" action="{{ url('student/view_trimester_result/only_select_trimester_process') }}" enctype="multipart/form-data">
          @csrf

          <input type="hidden" value="{{$selected_trimester_id}}" name="selected_trimester_id" required>


          <div class="form-group row">

            <div class="col-sm-1">
            </div>

            <div class="col-sm-8">
              <select id="exampleFormControlSelect1" class="form-control" name="trimester_id" required>
                <option value="">Select Trimester</option>
                @foreach($trimester_list as $trimester)
                @php
                  $trimester_name=DB::table('trimesters')->where('id','=',$trimester->trimester_id)->value('trimester_name');
                @endphp
                <option value="{{$trimester->trimester_id}}">{{$trimester_name}}</option>
                @endforeach
              </select>
            </div>

            <button type="submit" class="btn btn-success btn_for_custom col-sm-2 col-form-label">Search</button>

          </div>


          <hr>


        </form>

        @php

        $trimester_name=DB::table('trimesters')->where('id','=',$selected_trimester_id)->value('trimester_name');

        @endphp


        <h2 class="text-center"> <b> {{$trimester_name}} </b> </h2>
        <br>

        @if($trimester_active_status==0)

        <div class="scrollable">

        <table class="table table-bordered">

          <thead>

            <tr>
              <th>#</th>
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

          @php

          $course_details=DB::table('batch_course_lists')->where('id','=',$assigned_course->batch_course_list_id)->first();

          @endphp

          <tr>
            <td>{{$i++}}</td>
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


            @endforeach



            @php
              if($total_credit!=0){
                $sgpa=round($total_gpa/$total_credit, 2);
                //$sgpa=$total_gpa/$total_credit;
              }
              elseif($total_credit==0){
                $sgpa=0;
              }
            @endphp

          </tr>
          <hr>
    <h3> <b class="text-danger"> SGPA :</b> <b> {{$sgpa}} </b> </h3>
    <hr>

    </tbody>

    </table>




    </div>

    @endif
    @if($trimester_active_status==1)
    <h3 class="text-danger text-center"><b>This trimester result yet not published</b></h3>
    @endif


    </blockquote>
  </div>
</div>
</div>
</div>














@endsection
