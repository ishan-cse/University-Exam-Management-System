@extends('layouts.dashboard')


@section('dashboard_information')


@if(Session::has('update_the_maximum_credit_hours'))
  <script>
    swal({ title: "Done", text: "Maximum credit hours for faculty update successfully!", icon: "success", button: "Ok",});
  </script>
@endif

@if(Session::has('assign_supplementary_exam'))
  <script>
    swal({ title: "Done", text: "Assigned Student for Supplementary Exam Successfully!", icon: "success", button: "Ok",});
  </script>
@endif

<div class="row scrollable">
<div class="col-md-12">
<div class="card">
  <div class="card-header">
    <b> Maximum credit hours for faculty </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="post" action="{{ url('/course_coordinator/assign/see_and_update_maximum_credit_hours_for_faculty_process') }}" enctype="multipart/form-data">
          @csrf


          <input type="hidden" value="{{$dept_id}}" name="dept_id" required>

          <div class="form-group row">
            <label for="dept_maximum_credit_hours" class="col-sm-3 col-form-label">Maximum credit hours</label>

            <div class="col-sm-9">
              <input type="text" class="form-control @error('dept_maximum_credit_hours') is-invalid @enderror" id="dept_maximum_credit_hours" name="dept_maximum_credit_hours" value="{{$dept_maximum_credit_hours}}" required>
              @error('dept_maximum_credit_hours')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>


        <footer class="text-center">
          <button type="submit" class="btn btn-success"> Update </button>
        </footer>

      </form>


    </blockquote>
  </div>
</div>
</div>
</div>
@endsection
