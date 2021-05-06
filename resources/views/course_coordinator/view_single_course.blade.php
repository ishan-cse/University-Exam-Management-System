@extends('layouts.dashboard')


@section('dashboard_information')

@if(Session::has('success'))
  <script>
    swal({ title: "Done", text: "Your Profile Information Update is Successful!", icon: "success", button: "Ok",});
  </script>
@endif


<div class="row scrollable">
  <div class="col-md-12">
<div class="card">
  <div class="card-header">
    Update Course Information
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="POST" action="{{url('process/update/profile')}}" enctype="multipart/form-data">
          @csrf

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Course Code</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" value="{{$course_data->course_code}}" autocomplete="course_code" autofocus name="course_code">
          </div>
        </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Course Title</label>

                <div class="col-sm-9">
                   <input type="text" class="form-control" value="{{$course_data->course_title}}" autocomplete="course_title" autofocus name="course_title">
                </div>
          </div>

          <div class="form-group row">
             <label class="col-sm-3 col-form-label">Credit Hours</label>

              <div class="col-sm-9">
                  <input type="text" class="form-control" value="{{$course_data->credit_hours}}" autocomplete="credit_hours" autofocus name="credit_hours">
              </div>
          </div>

          <footer class="text-center">
            <button type="submit" class="btn btn-success"> Update Course Information </button>
          </footer>

      </form>

    </blockquote>
  </div>
</div>
</div>
</div>
@endsection
