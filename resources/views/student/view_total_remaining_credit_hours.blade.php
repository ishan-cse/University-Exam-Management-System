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
    <b> Remaining Credit Hours & Trimester for Graduation </b>
  </div>
  <div class="card-body">


    <blockquote class="blockquote mb-0">
      <div class="row scrollable">
        <div class="col-md-12">


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
      $remaining_credit_hours=($total_credit_hours_for_graduation-$total_trimester_credit);

      $remaining_trimesters=(21-$no_of_trimesters_after_admission);
    @endphp


    @if($remaining_credit_hours>0)
    <hr>
    <h2 class="text-center"><b class="text-danger"> Remaining credit hours : </b><b>{{$remaining_credit_hours}}</b></b></h2>
      @if($remaining_trimesters>=0)

      <hr>
      <h2 class="text-center"><b class="text-info"> Remaining trimesters : </b><b>{{$remaining_trimesters}}</b></b></h2>
      <hr>
      @else
      <hr>
      <h2 class="text-center"><b class="text-info"> Remaining trimesters : </b><b>0</b></b></h2>
      <hr>
      @endif
    @elseif($remaining_credit_hours<=0)
    <h2 class="text-center"><b class="text-danger"> No credit hours remaining. <br><br> You are graduated.</b></h2>
    @endif

    </div>
  </div>

    </blockquote>
  </div>
</div>
</div>
</div>







@endsection
