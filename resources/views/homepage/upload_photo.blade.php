@extends('layouts.dashboard')


@section('dashboard_information')

@if(Session::has('success'))
  <script>
    swal({ title: "Done", text: "Your Photo Upload is Successful!", icon: "success", button: "Ok",});
  </script>
@endif


<div class="row scrollable">
  <div class="col-md-12">
<div class="card">
  <div class="card-header">
    Upload Photo
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="POST" action="{{url('process/profile/photo')}}" enctype="multipart/form-data">
          @csrf

        <input type="hidden" class="form-control" value="{{$data->id}}" autocomplete="id" autofocus name="id">

        <input type="hidden" class="form-control" value="{{$data->role_name}}" autocomplete="role_name" autofocus name="role_name">

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Upload New Photo</label>

          <div class="col-sm-9">
            <input type="file" class="form-control" value="" autocomplete="image_name" autofocus name="image_name">
          </div>
        </div>

        <footer class="text-center">
          <button type="submit" class="btn btn-success"> Upload Photo </button>
        </footer>
      </form>

    </blockquote>
  </div>
</div>
</div>
</div>
@endsection
