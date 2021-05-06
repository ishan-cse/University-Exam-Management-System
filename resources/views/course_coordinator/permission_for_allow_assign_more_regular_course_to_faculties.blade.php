@extends('layouts.dashboard')


@section('dashboard_information')



<div class="row scrollable">
  <div class="col-md-12">
<div class="card">
  <div class="card-header">
    <b> Permission for Assign Regular Course to Faculty </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">

      <h3 class="text-danger"> <b> This faculty already assigned maximum credit hours in this trimester. </b> </h3 class="text-primary"> <br> <br> <h3> <b> Do you want to assign this course to this faculty? </b> </h1>

      <br>

      <form method="post" action="{{ url('course_coordinator/permission_for_allow_assign_more_regular_course_to_faculties') }}" enctype="multipart/form-data">
          @csrf


        <input type="hidden" id="insert_id" class="form-control" value="{{$insert_id}}" name="insert_id" required>

        <input type="hidden" id="permisssion" class="form-control" value="1" name="permisssion" required>
        <input type="hidden" id="faculty_assign_id" class="form-control" value="{{$faculty_assign_id}}" name="faculty_assign_id" required>
        <input type="hidden" id="faculty_id" class="form-control" value="{{$faculty_id}}" name="faculty_id" required>
        <input type="hidden" id="trimester_id" class="form-control" value="{{$trimester_id}}" name="trimester_id" required>


        <footer class="text-center">
          <button type="submit" class="btn btn-success btn-lg btn_for_custom">Allow</button>
        </footer>
      </form>



      <form method="post" action="{{ url('course_coordinator/permission_for_allow_assign_more_regular_course_to_faculties') }}" enctype="multipart/form-data">
          @csrf


        <input type="hidden" id="insert_id" class="form-control" value="{{$insert_id}}" name="insert_id" required>

        <input type="hidden" id="permisssion" class="form-control" value="0" name="permisssion" required>
        <input type="hidden" id="faculty_assign_id" class="form-control" value="{{$faculty_assign_id}}" name="faculty_assign_id" required>
        <input type="hidden" id="faculty_id" class="form-control" value="{{$faculty_id}}" name="faculty_id" required>
        <input type="hidden" id="trimester_id" class="form-control" value="{{$trimester_id}}" name="trimester_id" required>


        <footer class="text-center">
          <button type="submit" class="btn btn-warning btn-lg btn_for_custom">No</button>
        </footer>
      </form>


    </blockquote>
  </div>
</div>
</div>
</div>


@endsection
