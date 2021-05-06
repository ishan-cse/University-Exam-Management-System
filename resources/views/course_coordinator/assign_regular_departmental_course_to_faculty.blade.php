@extends('layouts.dashboard')


@section('dashboard_information')

@if(Session::has('course_assign'))
  <script>
    swal({ title: "Done", text: "Course Assign is Successful!", icon: "success", button: "Ok",});
  </script>
@endif

@if(Session::has('course_exist'))
  <script>
    swal({ title: "Oops", text: "This Course is Already Assigned", icon: "error", button: "Ok",});
  </script>
@endif

<div class="row scrollable">
  <div class="col-md-12">
<div class="card">
  <div class="card-header">
    Assign Course for Faculty : <b> Final Step </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="post" action="{{ url('/course_coordinator/assign/regular_course/faculty/final_step_process') }}" enctype="multipart/form-data">
          @csrf


        <input type="hidden" class="form-control" value="{{$dept_id}}" name="edition_no" required>


        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Select Course</label>

              <div class="col-sm-7">
                <input id="select_course" class="form-control @error('course') is-invalid @enderror" placeholder="Select Course" name="course" value="" readonly required>

                @error('course')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>

              <div class="col-sm-2">
                <a class="btn btn-success text-white" onclick="prc('prerequisite_course_1')" data-toggle="modal" data-target="#exampleModalLong1">Select</a>
              </div>

        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Select Batch</label>

            <div class="col-sm-7">
              <input id="select_batch" class="form-control @error('batch_name') is-invalid @enderror" placeholder="Select Batch" name="batch_name" value="" readonly required>

              @error('batch_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>

            <div class="col-sm-2">
              <a class="btn btn-success text-white" onclick="batch('prerequisite_course_2')" data-toggle="modal" data-target="#exampleModalLong2">Select</a>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Select Faculty</label>

            <div class="col-sm-7">
              <input id="select_faculty" class="form-control @error('faculty_name') is-invalid @enderror" placeholder="Select Faculty" name="faculty_name" value="" readonly required>

              @error('faculty_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>

              <input type="hidden" id="fac_id" class="form-control" value="" name="faculty_id" required>

            <div class="col-sm-2">
              <a class="btn btn-success text-white" onclick="select_faculty('prerequisite_course_3')" data-toggle="modal" data-target="#exampleModalLong3">Select</a>
            </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Department</label>

          <div class="col-sm-7">
            <input type="text" class="form-control" placeholder="" value="{{$dept}}" name="department_name" readonly required>
          </div>
        </div>

        <div class="form-group row">
          <label for="credit_hours" class="col-sm-3 col-form-label">Trimester</label>

          <div class="col-sm-7">
            <input type="text" class="form-control" placeholder="" value="{{$trimester}}" name="trimester" readonly required>
          </div>
        </div>



        <footer class="text-center">
          <button type="submit" class="btn btn-success">Assign</button>
        </footer>
      </form>


    </blockquote>
  </div>
</div>
</div>
</div>



<!-- Course Modal -->


<div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Course List for Edition no : </h5>
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


              @foreach($course_list as $course)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$course->course_code}}</td>
                    <td>{{$course->course_title}}</td>
                    <td>{{$course->credit_hours}}</td>

                    <td><button type="button" class="btn btn-info text-white" onclick="Select_course('{{$course->course_title}}')" data-dismiss="modal">Select</button></td>

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



<!-- Batch Modal -->

<div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Batch List for Edition no : </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body scrollable">

     <script>
        function batch(y){
            var prc=y;
            document.getElementById("prc_no").value=prc;
        }
     </script>

     <input type="hidden" value="" id="prc_no">

      <table class="table table-bordered table-striped" id="dataTable">
        <thead>
          <tr>
            <th>No</th>
            <th>Batch Name</th>
            <th>Select</th>
          </tr>
        </thead>

              @php

                  $i=1;

              @endphp

          <tbody>


              @foreach($all_batch as $batch)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$batch->batch_name}}</td>

                    <td><button type="button" class="btn btn-info text-white" onclick="Select_course('{{$batch->batch_name}}')" data-dismiss="modal">Select</button></td>

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


<!-- Faculty Modal -->

<div class="modal fade" id="exampleModalLong3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Faculty List for Edition no : </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body scrollable">

     <script>
        function select_faculty(y){
            var prc=y;
            document.getElementById("prc_no").value=prc;
        }
     </script>

     <input type="hidden" value="" id="prc_no">

      <table class="table table-bordered table-striped" id="dataTable">
        <thead>
          <tr>
            <th>No</th>
            <th>Faculty Name</th>
            <th>Designation</th>
            <th>Select</th>
          </tr>
        </thead>

              @php

                  $i=1;

              @endphp

          <tbody>


              @foreach($faculty_list as $faculty)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$faculty->name}}</td>
                    <td>{{$faculty->designation}}</td>

                    <td><button type="button" class="btn btn-info text-white" onclick="Select_faculty('{{$faculty->name}}','{{$faculty->id}}')" data-dismiss="modal">Select</button></td>

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
        document.getElementById("select_course").value =x;
      }
    else if (y=='prerequisite_course_2') {
        document.getElementById("select_batch").value =x;
      }

  }


  function Select_faculty(x,z) {

    var y=document.getElementById("prc_no").value;



    if (y=='prerequisite_course_3') {

        document.getElementById("select_faculty").value =x;
        document.getElementById("fac_id").value =z;
      }

  }


</script>

@endsection
