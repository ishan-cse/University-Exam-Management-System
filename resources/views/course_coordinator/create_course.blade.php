@extends('layouts.dashboard')


@section('dashboard_information')



<div class="card">
  <div class="card-header">
    Create New Course
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="post" action="{{ url('course_coordinator/create/process/course/select_edition') }}" enctype="multipart/form-data">
          @csrf

          <div class="form-group row">
            <label for="exampleFormControlSelect2" class="col-sm-3 col-form-label">Select Course Edition</label>

            <div class="col-sm-9">
              <select id="exampleFormControlSelect2" class="form-control" name="course_edition" required>
              <!--  <option value="">Select Department</option> -->
                @foreach($data as $course_editions)
                <option>{{$course_editions->edition_no}}</option>
                @endforeach
              </select>
            </div>
          </div>

        <input type="hidden" class="form-control" value="{{$dept}}" id="department_name" name="department_name" required>

        <footer class="text-center">
          <button type="submit" class="btn btn-success">Next Step</button>
        </footer>
      </form>


    </blockquote>
  </div>
</div>


@endsection
