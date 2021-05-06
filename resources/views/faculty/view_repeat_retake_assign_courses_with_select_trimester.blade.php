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
    <b> Assigned Repeat/Retake (without the Batch) Courses </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="post" action="{{ url('/faculty/view_repeat_retake_assign_courses/only_select_trimester_process') }}" enctype="multipart/form-data">
          @csrf

          <input type="hidden" value="{{$selected_trimester_id}}" name="selected_trimester_id" required>


          <div class="form-group row">

            <div class="col-sm-1">
            </div>

            <div class="col-sm-8">
              <select id="exampleFormControlSelect1" class="form-control" name="trimester_id" required>
                <option value="">Select Trimester</option>
                @foreach($trimester_list as $trimester)
                  <option value="{{$trimester->id}}">{{$trimester->trimester_name}}</option>
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

        <div class="scrollable">

        <h3 class="text-center text-success"> <b> Departmental courses </b> </h3>

        <table class="table table-bordered">

          <thead>

            <tr>
              <th>#</th>
              <th>Course Code</th>
              <th>Course Title</th>
              <th>Credit Hours</th>
              <th>Student ID</th>
              <th>Manage</th>
            </tr>

          </thead>

          <tbody>

          @php

          $i=1;

          @endphp


          @foreach($assigned_courses as $assigned_course)


          @php

          $course_details=DB::table('batch_course_lists')->where('department_id','=',$assigned_course->department_id)->where('id','=',$assigned_course->batch_course_list_id)->first();
          //$batch_details=DB::table('batches')->where('department_id','=',$assigned_course->department_id)->where('id','=',$assigned_course->batch_id)->where('course_version_id','=',$assigned_course->course_version_id)->first();
          $faculty_details=DB::table('faculties')->where('department_id','=',$assigned_course->department_id)->where('id','=',$assigned_course->faculty_id)->first();

          @endphp

          @if($course_details->departmental_course_status==1)

          <tr>
            <td>{{$i++}}</td>
            <td>{{$course_details->course_code}}</td>
            <td>{{$course_details->course_title}}</td>
            <td>{{$course_details->credit_hours}}</td>
            @php
              $student_uni_id=DB::table('students')->where('id','=',$assigned_course->student_id)->value('uni_id');
            @endphp
          <td>{{$student_uni_id}}</td>
            <td>
              @php
              $enc_faculty_assign_id = Crypt::encryptString($assigned_course->id);
              //$enc_trimester_id = Crypt::encryptString($selected_trimester_id);
              //$enc_student_id = Crypt::encryptString($assigned_course->student_id);
              @endphp

              <a type="button" class="btn btn-primary text-white" href="{{url('faculty/view_repeat_retake_assigned_course_marks_sheet/'.$enc_faculty_assign_id)}}">Mark Sheet</a>

            </td>
          </tr>
          @endif

      @endforeach

    </tbody>

    </table>


<hr>


<!-- non departmental course -->

<h3 class="text-center text-success"> <b>Non Departmental courses </b> </h3>

<table class="table table-bordered">

  <thead>

    <tr>
      <th>#</th>
      <th>Course Code</th>
      <th>Course Title</th>
      <th>Credit Hours</th>
      <th>Student ID</th>
      <th>Manage</th>
    </tr>

  </thead>

  <tbody>


          @php

          $i=1;

          @endphp


          @foreach($assigned_courses as $assigned_course)

          @php

          $course_details=DB::table('batch_course_lists')->where('department_id','=',$assigned_course->department_id)->where('id','=',$assigned_course->batch_course_list_id)->first();
          //$batch_details=DB::table('batches')->where('department_id','=',$assigned_course->department_id)->where('id','=',$assigned_course->batch_id)->where('course_version_id','=',$assigned_course->course_version_id)->first();
          $faculty_details=DB::table('faculties')->where('department_id','=',$assigned_course->department_id)->where('id','=',$assigned_course->faculty_id)->first();

          @endphp

          @if($course_details->departmental_course_status==0)


          <tr>
            <td>{{$i++}}</td>
            <td>{{$course_details->course_code}}</td>
            <td>{{$course_details->course_title}}</td>
            <td>{{$course_details->credit_hours}}</td>
              @php
                $student_uni_id=DB::table('students')->where('id','=',$assigned_course->student_id)->value('uni_id');
              @endphp
            <td>{{$student_uni_id}}</td>
            <td>
              @php
              $enc_faculty_assign_id = Crypt::encryptString($assigned_course->id);
              //$enc_trimester_id = Crypt::encryptString($selected_trimester_id);
              //$enc_student_id = Crypt::encryptString($assigned_course->student_id);
              @endphp

              <a type="button" class="btn btn-primary text-white" href="{{url('faculty/view_repeat_retake_assigned_course_marks_sheet/'.$enc_faculty_assign_id)}}">Mark Sheet</a>
            </td>
          </tr>

          @endif


          @endforeach

        </tbody>

      </table>

    </div>

    </blockquote>
  </div>
</div>
</div>
</div>


@endsection
