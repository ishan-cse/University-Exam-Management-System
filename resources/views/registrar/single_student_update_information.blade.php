@extends('layouts.dashboard')


@section('dashboard_information')


<div class="row scrollable">
  <div class="col-md-12">
<div class="card">
  <div class="card-header">
    <b> Update Student Information </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">

      <form method="POST" action="{{url('registrar/update_student_information_process')}}" enctype="multipart/form-data">
          @csrf

        <input type="hidden" class="form-control" value="{{$student_details->id}}" name="student_database_id">

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">ID</label>

            <div class="col-sm-9">
              <input type="text" class="form-control @error('uni_id') is-invalid @enderror" value="{{$student_details->uni_id}}" autocomplete="uni_id" autofocus name="uni_id" readonly>

              @error('uni_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror

            </div>
          </div>

          @php
            $department_name=DB::table('departments')->where('id','=',$student_details->department_id)->value('department_name');
          @endphp

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Department</label>

            <div class="col-sm-9">
              <input type="text" class="form-control @error('department_name') is-invalid @enderror" value="{{$department_name}}" autocomplete="department_name" autofocus name="department_name" readonly>

              @error('department_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror

            </div>
          </div>


        <div class="form-group row">
          <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Batch</label>

          <div class="col-sm-9">
            <select id="exampleFormControlSelect1" class="form-control" name="batch_id" value="{{ old('batch_name') }}" required>
              <option value="">Select Batch</option>
              @foreach($batch_list as $batch)
              @if($batch->earned_credit_hours<$batch->total_credit_hours)
              <option value="{{$batch->id}}">{{$batch->batch_name}}</option>
              @endif
              @endforeach
            </select>
          </div>
        </div>

        <footer class="text-center">
          <button type="submit" class="btn btn-success"> Update Information </button>
        </footer>
      </form>


    </blockquote>
  </div>
</div>
</div>
</div>





@endsection
