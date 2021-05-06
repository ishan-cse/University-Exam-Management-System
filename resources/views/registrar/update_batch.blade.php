@extends('layouts.dashboard')


@section('dashboard_information')



<div class="row scrollable">
  <div class="col-md-12">
<div class="card">
  <div class="card-header">
  <b>  Update Batch Information</b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">

      <form method="POST" action="{{url('registrar/update_batch_process')}}" enctype="multipart/form-data">
          @csrf

        <input type="hidden" class="form-control" value="{{$batch->id}}" name="batch_id">

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Name</label>

          <div class="col-sm-9">
            <input type="text" class="form-control @error('batch_name') is-invalid @enderror" value="{{$batch->batch_name}}" autocomplete="batch_name" autofocus name="batch_name">

            @error('batch_name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror

          </div>
        </div>


        <footer class="text-center">
          <button type="submit" class="btn btn-success"> Update Batch </button>
        </footer>
      </form>


    </blockquote>
  </div>
</div>
</div>
</div>
@endsection
