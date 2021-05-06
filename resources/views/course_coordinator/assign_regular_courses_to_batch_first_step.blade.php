@extends('layouts.dashboard')


@section('dashboard_information')

@if(Session::has('course_assigned'))
  <script>
    swal({ title: "Done", text: "Courses Assigned to Batch Successfully!", icon: "success", button: "Ok",});
  </script>
@endif

<div class="row scrollable">
<div class="col-md-12">
<div class="card">
  <div class="card-header">
    <b> Assign Regular Courses for Batch : Step 1 </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="post" action="{{ url('/course_coordinator/assign_regular_course_to_batch/first_step_process') }}" enctype="multipart/form-data">
          @csrf


          <input type="hidden" class="form-control" value="{{$dept_id}}" name="department_id" required>

          <div class="form-group row">
            <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Batch</label>

            <div class="col-sm-9">
              <select id="exampleFormControlSelect1" class="form-control" name="batch_id" required>
                <option value="">Select Batch</option>
                @foreach($batch_list as $batch)
                  @if($batch->earned_credit_hours<$batch->total_credit_hours)
                    <option value="{{$batch->id}}">{{$batch->batch_name}}</option>
                  @endif
                @endforeach
              </select>
            </div>
          </div>


          <div class="form-group row">
            <label for="exampleFormControlSelect2" class="col-sm-3 col-form-label">Trimester</label>

            <div class="col-sm-9">
              <select id="exampleFormControlSelect2" class="form-control" name="trimester_id" required>
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
