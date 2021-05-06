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




<a type="button" class="btn btn-warning btn-lg text-white float-left" href="{{url('faculty/view_regular_assign_courses/with_select_trimester/'.$enc_trimester_id)}}"><b>Close</b></a>
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
        <h4> <b> Are you want to submit final mark sheet for regular courses? </b> </h4>
      </div>
      <div class="modal-footer">
        <center>
        <a class="btn btn-success"  href="{{url('faculty/final_submit_regular_assigned_course_marks_sheet/'.$enc_batch_course_list_id.'/'.$enc_batch_id.'/'.$enc_trimester_id)}}">Yes</a>
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
    <b>Assigned Regular Course Student Marksheet</b>
      <button class="btn btn-danger btn-md float-right" id="download"><b>Download as PDF</b></button>
    </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">

      <div class="row scrollable">
        <div class="col-md-12">
          <div id="result">
          @if($faculty_final_submit_status==0)

          @php
          $batch_name=DB::table('batches')->where('id','=',$batch_id)->value('batch_name');
          $course_details=DB::table('batch_course_lists')->where('id','=',$batch_course_list_id)->first();

          @endphp

          <h2 class="text-center"><b>Batch : </b><b class="text-warning">{{$batch_name}}</b></h2>
          <h2 class="text-center"><b>Course Title : </b><b class="text-success">{{$course_details->course_title}}</b></h2>

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


              @foreach($assigned_regular_course_student_mark_sheet as $student_regular_course_mark_sheet)
                <tr>
                  <!--  <td>{{$i++}}</td> -->
                  @php
                    $student_uni_id=DB::table('students')->where('id','=',$student_regular_course_mark_sheet->student_id)->value('uni_id');
                  @endphp

                    <td><b>{{$student_uni_id}}</b></td>
                    @php
                    $name=DB::table('students')->where('id','=',$student_regular_course_mark_sheet->student_id)->value('name');
                    @endphp
                    <td><b>{{$name}}</b></td>
                    <td>

                      @if($student_regular_course_mark_sheet->attendance_marks_attend_status==1)
                        <b class="text-danger">A<b>
                      @elseif($student_regular_course_mark_sheet->attendance_marks_attend_status==0)
                        <b>{{$student_regular_course_mark_sheet->attendance_marks}}</b>
                      @endif
                    </td>
                    <td>
                      @if($student_regular_course_mark_sheet->assignment_and_presentation_marks_attend_status==1)
                        <b class="text-danger">A<b>
                      @elseif($student_regular_course_mark_sheet->assignment_and_presentation_marks_attend_status==0)
                        <b>{{$student_regular_course_mark_sheet->assignment_and_presentation_marks}}</b>
                      @endif
                    </td>
                    <td>
                      @if($student_regular_course_mark_sheet->quiz_marks_attend_status==1)
                        <b class="text-danger">A<b>
                      @elseif($student_regular_course_mark_sheet->quiz_marks_attend_status==0)
                        <b>{{$student_regular_course_mark_sheet->quiz_marks}}</b>
                      @endif
                    <td>
                      @if($student_regular_course_mark_sheet->mid_term_marks_attend_status==1)
                        <b class="text-danger">A<b>
                      @elseif($student_regular_course_mark_sheet->mid_term_marks_attend_status==0)
                        <b>{{$student_regular_course_mark_sheet->mid_term_marks}}</b>
                      @endif
                    <td>
                      @if($student_regular_course_mark_sheet->final_marks_attend_status==1)
                        <b class="text-danger">A<b>
                      @elseif($student_regular_course_mark_sheet->final_marks_attend_status==0)
                        <b>{{$student_regular_course_mark_sheet->final_marks}}</b>
                      @endif
                    <td>{{$student_regular_course_mark_sheet->total_marks}}</td>





                    @php
                      $enc_student_regular_course_mark_sheet_id = Crypt::encryptString($student_regular_course_mark_sheet->id);
                    @endphp

                    <td><a type="button" class="btn btn-info text-white" href="{{url('faculty/view_single_student_regular_course_mark_sheet/'.$enc_student_regular_course_mark_sheet_id.'/'.'1')}}">Add</a></td>

                </tr>

              @endforeach

              @foreach($assigned_repeat_retake_course_with_batch_student_mark_sheet as $student_repeat_retake_course_with_batch_mark_sheet)
                <tr>
                  <!--  <td>{{$i++}}</td> -->
                  @php
                    $student_uni_id=DB::table('students')->where('id','=',$student_repeat_retake_course_with_batch_mark_sheet->student_id)->value('uni_id');
                  @endphp

                    <td><b>{{$student_uni_id}}</b></td>
                    @php
                    $name=DB::table('students')->where('id','=',$student_repeat_retake_course_with_batch_mark_sheet->student_id)->value('name');
                    @endphp
                    <td><b>{{$name}}</b></td>
                    <td>

                      @if($student_repeat_retake_course_with_batch_mark_sheet->attendance_marks_attend_status==1)
                        <b class="text-danger">A<b>
                      @elseif($student_repeat_retake_course_with_batch_mark_sheet->attendance_marks_attend_status==0)
                        <b>{{$student_repeat_retake_course_with_batch_mark_sheet->attendance_marks}}</b>
                      @endif
                    </td>
                    <td>
                      @if($student_repeat_retake_course_with_batch_mark_sheet->assignment_and_presentation_marks_attend_status==1)
                        <b class="text-danger">A<b>
                      @elseif($student_repeat_retake_course_with_batch_mark_sheet->assignment_and_presentation_marks_attend_status==0)
                        <b>{{$student_repeat_retake_course_with_batch_mark_sheet->assignment_and_presentation_marks}}</b>
                      @endif
                    </td>
                    <td>
                      @if($student_repeat_retake_course_with_batch_mark_sheet->quiz_marks_attend_status==1)
                        <b class="text-danger">A<b>
                      @elseif($student_repeat_retake_course_with_batch_mark_sheet->quiz_marks_attend_status==0)
                        <b>{{$student_repeat_retake_course_with_batch_mark_sheet->quiz_marks}}</b>
                      @endif
                    <td>
                      @if($student_repeat_retake_course_with_batch_mark_sheet->mid_term_marks_attend_status==1)
                        <b class="text-danger">A<b>
                      @elseif($student_repeat_retake_course_with_batch_mark_sheet->mid_term_marks_attend_status==0)
                        <b>{{$student_repeat_retake_course_with_batch_mark_sheet->mid_term_marks}}</b>
                      @endif
                    <td>
                      @if($student_repeat_retake_course_with_batch_mark_sheet->final_marks_attend_status==1)
                        <b class="text-danger">A<b>
                      @elseif($student_repeat_retake_course_with_batch_mark_sheet->final_marks_attend_status==0)
                        <b>{{$student_repeat_retake_course_with_batch_mark_sheet->final_marks}}</b>
                      @endif
                    <td>{{$student_repeat_retake_course_with_batch_mark_sheet->total_marks}}</td>


                    @php
                      $enc_student_repeat_retake_course_with_batch_mark_sheet_id = Crypt::encryptString($student_repeat_retake_course_with_batch_mark_sheet->id);
                    @endphp

                    <td><a type="button" class="btn btn-info text-white" href="{{url('faculty/view_single_student_regular_course_mark_sheet/'.$enc_student_repeat_retake_course_with_batch_mark_sheet_id.'/'.'2')}}">Add</a></td>

                </tr>

              @endforeach

            </tbody>
      </table>

      <br>
      <hr>

      <footer class="text-center">
      </footer>

      <br>

    </div>

      @elseif($faculty_final_submit_status==1)

      @endif
    </div>
  </div>


    </blockquote>
  </div>
</div>



@endsection
