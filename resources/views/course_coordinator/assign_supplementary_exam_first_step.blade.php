@extends('layouts.dashboard')


@section('dashboard_information')

@if(Session::has('assign_supplementary_exam'))
  <script>
    swal({ title: "Done", text: "Assigned Student for Supplementary Exam Successfully!", icon: "success", button: "Ok",});
  </script>
@endif

<div class="row scrollable">
<div class="col-md-12">
<div class="card">
  <div class="card-header">
    <b> Assign Supplementary Exam : Step 1 </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="post" action="{{ url('/course_coordinator/assign/supplementary_exam/first_step_process') }}" enctype="multipart/form-data">
          @csrf


          <input type="hidden" value="{{$dept_id}}" name="dept_id" required>

          <div class="form-group row">
            <label for="student_id" class="col-sm-3 col-form-label">ID</label>

            <div class="col-sm-9">
              <input type="text" class="form-control @error('student_id') is-invalid @enderror" id="student_id" placeholder="Enter Student ID" name="student_id" required>
              @error('student_id')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Trimester</label>

            <div class="col-sm-9">
              <select id="exampleFormControlSelect1" class="form-control" name="trimester_id" required>
                <option value="">Select Trimester</option>
                @foreach($trimester_list as $trimester)
                <option value="{{$trimester->id}}">{{$trimester->trimester_name}}</option>
                @endforeach
              </select>
            </div>
          </div>


        <footer class="text-center">
          <button type="submit" class="btn btn-success">Next Step</button>
        </footer>

      </form>


    </blockquote>
  </div>
</div>
</div>
</div>
@endsection
