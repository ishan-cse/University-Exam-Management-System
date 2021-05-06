@extends('layouts.dashboard')


@section('dashboard_information')

@if(Session::has('success'))
  <script>
    swal({ title: "Done", text: "New Course Edition Creation is Successful!", icon: "success", button: "Ok",});
  </script>
@endif

<div class="card">
  <div class="card-header">
    Create New Course Edition
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="post" action="{{ url('course_coordinator/create_process/course_edition') }}" enctype="multipart/form-data">
          @csrf


        <div class="form-group row">
          <label for="edition_no" class="col-sm-3 col-form-label">New Course Edition</label>

          <div class="col-sm-9">
            <input type="text" class="form-control @error('edition_no') is-invalid @enderror" id="edition_no" placeholder="Enter New Course Edition No" name="edition_no" required>

            @error('edition_no')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <input type="hidden" class="form-control" value="{{$dept}}" id="department_name" name="department_name" required>

        <footer class="text-center">
          <button type="submit" class="btn btn-success">Create New Course Edition</button>
        </footer>
      </form>


    </blockquote>
  </div>
</div>

@endsection
