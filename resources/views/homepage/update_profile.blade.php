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
    Update Profile Information
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="POST" action="{{url('process/update/profile')}}" enctype="multipart/form-data">
          @csrf
        <input type="hidden" class="form-control" value="{{$data->id}}" autocomplete="id" autofocus name="id">

        <input type="hidden" class="form-control" value="{{$data->role_name}}" autocomplete="role_name" autofocus name="role_name">

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Name</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" value="{{$data->name}}" autocomplete="name" autofocus name="name">
          </div>
        </div>

        @if(Auth::user()->role_name=='Student' || Auth::user()->role_name=='Faculty')

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Phone</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{$data->phone}}" autocomplete="phone" autofocus name="phone">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Address</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="{{$data->address}}" autocomplete="address" autofocus name="address">
                  </div>
                </div>
@endif

@if(Auth::user()->role_name=='Student')

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">NID</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" value="{{$data->nid}}" autocomplete="nid" autofocus name="nid">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Birth Certificate No</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" value="{{$data->birth_certificate_no}}" autocomplete="birth_certificate_no" autofocus name="birth_certificate_no">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">PSC Result</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" value="{{$data->psc_result}}" autocomplete="psc_result" autofocus name="psc_result">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">JSC Result</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" value="{{$data->jsc_result}}" autocomplete="jsc_result" autofocus name="jsc_result">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">SSC Result</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" value="{{$data->ssc_result}}" autocomplete="ssc_result" autofocus name="ssc_result">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">HSC Result</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" value="{{$data->hsc_result}}" autocomplete="hsc_result" autofocus name="hsc_result">
          </div>
        </div>

@endif

        <footer class="text-center">
          <button type="submit" class="btn btn-success"> Update Profile Information </button>
        </footer>
      </form>

    </blockquote>
  </div>
</div>
</div>
</div>
@endsection
