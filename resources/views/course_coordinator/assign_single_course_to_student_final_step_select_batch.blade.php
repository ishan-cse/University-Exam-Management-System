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

@if(Session::has('not_eligible'))
  <script>
    swal({ title: "Oops", text: "This Student is not eligible for repeat / retake this course", icon: "error", button: "Ok",});
  </script>
@endif

@if(Session::has('course_already_assigned'))
  <script>
    swal({ title: "Oops", text: "This course is already assigned to this student in this trimester ", icon: "error", button: "Ok",});
  </script>
@endif

@if(Session::has('no_batch_available'))
  <script>
    swal({ title: "Oops", text: "No Batch available for this course in this trimester!", icon: "error", button: "Ok",});
  </script>
@endif


<div class="row scrollable">
  <div class="col-md-12">
<div class="card">
  <div class="card-header">
    <b> Assign Single Course with Batch (Credit Transfer Student) : Select Batch </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="post" action="{{ url('course_coordinator/assign/single_course_with_batch/final_step_select_batch_process') }}" enctype="multipart/form-data">
          @csrf


        <input type="hidden" class="form-control" value="{{$dept_id}}" name="department_id" required>
        <input type="hidden" class="form-control" value="{{$trimester_id}}" name="trimester_id" required>
        <input type="hidden" class="form-control" value="{{$student_database_id}}" name="student_database_id" required>
        <input type="hidden" class="form-control" value="{{$batch_course_list_id}}" name="batch_course_list_id" required>

        @php
          $student_uni_id=DB::table('students')->where('id','=',$student_database_id)->value('uni_id');
        @endphp

        <div class="form-group row">
          <label for="$student_uni_id" class="col-sm-3 col-form-label">ID</label>

          <div class="col-sm-9">
            <input type="text" class="form-control @error('$student_uni_id') is-invalid @enderror" id="$student_uni_id" name="student_uni_id" value="{{$student_uni_id}}" required readonly>

            @error('$student_uni_id')
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

        @php
          $course_title=DB::table('batch_course_lists')->where('id','=',$batch_course_list_id)->value('course_title');
        @endphp

        <div class="form-group row">
          <label for="course_title" class="col-sm-3 col-form-label">Course</label>

          <div class="col-sm-9">
            <input type="text" class="form-control @error('course_title') is-invalid @enderror" id="course_title" name="course_title" value="{{$course_title}}" required readonly>

            @error('course_title')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Batch</label>

          <div class="col-sm-9">
            <select id="exampleFormControlSelect1" class="form-control" name="faculty_asigned_course_list_id" required>
              <option value="">Select Batch</option>
              @foreach($faculty_asigned_course_list as $faculty_asigned_course_list_id)
              @php
                $faculty_asigned_course_list_id_details = DB::table('regular_course_assign_to_faculties')->where('id','=',$faculty_asigned_course_list_id)->first();
                $batch_details = DB::table('batches')->where('id','=',$faculty_asigned_course_list_id_details->batch_id)->first();
              @endphp
                <option value="{{$faculty_asigned_course_list_id_details->id}}">{{$batch_details->batch_name}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <footer class="text-center">
          <a class="btn btn-success text-white btn_for_custom" data-toggle="modal" data-target="#exampleModalLong2">Assign Batch</a>
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
                <h4> <b> Are you want to assign this batch? </b> </h4>
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
