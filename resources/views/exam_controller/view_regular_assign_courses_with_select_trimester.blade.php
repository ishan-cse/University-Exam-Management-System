@extends('layouts.dashboard')


@section('dashboard_information')

@if(Session::has('mark_sheet_submit'))
  <script>
    swal({ title: "Done", text: "Mark Sheet Sunmitted Successfully!", icon: "success", button: "Ok",});
  </script>
@endif

<div class="row">
<div class="col-md-12">
<div class="card">
  <div class="card-header">
    <b> Assigned Regular Courses </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="post" action="{{ url('/exam_controller/view_regular_assign_courses/only_select_trimester_process') }}" enctype="multipart/form-data">
          @csrf

          <input type="hidden" value="{{$selected_trimester_id}}" name="selected_trimester_id" required>


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

            <button type="submit" class="btn btn-success btn_for_custom col-sm-2 col-form-label">Search</button>

          </div>


          <hr>


        </form>

        @php

        $trimester_name=DB::table('trimesters')->where('id','=',$selected_trimester_id)->value('trimester_name');

        @endphp


        <h2 class="text-center"> <b> {{$trimester_name}} </b> </h2>
        <br>

        <div class="scrollable">


          @foreach($department_list as $department)

          @php

          $i=1;
          $k=0;
          @endphp


          @foreach($assigned_courses as $assigned_course)


          @if($department->id==$assigned_course->department_id)

          @php
            $department_name=DB::table('departments')->where('id','=',$department->id)->value('department_name');
          @endphp


          @if($k==0)

          <table class="table table-bordered">

            <thead>

              <tr>
                <th>#</th>
                <th>Batch</th>
                <th>Manage</th>
              </tr>

            </thead>

            <h3 class="text-center text-success"> <b> {{$department_name}} </b> </h3>

            <tbody>

          <br>

          @php
            $k=1;
          @endphp

          @endif

          @php

          $batch_details=DB::table('batches')->where('department_id','=',$assigned_course->department_id)->where('id','=',$assigned_course->batch_id)->first();

          @endphp

          <tr>
            <td>{{$i++}}</td>
            <td>{{$batch_details->batch_name}}</td>
            <td>
              @php
              //$enc_batch_course_list_id = Crypt::encryptString($assigned_course->batch_course_list_id);
              $enc_batch_id = Crypt::encryptString($assigned_course->batch_id);
              $enc_trimester_id = Crypt::encryptString($assigned_course->trimester_id);
              @endphp

              <a type="button" class="btn btn-primary text-white" href="{{url('exam_controller/view_regular_assigned_course_marks_sheet/'.$enc_batch_id.'/'.$enc_trimester_id)}}">Mark Sheet</a>
            </td>
          </tr>




        @endif
      @endforeach
      @endforeach

    </tbody>

    </table>


<hr>


    </div>

    </blockquote>
  </div>
</div>
</div>
</div>












@endsection
