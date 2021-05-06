@extends('layouts.dashboard')


@section('dashboard_information')

@if(Session::has('success'))
  <script>
    swal({ title: "Done", text: "User Account Registration is Successful!", icon: "success", button: "Ok",});
  </script>
@endif

<div class="row scrollable">
  <div class="col-md-12">
<div class="card">
  <div class="card-header">
      <b> Create New {{$role}} Account </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="POST" action="{{url('registrar/create_process/user')}}">
          @csrf

            <input type="hidden" class="form-control" value="{{$role}}" autocomplete="role_name" autofocus name="role_name">

        @if($role=='Student')

        <div class="form-group row">
          <label for="id" class="col-sm-3 col-form-label">ID</label>

          <div class="col-sm-9">
            <input type="text" class="form-control @error('uni_id') is-invalid @enderror" id="uni_id" placeholder="Enter User ID" name="uni_id" value="{{ old('uni_id') }}" required>

              @error('uni_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
        </div>


        @endif


        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Name</label>

          <div class="col-sm-9">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter User Name" value="{{ old('name') }}" autocomplete="name" autofocus name="name" required>

            @error('name')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="email" class="col-sm-3 col-form-label">Email</label>

          <div class="col-sm-9">
            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" placeholder="Enter User Email" name="email" autocomplete="email" required>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>

        <div class="form-group row">
          <label for="exampleFormControlSelect2" class="col-sm-3 col-form-label">Department</label>

          <div class="col-sm-9">
            <select id="exampleFormControlSelect2" class="form-control" name="department_id" value="{{ old('department_name') }}" required>
              <option value="">Select Department</option>
              @foreach($dept as $dept_name)
              <option value="{{$dept_name->id}}">{{$dept_name->department_name}}</option>
              @endforeach
            </select>
          </div>
        </div>

        @if($role=='Student')

        <div class="form-group row">
          <label for="exampleFormControlSelect3" class="col-sm-3 col-form-label">Batch</label>

          <div class="col-sm-9">
            <select id="exampleFormControlSelect3" class="form-control" name="batch_id" value="{{ old('batch_name') }}" required>
              <option value="">Select Batch</option>
              <option value=" ">None</option>
              @foreach($batch as $batch_name)
              <option value="{{$batch_name->id}}">{{$batch_name->batch_name}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="exampleFormControlSelect4" class="col-sm-3 col-form-label">Admission Trimester</label>

          <div class="col-sm-9">
            <select id="exampleFormControlSelect4" class="form-control" name="admission_trimester" value="{{ old('admission_trimester') }}" required>
              <option value="">Select Trimester Name</option>
              @foreach($trimester as $trimesters)
              <option>{{$trimesters->trimester_name}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="exampleFormControlSelect5" class="col-sm-3 col-form-label">Student Type</label>

          <div class="col-sm-9">
            <select id="exampleFormControlSelect5" class="form-control" name="student_type" value="{{ old('student_type') }}" required>
              <option value="">Select Student Type</option>
              <option value="1">Regular</option>
              <option value="2">Credit Transfer</option>
            </select>
          </div>
        </div>

        @endif

        @if($role=='Faculty')

        <div class="form-group row">
          <label for="designation" class="col-sm-3 col-form-label">Designation</label>

          <div class="col-sm-9">
            <input type="text" class="form-control @error('designation') is-invalid @enderror" id="designation" placeholder="Enter Faculty's Designation" value="{{ old('designation') }}" autocomplete="designation" autofocus name="designation" required>

            @error('designation')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>

        @endif

        <div class="form-group row">
          <label for="password" class="col-sm-3 col-form-label">Password</label>

          <div class="col-sm-9">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter User Password" name="password" autocomplete="new-password" required>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-sm-3 col-form-label">Confirm Password</label>

            <div class="col-sm-9">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <footer class="text-center">
          <button type="submit" class="btn btn-success">Create New {{$role}} Account</button>
        </footer>
      </form>


    </blockquote>
  </div>
</div>
</div>
</div>
@endsection
