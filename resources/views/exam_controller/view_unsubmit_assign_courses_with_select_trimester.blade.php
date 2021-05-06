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
    <b> Unsubmit Marksheets </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="post" action="{{ url('exam_controller/view_unsubmit_marksheets/only_select_trimester_process') }}" enctype="multipart/form-data">

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


        <h1 class="text-center"> <b> {{$trimester_name}} </b> </h1>

        <br>

    <hr>

    <div class="scrollable">


    <h2 class="text-primary text-center"><b>Regular Assigned Batches</b></h2>
    <hr>
    <br>

          @foreach($department_list as $department)

          @php

          $i=1;
          $k=0;
          @endphp


          @foreach($assigned_regular_courses as $assigned_course)


          @if($department->id==$assigned_course->department_id)

          @php
            $department_name=DB::table('departments')->where('id','=',$department->id)->value('department_name');
          @endphp


          @if($k==0)

          <table class="table table-bordered">

            <thead>

              <tr>
                <th>#</th>
                <th>Course Code</th>
                <th>Course Title</th>
                <th>Credit Hours</th>
                <th>Batch</th>
                <th>Faculty</th>
              </tr>

            </thead>

            <h3 class="text-center text-success"> <b> {{$department_name}} </b> </h3>

            <tbody>

          <br>

          @php
            $k=1;
          @endphp

          @endif

          @php

          $batch_details=DB::table('batches')->where('department_id','=',$assigned_course->department_id)->where('id','=',$assigned_course->batch_id)->first();
          $course_details=DB::table('batch_course_lists')->where('department_id','=',$assigned_course->department_id)->where('id','=',$assigned_course->batch_course_list_id)->first();
          //$batch_details=DB::table('batches')->where('department_id','=',$assigned_course->department_id)->where('id','=',$assigned_course->batch_id)->where('course_version_id','=',$assigned_course->course_version_id)->first();
          $faculty_name=DB::table('faculties')->where('id','=',$assigned_course->faculty_id)->value('name');

          @endphp

          <tr>
            <td>{{$i++}}</td>
            <td>{{$course_details->course_code}}</td>
            <td>{{$course_details->course_title}}</td>
            <td>{{$course_details->credit_hours}}</td>
            <td>{{$batch_details->batch_name}}</td>
            <td>{{$faculty_name}}</td>
          </tr>




        @endif
      @endforeach
      @endforeach

    </tbody>

    </table>

    <br>
    <hr>


<!-- repet retake -->

<h2 class="text-primary text-center"><b>Repeat/Retake (without batch)</b></h2>
<hr>

    <br>

    <table class="table table-bordered">

      <thead>

        <tr>
          <th>#</th>
          <th>Course Code</th>
          <th>Course Title</th>
          <th>Credit Hours</th>
          <th>Student ID</th>
          <th>Faculty</th>
        </tr>

      </thead>

      <tbody>

      @foreach($department_list as $department)

      @php

      $i=1;
      $k=0;

      @endphp


      @foreach($assigned_repeat_courses as $assigned_course)


      @if($department->id==$assigned_course->department_id)

      @php

      $department_name=DB::table('departments')->where('id','=',$department->id)->value('department_name');
      $course_details=DB::table('batch_course_lists')->where('department_id','=',$assigned_course->department_id)->where('id','=',$assigned_course->batch_course_list_id)->first();
      //$batch_details=DB::table('batches')->where('department_id','=',$assigned_course->department_id)->where('id','=',$assigned_course->batch_id)->where('course_version_id','=',$assigned_course->course_version_id)->first();
      $faculty_details=DB::table('faculties')->where('department_id','=',$assigned_course->department_id)->where('id','=',$assigned_course->faculty_id)->first();

      @endphp

      @if($k==0)
      <h3 class="text-center text-success"> <b> {{$department_name}} </b> </h3>
      <br>

      @endif

      @php

      $k=1;

      //$batch_details=DB::table('batches')->where('department_id','=',$assigned_course->department_id)->where('id','=',$assigned_course->batch_id)->first();

      @endphp

      <tr>
        <td>{{$i++}}</td>
        <td>{{$course_details->course_code}}</td>
        <td>{{$course_details->course_title}}</td>
        <td>{{$course_details->credit_hours}}</td>
        @php
          $student_uni_id=DB::table('students')->where('id','=',$assigned_course->student_id)->value('uni_id');
        @endphp
      <td>{{$student_uni_id}}</td>
      @php

      //$department_name=DB::table('departments')->where('id','=',$department->id)->value('department_name');
      //$course_details=DB::table('batch_course_lists')->where('department_id','=',$assigned_course->department_id)->where('id','=',$assigned_course->batch_course_list_id)->first();
      //$batch_details=DB::table('batches')->where('department_id','=',$assigned_course->department_id)->where('id','=',$assigned_course->batch_id)->where('course_version_id','=',$assigned_course->course_version_id)->first();
      $faculty_name=DB::table('faculties')->where('id','=',$assigned_course->faculty_id)->value('name');

      @endphp

      <td>{{$faculty_name}}</td>

      </tr>


      @endif


  @endforeach
  @endforeach

</tbody>

</table>

    <br>
    <hr>


<!-- supplementary -->

<h2 class="text-primary text-center"><b>Supplementary Assigned Courses</b></h2>

<hr>
<br>

<table class="table table-bordered">

  <thead>

    <tr>
      <th>#</th>
      <th>Course Code</th>
      <th>Course Title</th>
      <th>Credit Hours</th>
      <th>Student ID</th>
      <th>Faculty</th>
    </tr>

  </thead>

  <tbody>

    @foreach($department_list as $department)

    @php

    $i=1;
    $k=0;

    @endphp


  @foreach($assigned_supplementary_courses as $assigned_course)

  @if($department->id==$assigned_course->department_id)

  @php

  $department_name=DB::table('departments')->where('id','=',$department->id)->value('department_name');
  $course_details=DB::table('batch_course_lists')->where('department_id','=',$assigned_course->department_id)->where('id','=',$assigned_course->batch_course_list_id)->first();
  //$batch_details=DB::table('batches')->where('department_id','=',$assigned_course->department_id)->where('id','=',$assigned_course->batch_id)->where('course_version_id','=',$assigned_course->course_version_id)->first();
  $faculty_details=DB::table('faculties')->where('department_id','=',$assigned_course->department_id)->where('id','=',$assigned_course->faculty_id)->first();

  @endphp

  @if($k==0)
  <h3 class="text-center text-success"> <b> {{$department_name}} </b> </h3>
  <br>

  @endif

  @php

  $k=1;

  //$batch_details=DB::table('batches')->where('department_id','=',$assigned_course->department_id)->where('id','=',$assigned_course->batch_id)->first();

  @endphp

    <tr>
    <td>{{$i++}}</td>
    <td>{{$course_details->course_code}}</td>
    <td>{{$course_details->course_title}}</td>
    <td>{{$course_details->credit_hours}}</td>
    @php
      $student_uni_id=DB::table('students')->where('id','=',$assigned_course->student_id)->value('uni_id');
    @endphp
  <td>{{$student_uni_id}}</td>

  <td>{{$faculty_details->name}}</td>
  </tr>
  @endif



@endforeach
@endforeach

</tbody>

</table>


    </blockquote>
  </div>
</div>
</div>
</div>



@endsection
