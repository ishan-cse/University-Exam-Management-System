@extends('layouts.dashboard')


@section('dashboard_information')

@if(Session::has('course_assigned'))
  <script>
    swal({ title: "Done", text: "Courses Assigned to Batch Successfully!", icon: "success", button: "Ok",});
  </script>
@endif

<div class="row scrollable">
<div class="col-md-12">
<div class="card">
  <div class="card-header">
    <b> Trimester Result </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="post" action="{{ url('student/view_trimester_result/only_select_trimester_process') }}" enctype="multipart/form-data">
          @csrf


          <div class="form-group row">

            <div class="col-sm-1">
            </div>

            <div class="col-sm-8">
              <select id="exampleFormControlSelect1" class="form-control" name="trimester_id" required>
                <option value="">Select Trimester</option>
                @foreach($trimester_list as $trimester)
                  @php
                    $trimester_name=DB::table('trimesters')->where('id','=',$trimester->trimester_id)->value('trimester_name');
                  @endphp
                  <option value="{{$trimester->trimester_id}}">{{$trimester_name}}</option>
                @endforeach
              </select>
            </div>

            <button type="submit" class="btn btn-success col-sm-2 col-form-label">Show Result</button>

          </div>

        </form>


      </hr>



    </blockquote>
  </div>
</div>
</div>
</div>
@endsection
