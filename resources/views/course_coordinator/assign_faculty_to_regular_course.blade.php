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
    <b> Assign Faculty to Regular Course </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="post" action="{{ url('course_coordinator/assign_faculty_to_regular_course_process') }}" enctype="multipart/form-data">
          @csrf


          <input type="hidden" class="form-control" value="{{$faculty_assign_id}}" name="faculty_assign_id" required>
          <input type="hidden" class="form-control" value="{{$trimester_id}}" name="trimester_id" required>

          @php
            $trimester_name=DB::table('trimesters')->where('id','=',$trimester_id)->value('trimester_name');
          @endphp

          <div class="form-group row">
            <label for="trimester" class="col-sm-3 col-form-label">Trimester</label>

            <div class="col-sm-9">
              <input type="text" class="form-control @error('trimester') is-invalid @enderror" id="trimester" name="trimester_name" value="{{$trimester_name}}" required readonly>

              @error('trimester')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          @php
            $batch_name=DB::table('batches')->where('id','=',$faculty_assign_course_details->batch_id)->value('batch_name');
          @endphp

          <div class="form-group row">
            <label for="batch" class="col-sm-3 col-form-label">Batch</label>

            <div class="col-sm-9">
              <input type="text" class="form-control @error('batch') is-invalid @enderror" id="batch" name="batch" value="{{$batch_name}}" required readonly>

              @error('batch')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          @php
            $batch_name=DB::table('batches')->where('id','=',$faculty_assign_course_details->batch_id)->value('batch_name');
            $course_details=DB::table('batch_course_lists')->where('department_id','=',$faculty_assign_course_details->department_id)->where('batch_id','=',$faculty_assign_course_details->batch_id)->where('course_version_id','=',$faculty_assign_course_details->course_version_id)->where('id','=',$faculty_assign_course_details->batch_course_list_id)->first();
          @endphp

          <div class="form-group row">
            <label for="course_code" class="col-sm-3 col-form-label">Course Code</label>

            <div class="col-sm-9">
              <input type="text" class="form-control @error('course_code') is-invalid @enderror" id="course_code" name="course_code" value="{{$course_details->course_code}}" required readonly>

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
              <input type="text" class="form-control @error('course_title') is-invalid @enderror" id="course_title" name="course_title" value="{{$course_details->course_title}}" required readonly>

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
              <input type="text" class="form-control @error('credit_hours') is-invalid @enderror" id="credit_hours" name="credit_hours" value="{{$course_details->credit_hours}}" required readonly>

              @error('credit_hours')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Faculty</label>

            <div class="col-sm-9">
              <select id="exampleFormControlSelect1" class="form-control" name="faculty_id" required>
                <option value="">Select Faculty</option>
                @foreach($faculty_list as $faculty)
                  <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                @endforeach
              </select>
            </div>
          </div>


          <footer class="text-center">
            <a class="btn btn-warning btn_for_custom" data-toggle="modal" data-target="#exampleModalLong2">Assign Faculty</a>
          </footer>

          <!-- Faculty Assign Button Modal -->


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
                  <h4> <b> Are you want to assign this faculty? </b> </h4>
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
