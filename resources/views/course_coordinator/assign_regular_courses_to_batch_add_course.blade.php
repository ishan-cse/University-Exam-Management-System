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
    <b> Add Course </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="post" action="{{ url('course_coordinator/assign_regular_course_to_batch/add_course_process') }}" enctype="multipart/form-data">
          @csrf


          <input type="hidden" class="form-control" value="{{$department_id}}" name="department_id" required>
          <input type="hidden" class="form-control" value="{{$batch_id}}" name="batch_id" required>
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
            $batch_name=DB::table('batches')->where('id','=',$batch_id)->value('batch_name');
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

          <div class="form-group row">
            <label for="level_term" class="col-sm-3 col-form-label">Level-Term</label>

            <div class="col-sm-9">
              <input type="text" class="form-control @error('level_term') is-invalid @enderror" id="level_term" name="level_term" value={{$level_term}} required readonly>

              @error('level_term')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Course</label>

            <div class="col-sm-9">
              <select id="exampleFormControlSelect1" class="form-control" name="add_course_id" required>
                <option value="">Select Course</option>
                @foreach($batch_course_list as $b_course_list)
                  <option value="{{$b_course_list->id}}">{{$b_course_list->course_title}}</option>
                @endforeach
              </select>
            </div>
          </div>


        <footer class="text-center">
          <button type="submit" class="btn btn-warning">Add Course</button>
        </footer>
      </form>


    </blockquote>
  </div>
</div>
</div>
</div>
@endsection
