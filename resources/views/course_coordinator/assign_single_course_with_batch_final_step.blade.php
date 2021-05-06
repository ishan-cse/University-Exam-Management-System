@extends('layouts.dashboard')


@section('dashboard_information')

@if(Session::has('course_assigned_with_batch'))
  <script>
    swal({ title: "Done", text: "Course assigned with batch is successfully!", icon: "success", button: "Ok",});
  </script>
@endif

@if(Session::has('course_exist'))
  <script>
    swal({ title: "Oops", text: "This Course is Already Assigned", icon: "error", button: "Ok",});
  </script>
@endif

@if(Session::has('course_already_assigned'))
  <script>
    swal({ title: "Oops", text: "This course is already assigned to this student in this trimester ", icon: "error", button: "Ok",});
  </script>
@endif


<div class="row scrollable">
  <div class="col-md-12">
<div class="card">
  <div class="card-header">
    <b> Assign Single Course with Batch (Credit Transfer Student) </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="post" action="{{ url('/course_coordinator/assign/single_course_with_batch/final_step_process') }}" enctype="multipart/form-data">
          @csrf


          <input type="hidden" class="form-control" value="{{$dept_id}}" name="department_id" required>
          <input type="hidden" class="form-control" value="{{$trimester_id}}" name="trimester_id" required>
          <input type="hidden" class="form-control" value="{{$student_database_id}}" name="student_database_id" required>

          @php
            $student_uni_id=DB::table('students')->where('id','=',$student_database_id)->value('uni_id');
          @endphp

          <div class="form-group row">
            <label for="student_uni_id" class="col-sm-3 col-form-label">ID</label>

            <div class="col-sm-9">
              <input type="text" class="form-control @error('student_uni_id') is-invalid @enderror" id="student_uni_id" name="student_uni_id" value="{{$student_uni_id}}" required readonly>

              @error('student_uni_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          @php
            $trimester_name=DB::table('trimesters')->where('id','=',$trimester_id)->value('trimester_name');
          @endphp

          <div class="form-group row">
            <label for="trimester_name" class="col-sm-3 col-form-label">Trimester</label>

            <div class="col-sm-9">
              <input type="text" class="form-control @error('trimester_name') is-invalid @enderror" id="trimester_name" name="trimester_name" value="{{$trimester_name}}" required readonly>

              @error('trimester_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Course</label>

            <div class="col-sm-9">
              <select id="exampleFormControlSelect1" class="form-control" name="batch_course_list_id" required>
                <option value="">Select Course</option>
                @foreach($student_assigned_courses as $student_assigned_course)
                    @php
                      $course_title=DB::table('batch_course_lists')->where('id','=',$student_assigned_course->batch_course_list_id)->value('course_title');
                    @endphp
                      <option value="{{$student_assigned_course->batch_course_list_id}}">{{$course_title}}</option>
                @endforeach
              </select>
            </div>
          </div>


          <footer class="text-center">
            <a class="btn btn-success text-white btn_for_custom" data-toggle="modal" data-target="#exampleModalLong2">Assign Course</a>
          </footer>


          <!-- Course Assign Button Modal -->


          <div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                  <h4> <b> Are you want to assign this course? </b> </h4>
                </div>
                <div class="modal-footer">
                  <center>
                  <button type="submit" class="btn btn-success">Yes</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                  </center>
                </div>
              </div>
            </div>
          </div>

          <!-- end Modal -->


      </form>


    </blockquote>
  </div>
</div>
</div>
</div>


@endsection
