@extends('layouts.dashboard')


@section('dashboard_information')



@if(Session::has('all_mark_sheet_yet_not_submitted'))
  <script>
    swal({ title: "Oops", text: "All Mark Sheet of This Trimester Yet Not Submitted!", icon: "error", button: "Ok",});
  </script>
@endif

@if(Session::has('trimester_result_publish'))
  <script>
    swal({ title: "Done", text: "Trimester Result Published Successfully!", icon: "success", button: "Ok",});
  </script>
@endif


<div class="card">
  <div class="card-header">
    <b> Publish Trimester Result </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="post" action="{{ url('exam_controller/publish_trimester_result') }}" enctype="multipart/form-data">
          @csrf

          <div class="form-group row">

            <div class="col-sm-1">
            </div>

            <div class="col-sm-8">
              <select id="exampleFormControlSelect1" class="form-control" name="trimester_id" required>
                <option value="">Select Trimester</option>
                @foreach($trimester_list as $trimester)
                  <option value="{{$trimester->id}}">{{$trimester->trimester_name}}</option>
                @endforeach
              </select>
            </div>

        <footer class="text-center">
          <a class="btn btn-success text-white" data-toggle="modal" data-target="#exampleModalLong2">Publish Result</a>
        </footer>

        <!-- Result Publish Button Modal -->


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
                <h4> <b> Are you want to publish this trimester result? </b> </h4>
              </div>
              <div class="modal-footer">
                <center>
                <button type="submit" class="btn btn-success">Yes</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                </center>
              </div>
            </div>
          </div>
        </div>


        <!-- end Modal -->


      </form>


    </blockquote>
  </div>
</div>

@endsection
