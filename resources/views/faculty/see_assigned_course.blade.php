@extends('layouts.dashboard')


@section('dashboard_information')

@if(Session::has('success'))
  <script>
    swal({ title: "Done", text: "New Batch Creation is Successful!", icon: "success", button: "Ok",});
  </script>
@endif

<div class="row scrollable">
<div class="col-md-12">
<div class="card">
  <div class="card-header">
    Assigned Regular Courses
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">

      <table class="table table-bordered table-striped" id="dataTable">
        <thead>
          <tr>
            <th>No</th>
            <th>Course Code</th>
            <th>Course Title</th>
            <th>Credit Hours</th>
            <th>Batch</th>
            <th>Department</th>
            <th>Marks Sheet</th>
          </tr>
        </thead>

              @php

                  $i=1;

              @endphp

          <tbody>


              @foreach($assigned_course_list as $regular_course)
                <tr>
                    <td>{{$i++}}</td>
                    @php
                    $course=DB::table('courses')->where('course_title','=',$regular_course->course_title)->where('edition_no','=',$regular_course->edition_no)->where('department_name','=',$regular_course->department_name)->first();
                    @endphp
                    <td>{{$course->course_code}}</td>
                    <td>{{$regular_course->course_title}}</td>
                    <td>{{$course->credit_hours}}</td>
                    <td>{{$regular_course->batch_name}}</td>
                    <td>{{$regular_course->department_name}}</td>

                    <td><a type="button" class="btn btn-primary text-white" href="{{url('faculty/see/course_marks_sheet/'.$regular_course->id)}}">Marks Sheet</a></td>

                </tr>

              @endforeach

            </tbody>
      </table>



        <footer class="text-center">

        </footer>

    </blockquote>
  </div>
</div>
</div>
</div>


@endsection
