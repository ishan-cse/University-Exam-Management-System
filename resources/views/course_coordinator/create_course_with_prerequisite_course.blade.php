@extends('layouts.dashboard')


@section('dashboard_information')

@if(Session::has('course_create'))
  <script>
    swal({ title: "Done", text: "New Course Creation is Successful!", icon: "success", button: "Ok",});
  </script>
@endif

@if(Session::has('course_exist'))
  <script>
    swal({ title: "Oops", text: "This Course Code or Course Title is Already Taken", icon: "error", button: "Ok",});
  </script>
@endif

<div class="row scrollable">
  <div class="col-md-12">
<div class="card">
  <div class="card-header">
    Create New Course for Edition No : <b> {{$edition_no}} </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="post" action="{{ url('course_coordinator/create/process/course/with_prerequisite_course') }}" enctype="multipart/form-data">
          @csrf

        <input type="hidden" class="form-control" value="{{$dept}}" id="department_name" name="department_name" required>

        <input type="hidden" class="form-control" value="{{$edition_no}}" id="edition_no" name="edition_no" required>

        <div class="form-group row">
          <label for="course_code" class="col-sm-3 col-form-label">Course Code</label>

          <div class="col-sm-9">
            <input type="text" class="form-control @error('course_code') is-invalid @enderror" id="course_code" placeholder="Enter New Course Code" name="course_code" required>

            @error('course_code')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="course_title" class="col-sm-3 col-form-label">Course Title</label>

          <div class="col-sm-9">
            <input type="text" class="form-control @error('course_title') is-invalid @enderror" id="course_title" placeholder="Enter New Course Title" name="course_title" required>

            @error('course_title')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="credit_hours" class="col-sm-3 col-form-label">Credit Hours</label>

          <div class="col-sm-9">
            <input type="text" class="form-control @error('credit_hours') is-invalid @enderror" id="credit_hours" placeholder="Enter Course Credit Hours" name="credit_hours" required>

            @error('credit_hours')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>


        <hr>

        <h4 class="text-center"> Select Prerequisite Courses </h4>

        <hr>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Prerequisite Course 1</label>

              <div class="col-sm-7">
                <input id="select_course1" class="form-control" placeholder="Select Prerequisite Course 1" name="prerequisite_course_1" value="" readonly>
                </div>

              <div class="col-sm-2">
                <a class="btn btn-success text-white" onclick="prc('prerequisite_course_1')" data-toggle="modal" data-target="#exampleModalLong">Select</a>
              </div>

        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Prerequisite Course 2</label>

            <div class="col-sm-7">
              <input id="select_course2" class="form-control" placeholder="Select Prerequisite Course 2" name="prerequisite_course_2" value="" readonly>
              </div>

            <div class="col-sm-2">
              <a class="btn btn-success text-white" onclick="prc('prerequisite_course_2')" data-toggle="modal" data-target="#exampleModalLong">Select</a>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Prerequisite Course 3</label>

            <div class="col-sm-7">
              <input id="select_course3" class="form-control" placeholder="Select Prerequisite Course 3" name="prerequisite_course_3" value="" readonly>
              </div>

            <div class="col-sm-2">
              <a class="btn btn-success text-white" onclick="prc('prerequisite_course_3')" data-toggle="modal" data-target="#exampleModalLong">Select</a>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Prerequisite Course 4</label>

            <div class="col-sm-7">
              <input id="select_course4" class="form-control" placeholder="Select Prerequisite Course 4" name="prerequisite_course_4" value="" readonly>
              </div>

            <div class="col-sm-2">
              <a class="btn btn-success text-white" onclick="prc('prerequisite_course_4')" data-toggle="modal" data-target="#exampleModalLong">Select</a>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Prerequisite Course 5</label>

            <div class="col-sm-7">
              <input id="select_course5" class="form-control" placeholder="Select Prerequisite Course 5" name="prerequisite_course_5" readonly>
              </div>

            <div class="col-sm-2">
              <a class="btn btn-success text-white" onclick="prc('prerequisite_course_5')" data-toggle="modal" data-target="#exampleModalLong">Select</a>
            </div>
        </div>


        <footer class="text-center">
          <button type="submit" class="btn btn-success">Create New Course</button>
        </footer>
      </form>


    </blockquote>
  </div>
</div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Course List for Edition no : {{$edition_no}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body scrollable">

     <script>
        function prc(y){
            var prc=y;
            document.getElementById("prc_no").value=prc;
        }
     </script>

     <input type="hidden" value="" id="prc_no">

      <table class="table table-bordered table-striped" id="dataTable">
        <thead>
          <tr>
            <th>No</th>
            <th>Course Code</th>
            <th>Course Title</th>
            <th>Credit Hours</th>
            <th>Select</th>
          </tr>
        </thead>

        @php

          $i=1;

        @endphp

        <tbody>
          @foreach($all_course as $course_list)
          <tr>
            <td>{{$i++}}</td>
            <td>{{$course_list->course_code}}</td>
            <td>{{$course_list->course_title}}</td>
            <td>{{$course_list->credit_hours}}</td>

            <td><button type="button" class="btn btn-info text-white" onclick="Select_course('{{$course_list->course_title}}')" data-dismiss="modal">Select</button></td>

          </tr>

          @endforeach
        </tbody>
      </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- end Modal -->



<script type="text/javascript">
function Select_course(x) {

var y=document.getElementById("prc_no").value;



if (y=='prerequisite_course_1') {
    document.getElementById("select_course1").value =x;
  }
else if (y=='prerequisite_course_2') {
    document.getElementById("select_course2").value =x;
  }
else if (y=='prerequisite_course_3') {
    document.getElementById("select_course3").value =x;
  }
else if (y=='prerequisite_course_4') {
    document.getElementById("select_course4").value =x;
  }
else if (y=='prerequisite_course_5') {
    document.getElementById("select_course5").value =x;
  }


}
</script>

@endsection
