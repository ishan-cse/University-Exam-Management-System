@extends('layouts.dashboard')


@section('dashboard_information')

@if(Session::has('success'))
  <script>
    swal({ title: "Done", text: "Your Password is Changed!", icon: "success", button: "Ok",});
  </script>
@endif

@if(Session::has('wrong'))
  <script>
    swal({ title: "Oops", text: "You Entered Wrong Current Password!", icon: "error", button: "Ok",});
  </script>
@endif

<div class="row scrollable">
  <div class="col-md-12">
<div class="card">
  <div class="card-header">
    Change Password
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="POST" action="{{url('process/profile/password')}}" enctype="multipart/form-data">
          @csrf
        <input type="hidden" class="form-control" value="{{$data->id}}" autocomplete="id" autofocus name="id">

        <input type="hidden" class="form-control" value="{{$data->role_name}}" autocomplete="role_name" autofocus name="role_name">


        <div class="form-group row">
          <label for="current_password" class="col-sm-3 col-form-label">Current Password</label>

          <div class="col-sm-9">
            <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" placeholder="Enter Your Current Password" name="current_password">

            @error('current_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>


        <div class="form-group row">
          <label for="password" class="col-sm-3 col-form-label">Change Password</label>

          <div class="col-sm-9">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter New Password" name="password" autocomplete="new-password">

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
                <input id="password-confirm" placeholder="Confirm New Password" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
            </div>
        </div>

        <footer class="text-center">
          <button type="submit" class="btn btn-success"> Change Password </button>
        </footer>
      </form>

    </blockquote>
  </div>
</div>
</div>
</div>
@endsection
