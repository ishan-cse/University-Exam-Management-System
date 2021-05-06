@extends('layouts.dashboard')


@section('dashboard_information')

@if(Session::has('success'))
  <script>
    swal({ title: "Done", text: "New Trimester Generated Successfully!", icon: "success", button: "Ok",});
  </script>
@endif

<div class="card">
  <div class="card-header">
      <b> Generate New Trimester </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">

        <footer class="text-center">
          <button class="btn btn-success" data-toggle="modal" data-target="#exampleModalLong2">Generate New Trimester</button>
        </footer>

    </blockquote>
  </div>
</div>


<!-- Course Assign Button Modal -->

<div class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <h4> <b> Are you want to generate new trimester? </b> </h4>
      </div>
      <div class="modal-footer">
        <center>
        <a class="btn btn-success" href="{{url('registrar/process/trimester')}}">Yes</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </center>
      </div>
    </div>
  </div>
</div>

<!-- end Modal -->


@endsection
