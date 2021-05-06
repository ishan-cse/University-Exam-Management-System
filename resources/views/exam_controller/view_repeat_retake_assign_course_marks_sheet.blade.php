@extends('layouts.whiteboard')


@section('dashboard_information')



@if(Session::has('success'))
  <script>
    swal({ title: "Done", text: "Mark Sheet Successfully Updated!", icon: "success", button: "Ok",});
  </script>
@endif

@if(Session::has('null_marks'))
  <script>
    swal({ title: "Oops", text: "All Marks Yet Not Submitted!", icon: "error", button: "Ok",});
  </script>
@endif

@php
  $enc_trimester_id = Crypt::encryptString($trimester_id);
@endphp



<a type="button" class="btn btn-warning btn-lg text-white float-left" href="{{url('exam_controller/view_repeat_retake_assign_courses/with_select_trimester/'.$enc_trimester_id)}}"><b>Close</b></a>

<br>
<br>
<br>

  <div class="card">
  <div class="card-header">
    <b> Assigned Repeat/Retake (without batch) Course </b>
    <button class="btn btn-danger btn-md text-white float-right" id="download"><b>Download as PDF</b></a>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">

      <div class="row scrollable">
        <div class="col-md-12" id="result">

          @if($faculty_final_submit_status==1)

          <br>
          <hr>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
          <!--  <th>No</th>  -->
            <th>ID</th>
            <th>Name</th>
            <th>Attendance</th>
            <th>Assignment & Presentationn</th>
            <th>Quiz</th>
            <th>MId</th>
            <th>Final</th>
            <th>Total</th>
            <th>GPA</th>
            <th>Grade</th>
            <th>Add Marks</th>
          </tr>
        </thead>
<!--
              @php

                  $i=1;

              @endphp
-->
          <tbody>


                <tr>

                  <!--  <td>{{$i++}}</td> -->
                    @php
                      $student_uni_id=DB::table('students')->where('id','=',$assigned_repeat_retake_course_without_batch_student_mark_sheet->student_id)->value('uni_id');
                    @endphp

                    <td><b>{{$student_uni_id}}</b></td>
                    @php
                    $name=DB::table('students')->where('id','=',$assigned_repeat_retake_course_without_batch_student_mark_sheet->student_id)->value('name');
                    @endphp
                    <td><b>{{$name}}</b></td>
                    <td>

                      @if($assigned_repeat_retake_course_without_batch_student_mark_sheet->attendance_marks_attend_status==1)
                        <b class="text-danger">A<b>
                      @elseif($assigned_repeat_retake_course_without_batch_student_mark_sheet->attendance_marks_attend_status==0)
                        <b>{{$assigned_repeat_retake_course_without_batch_student_mark_sheet->attendance_marks}}</b>
                      @endif
                    </td>
                    <td>
                      @if($assigned_repeat_retake_course_without_batch_student_mark_sheet->assignment_and_presentation_marks_attend_status==1)
                        <b class="text-danger">A<b>
                      @elseif($assigned_repeat_retake_course_without_batch_student_mark_sheet->assignment_and_presentation_marks_attend_status==0)
                        <b>{{$assigned_repeat_retake_course_without_batch_student_mark_sheet->assignment_and_presentation_marks}}</b>
                      @endif
                    </td>
                    <td>
                      @if($assigned_repeat_retake_course_without_batch_student_mark_sheet->quiz_marks_attend_status==1)
                        <b class="text-danger">A<b>
                      @elseif($assigned_repeat_retake_course_without_batch_student_mark_sheet->quiz_marks_attend_status==0)
                        <b>{{$assigned_repeat_retake_course_without_batch_student_mark_sheet->quiz_marks}}</b>
                      @endif
                    <td>
                      @if($assigned_repeat_retake_course_without_batch_student_mark_sheet->mid_term_marks_attend_status==1)
                        <b class="text-danger">A<b>
                      @elseif($assigned_repeat_retake_course_without_batch_student_mark_sheet->mid_term_marks_attend_status==0)
                        <b>{{$assigned_repeat_retake_course_without_batch_student_mark_sheet->mid_term_marks}}</b>
                      @endif
                    <td>
                      @if($assigned_repeat_retake_course_without_batch_student_mark_sheet->final_marks_attend_status==1)
                        <b class="text-danger">A<b>
                      @elseif($assigned_repeat_retake_course_without_batch_student_mark_sheet->final_marks_attend_status==0)
                        <b>{{$assigned_repeat_retake_course_without_batch_student_mark_sheet->final_marks}}</b>
                      @endif
                    <td>{{$assigned_repeat_retake_course_without_batch_student_mark_sheet->total_marks}}</td>


                    @php
                      $mid=NULL;
                      $final=NULL;
                    if($assigned_repeat_retake_course_without_batch_student_mark_sheet->mid_term_marks_attend_status==0){
                      $mid=$assigned_repeat_retake_course_without_batch_student_mark_sheet->mid_term_marks;
                    }
                    if($assigned_repeat_retake_course_without_batch_student_mark_sheet->final_marks_attend_status==0){
                      $final=$assigned_repeat_retake_course_without_batch_student_mark_sheet->final_marks;
                    }
                    $seventy_marks=$mid+$final;
                    @endphp

                    @if($seventy_marks>=28 && $assigned_repeat_retake_course_without_batch_student_mark_sheet->total_marks>=80 && $assigned_repeat_retake_course_without_batch_student_mark_sheet->total_marks<=100)
                    <td><b>A+</b></td>
                    <td><b>4.0</b></td>
                    @elseif($seventy_marks>=28 && $assigned_repeat_retake_course_without_batch_student_mark_sheet->total_marks>=75 && $assigned_repeat_retake_course_without_batch_student_mark_sheet->total_marks<=79)
                    <td><b>A</b></td>
                    <td><b>3.75</b></td>
                    @elseif($seventy_marks>=28 && $assigned_repeat_retake_course_without_batch_student_mark_sheet->total_marks>=70 && $assigned_repeat_retake_course_without_batch_student_mark_sheet->total_marks<=74)
                    <td><b>A-</b></td>
                    <td><b>3.50</b></td>
                    @elseif($seventy_marks>=28 && $assigned_repeat_retake_course_without_batch_student_mark_sheet->total_marks>=65 && $assigned_repeat_retake_course_without_batch_student_mark_sheet->total_marks<=69)
                    <td><b>B+</b></td>
                    <td><b>3.25</b></td>
                    @elseif($seventy_marks>=28 && $assigned_repeat_retake_course_without_batch_student_mark_sheet->total_marks>=60 && $assigned_repeat_retake_course_without_batch_student_mark_sheet->total_marks<=64)
                    <td><b>B</b></td>
                    <td><b>3.00</b></td>
                    @elseif($seventy_marks>=28 && $assigned_repeat_retake_course_without_batch_student_mark_sheet->total_marks>=55 && $assigned_repeat_retake_course_without_batch_student_mark_sheet->total_marks<=59)
                    <td><b>B-</b></td>
                    <td><b>2.75</b></td>
                    @elseif($seventy_marks>=28 && $assigned_repeat_retake_course_without_batch_student_mark_sheet->total_marks>=50 && $assigned_repeat_retake_course_without_batch_student_mark_sheet->total_marks<=54)
                    <td><b>C+</b></td>
                    <td><b>2.50</b></td>
                    @elseif($seventy_marks>=28 && $assigned_repeat_retake_course_without_batch_student_mark_sheet->total_marks>=45 && $assigned_repeat_retake_course_without_batch_student_mark_sheet->total_marks<=49)
                    <td><b>C</b></td>
                    <td><b>2.25</b></td>
                    @elseif($seventy_marks>=28 && $assigned_repeat_retake_course_without_batch_student_mark_sheet->total_marks>=40 && $assigned_repeat_retake_course_without_batch_student_mark_sheet->total_marks<=44)
                    <td><b>D</b></td>
                    <td><b>2.00</b></td>
                    @elseif($seventy_marks<=27 || ($assigned_repeat_retake_course_without_batch_student_mark_sheet->total_marks>=0 && $assigned_repeat_retake_course_without_batch_student_mark_sheet->total_marks<=39))
                    <td><b>F</b></td>
                    <td><b>0.00</b></td>
                    @endif


                    @php
                      $enc_student_regular_course_mark_sheet_id = Crypt::encryptString($assigned_repeat_retake_course_without_batch_student_mark_sheet->id);
                    @endphp

                    <td><a type="button" class="btn btn-info text-white" href="{{url('exam_controller/view_single_student_repeat_retake_course_mark_sheet/'.$enc_student_regular_course_mark_sheet_id.'/'.$enc_faculty_assign_id)}}">Add</a></td>

                </tr>

            </tbody>

      </table>

      <br>
      <hr>

      <footer class="text-center">
      </footer>

      <br>

      @elseif($faculty_final_submit_status==0)

      @endif
    </div>
  </div>


    </blockquote>
  </div>
</div>

@endsection
