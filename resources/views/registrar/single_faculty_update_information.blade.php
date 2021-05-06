@extends('layouts.dashboard')


@section('dashboard_information')


<div class="row scrollable">
  <div class="col-md-12">
<div class="card">
  <div class="card-header">
    <b> Update Faculty Information </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">

      <form method="POST" action="{{url('registrar/update_faculty_information_process')}}" enctype="multipart/form-data">
          @csrf

        <input type="hidden" class="form-control" value="{{$faculty_details->id}}" name="faculty_database_id">

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Name</label>

          <div class="col-sm-9">
            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$faculty_details->name}}" autocomplete="name" autofocus name="name" readonly>

            @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

          </div>
        </div>

        @php
          $department_name=DB::table('departments')->where('id','=',$faculty_details->department_id)->value('department_name');
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
          <label class="col-sm-3 col-form-label">Designation</label>

          <div class="col-sm-9">
            <input type="text" class="form-control @error('designation') is-invalid @enderror" value="{{$faculty_details->designation}}" autocomplete="designation" autofocus name="designation" required>

            @error('designation')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

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
