@extends('layouts.dashboard')


@section('dashboard_information')

@if(Session::has('success'))
  <script>
    swal({ title: "Done", text: "New Department Creation is Successful!", icon: "success", button: "Ok",});
  </script>
@endif

<div class="card">
  <div class="card-header">
    <b> Create New Department </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="post" action="{{ url('registrar/create_process/department') }}" enctype="multipart/form-data">
          @csrf

        <div class="form-group row">
          <label for="dept_name" class="col-sm-2 col-form-label">Name</label>

          <div class="col-sm-10">
            <input type="text" class="form-control @error('department_name') is-invalid @enderror" id="dept_name" placeholder="Enter New Department Name" name="department_name" required>

            @error('department_name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <footer class="text-center">
          <button type="submit" class="btn btn-success">Create New Department</button>
        </footer>
      </form>


    </blockquote>
  </div>
</div>

@endsection
