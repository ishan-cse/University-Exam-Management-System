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



<a type="button" class="btn btn-warning btn-lg text-white float-left" href="{{url('exam_controller/view_supplementary_assign_courses/with_select_trimester/'.$enc_trimester_id)}}"><b>Close</b></a>

<br>
<br>
<br>

  <div class="card">
  <div class="card-header">
    <b> Assigned Supplementary Exam Mark Sheet </b>
    <button class="btn btn-danger btn-md text-white float-right" id="download"><b>Download as PDF</b></a>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">

      <div class="row scrollable">
        <div class="col-md-12" id="result">

          @if($faculty_final_submit_status==1)

        <table class="table table-bordered table-striped">
        <thead>
          <tr>
          <!--  <th>No</th>  -->
            <th>ID</th>
            <th>Name</th>
            <th>70% Marks</th>
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
                      $student_uni_id=DB::table('students')->where('id','=',$assigned_supplementsry_exam_student_mark_sheet->student_id)->value('uni_id');
                    @endphp

                    <td><b>{{$student_uni_id}}</b></td>
                    @php
                    $name=DB::table('students')->where('id','=',$assigned_supplementsry_exam_student_mark_sheet->student_id)->value('name');
                    @endphp
                    <td><b>{{$name}}</b></td>
                    <td>
                      @if($assigned_supplementsry_exam_student_mark_sheet->seventy_percentage_marks_attend_status==1)
                        <b class="text-danger">A<b>
                      @elseif($assigned_supplementsry_exam_student_mark_sheet->seventy_percentage_marks_attend_status==0)
                        <b>{{$assigned_supplementsry_exam_student_mark_sheet->seventy_percentage_marks}}</b>
                      @endif
                    </td>



                    @php
                      $enc_student_supplementary_course_mark_sheet_id = Crypt::encryptString($assigned_supplementsry_exam_student_mark_sheet->id);
                    @endphp

                    <td><a type="button" class="btn btn-info text-white" href="{{url('exam_controller/view_single_student_supplementary_course_mark_sheet/'.$enc_student_supplementary_course_mark_sheet_id.'/'.$enc_faculty_assign_id)}}">Add</a></td>

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
