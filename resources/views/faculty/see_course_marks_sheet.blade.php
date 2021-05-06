@extends('layouts.dashboard')


@section('dashboard_information')

@if(Session::has('success'))
  <script>
    swal({ title: "Done", text: "Marks Successfully Updated!", icon: "success", button: "Ok",});
  </script>
@endif

@if(Session::has('null_marks'))
  <script>
    swal({ title: "Oops", text: "All Marks Yet Not Submitted!", icon: "error", button: "Ok",});
  </script>
@endif

  <div class="card">
  <div class="card-header">
    Assigned Regular Courses
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">

      <div class="row scrollable">
        <div class="col-md-12">
          @if($faculty_final_submit_status==0)

          <h3 class="text-center text-info"> <b> Department : {{$department}} </b> </h3>
          <h3 class="text-center text-primary"> <b> Batch : {{$batch}} </b> </h3>

          <br>
          <hr>
      <table class="table table-bordered table-striped" id="dataTable">
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


              @foreach($regular_student_list as $regular_course)
                <tr>
                  <!--  <td>{{$i++}}</td> -->
                    <td>{{$regular_course->student_id}}</td>
                    @php
                    $name=DB::table('students')->where('id','=',$regular_course->student_id)->where('department_name','=',$regular_course->department_name)->value('name');
                    @endphp
                    <td>{{$name}}</td>
                    <td>{{$regular_course->attendance_marks}}</td>
                    <td>{{$regular_course->assignment_and_presentation_marks}}</td>
                    <td>{{$regular_course->quiz_marks}}</td>
                    <td>{{$regular_course->mid_term_marks}}</td>
                    <td>{{$regular_course->final_marks}}</td>
                    <td>{{$regular_course->final_marks}}</td>
                    <td>{{$regular_course->gpa}}</td>
                    <td>{{$regular_course->grade}}</td>

                    <td><a type="button" class="btn btn-info text-white" href="{{url('faculty/see/single_course_marks_sheet/'.$regular_course->id.'/'.'1'.'/'.$course_assigned_id)}}">Add</a></td>

                </tr>

              @endforeach

              @foreach($repeat_retake_student_list as $repeat_retake_course)
                  <tr>
                    <!--  <td>{{$i++}}</td>  -->
                      <td>{{$repeat_retake_course->student_id}}</td>
                      @php
                      $name=DB::table('students')->where('id','=',$repeat_retake_course->student_id)->where('department_name','=',$repeat_retake_course->department_name)->value('name');
                      @endphp
                      <td>{{$name}}</td>
                      <td>{{$repeat_retake_course->attendance_marks}}</td>
                      <td>{{$repeat_retake_course->assignment_and_presentation_marks}}</td>
                      <td>{{$repeat_retake_course->quiz_marks}}</td>
                      <td>{{$repeat_retake_course->mid_term_marks}}</td>
                      <td>{{$repeat_retake_course->final_marks}}</td>
                      <td>{{$repeat_retake_course->total_marks}}</td>
                      <td>{{$repeat_retake_course->gpa}}</td>
                      <td>{{$repeat_retake_course->grade}}</td>

                      <td><a type="button" class="btn btn-info text-white" href="{{url('faculty/see/single_course_marks_sheet/'.$repeat_retake_course->id.'/'.'2'.'/'.$course_assigned_id)}}">Add</a></td>

                  </tr>

              @endforeach

            </tbody>
      </table>

      <br>
      <hr>

      <footer class="text-center">
        <td><a type="button" class="btn btn-info btn-lg text-white" href="{{url('faculty/final_submission/course_marks_sheet/'.$course_assigned_id)}}">Final Submission of Marks Sheet</a></td>
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
