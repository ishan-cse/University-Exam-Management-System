@extends('layouts.dashboard')


@section('dashboard_information')





<div class="row scrollable">
  <div class="col-md-12">
<div class="card">
  <div class="card-header">
    Assign Regular Course for Student : <b> Final Step </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">

      <h3 class="text-danger"> <b> This student yet not completed prerequisite courses of that course. </b> </h3 class="text-primary"> <br> <br> <h3> <b> Do you want to allow this student to assign this course? </b> </h1>

      <br>

      <form method="post" action="{{ url('/course_coordinator/assign/regular_course/student/final_step_temporary') }}" enctype="multipart/form-data">
          @csrf


        <input type="hidden" id="temp_id" class="form-control" value="{{$temp_id}}" name="temp_id" required>

        <input type="hidden" id="permisssion" class="form-control" value="1" name="permisssion" required>
        <input type="hidden" id="course_edition" class="form-control" value="{{$course_edition}}" name="edition" required>


        <footer class="text-center">
          <button type="submit" class="btn btn-success btn-lg">Allow</button>
        </footer>
      </form>



      <form method="post" action="{{ url('/course_coordinator/assign/regular_course/student/final_step_temporary') }}" enctype="multipart/form-data">
          @csrf


        <input type="hidden" id="temp_id" class="form-control" value="{{$temp_id}}" name="temp_id" required>

        <input type="hidden" id="permisssion" class="form-control" value="0" name="permisssion" required>
        <input type="hidden" id="course_edition" class="form-control" value="{{$course_edition}}" name="edition" required>


        <footer class="text-center">
          <button type="submit" class="btn btn-warning  btn-lg">No</button>
        </footer>
      </form>


    </blockquote>
  </div>
</div>
</div>
</div>


@endsection
