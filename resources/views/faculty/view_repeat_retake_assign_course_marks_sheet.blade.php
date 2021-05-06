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



<a type="button" class="btn btn-warning btn-lg text-white float-left" href="{{url('faculty/view_repeat_retake_assign_courses/with_select_trimester/'.$enc_trimester_id)}}"><b>Close</b></a>
<a type="button" class="btn btn-primary btn-lg text-white float-right" data-toggle="modal" data-target="#exampleModalLong2"><b>Submit Final Mark Sheet</b></a>

<!-- Mark Sheet Final Submit Button Modal -->

<div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <h4> <b>Are you want to submit final mark sheet for all repeat/ retake courses? </b> </h4>
      </div>
      <div class="modal-footer">
        <center>
        <a class="btn btn-success"  href="{{url('faculty/final_submit_repeat_retake_assigned_course_marks_sheet/'.$enc_faculty_assign_id)}}">Yes</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </center>
      </div>
    </div>
  </div>
</div>


<!-- end Modal -->

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

          @if($faculty_final_submit_status==0)

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
                      $enc_student_regular_course_mark_sheet_id = Crypt::encryptString($assigned_repeat_retake_course_without_batch_student_mark_sheet->id);
                    @endphp

                    <td><a type="button" class="btn btn-info text-white" href="{{url('faculty/view_single_student_repeat_retake_course_mark_sheet/'.$enc_student_regular_course_mark_sheet_id.'/'.$enc_faculty_assign_id)}}">Add</a></td>

                </tr>

            </tbody>

      </table>

      <br>
      <hr>

      <footer class="text-center">
      </footer>

      <br>

      @elseif($faculty_final_submit_status==1)

      @endif
    </div>
  </div>


    </blockquote>
  </div>
</div>

@endsection
