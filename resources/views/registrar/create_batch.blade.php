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
      <b> Create New Batch </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="post" action="{{ url('registrar/create_process/batch') }}" enctype="multipart/form-data">
          @csrf

        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label">Batch Name</label>

          <div class="col-sm-10">
            <input type="text" class="form-control @error('batch_name') is-invalid @enderror" id="batch_name" placeholder="Enter New Batch Name" name="batch_name" required>
            @error('batch_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>

          <div class="form-group row">
            <label for="exampleFormControlSelect2" class="col-sm-2 col-form-label">Department</label>

            <div class="col-sm-10">
              <select id="exampleFormControlSelect2" class="form-control" name="dept_id" required>
                <option value="">Select Department</option>
                @foreach($data as $dept_name)
                <option value="{{$dept_name->id}}">{{$dept_name->department_name}}</option>
                @endforeach
              </select>
            </div>
          </div>

        <footer class="text-center">
          <button type="submit" class="btn btn-success">Create New Batch</button>
        </footer>
      </form>


    </blockquote>
  </div>
</div>
</div>
</div>
@endsection
