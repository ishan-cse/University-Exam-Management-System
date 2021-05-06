@extends('layouts.dashboard')


@section('dashboard_information')


@if(Session::has('course_add'))
  <script>
    swal({ title: "Done", text: "Successfully Course Added!", icon: "success", button: "Ok",});
  </script>

@elseif(Session::has('course_remove'))

  <script>
    swal({ title: "Done", text: "Successfully Course Removed to an other Level-Term!", icon: "success", button: "Ok",});
  </script>

@elseif(Session::has('course_interchange'))

    <script>
      swal({ title: "Done", text: "Successfully Course Interchanged!", icon: "success", button: "Ok",});
    </script>
@endif


<div class="row">
<div class="col-md-12">
<div class="card">
  <div class="card-header">
    <b> Assign Regular Courses for Batch </b>
  </div>
  <div class="scrollable">
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="post" action="{{ url('/course_coordinator/assign_regular_course_to_batch/first_step_process') }}" enctype="multipart/form-data">
          @csrf


          <input type="hidden" class="form-control" value="{{$department_id}}" name="department_id" required>
          <input type="hidden" class="form-control" value="{{$batch_id}}" name="$batch_id" required>

          @php
            $trimester_name=DB::table('trimesters')->where('id','=',$trimester_id)->value('trimester_name');
            $enc_trimester_id = Crypt::encryptString($trimester_id);
            $enc_batch_id = Crypt::encryptString($batch_id);
          @endphp

          <div class="form-group row">
            <label for="trimester" class="col-sm-3 col-form-label">Trimester</label>

            <div class="col-sm-9">
              <input type="text" class="form-control @error('trimester') is-invalid @enderror" id="trimester" name="trimester_name" value="{{$trimester_name}}" required readonly>

              @error('trimester')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          @php
            $batch_name=DB::table('batches')->where('id','=',$batch_id)->value('batch_name');
          @endphp

          <div class="form-group row">
            <label for="batch" class="col-sm-3 col-form-label">Batch</label>

            <div class="col-sm-9">
              <input type="text" class="form-control @error('batch') is-invalid @enderror" id="batch" name="batch" value="{{$batch_name}}" required readonly>

              @error('batch')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="lebel_term" class="col-sm-3 col-form-label">Level-Term</label>

            <div class="col-sm-9">
              <input type="text" class="form-control @error('lebel_term') is-invalid @enderror" id="lebel_term" name="lebel_term" value={{$level_term}} required readonly>

              @error('lebel_term')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          @php
          $total_credit_hours=0;
            foreach($trimester_course_list as $t_course_list){
              $total_credit_hours=$total_credit_hours+$t_course_list->credit_hours;
            }
          @endphp

          <div class="form-group row">
            <label for="total_credit_hours" class="col-sm-3 col-form-label">Total Credit Hours</label>

            <div class="col-sm-9">
              <input type="text" class="form-control @error('total_credit_hours') is-invalid @enderror" id="total_credit_hours" name="total_credit_hours" value="{{$total_credit_hours}}" required readonly>

              @error('total_credit_hours')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          @php
          $enc_batch_id = Crypt::encryptString($batch_id);
          $enc_trimester_id = Crypt::encryptString($trimester_id);
          @endphp

          <center>
          <a class="btn btn-danger btn_for_custom" href="{{url('course_coordinator/assign_regular_course_to_batch/add_course/'.$enc_batch_id.'/'.$enc_trimester_id)}}">Add Course</a>
          <a class="btn btn-success text-white btn_for_custom" data-toggle="modal" data-target="#exampleModalLong1">Check Prerequisite Courses</a>
          </center>

          <table class="table table-bordered">

            <thead>

              <tr>
                <th>#</th>
                <th>Course Code</th>
                <th>Course Title</th>
                <th>Credit Hours</th>
                <th>Manage</th>
              </tr>

            </thead>

            <tbody>

              @php

              $i=1;

              @endphp

              @foreach($trimester_course_list as $t_course_list)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$t_course_list->course_code}}</td>
                <td>{{$t_course_list->course_title}}</td>
                <td>{{$t_course_list->credit_hours}}</td>
                <td>
                  @php
                  $enc_course_id = Crypt::encryptString($t_course_list->id);
                  @endphp

                  <a class="btn btn-info btn_for_custom" href="{{url('course_coordinator/assign_regular_course_to_batch/interchange_course/'.$enc_batch_id.'/'.$enc_trimester_id.'/'.$enc_course_id)}}">Interchange</a>
                  <a class="btn btn-danger btn_for_custom" href="{{url('course_coordinator/assign_regular_course_to_batch/remove_course/'.$enc_batch_id.'/'.$enc_trimester_id.'/'.$enc_course_id)}}">Shift</a>
                </td>
              </tr>

              @endforeach
            </tbody>

          </table>

        </div>

        <footer class="text-center">
          <a class="btn btn-warning btn_for_custom" data-toggle="modal" data-target="#exampleModalLong2">Assign Courses</a>
        </footer>
      </form>


    </blockquote>
  </div>
</div>
</div>
</div>


<!-- Check Prerequisite Courses Modal -->


<div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Uncomplete Prerequisite Courses</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body scrollable">

      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Course Title</th>
            <th>Uncomplete Prerequisite Course</th>
          </tr>
        </thead>

              @php

                  $i=1;

              @endphp

          <tbody>


            @foreach($trimester_course_list as $t_course)
            <tr>
              <td>{{$i++}}</td>
              <td>{{$t_course->course_title}}</td>
              <td>

                @php

                  $prerequisite_course_1=DB::table('batch_course_lists')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->where('course_code','=',$t_course->prerequisite_course_code_1)->where('complete_status','=',0)->first();
                  $prerequisite_course_2=DB::table('batch_course_lists')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->where('course_code','=',$t_course->prerequisite_course_code_2)->where('complete_status','=',0)->first();
                  $prerequisite_course_3=DB::table('batch_course_lists')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->where('course_code','=',$t_course->prerequisite_course_code_3)->where('complete_status','=',0)->first();
                  $prerequisite_course_4=DB::table('batch_course_lists')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->where('course_code','=',$t_course->prerequisite_course_code_4)->where('complete_status','=',0)->first();
                  $prerequisite_course_5=DB::table('batch_course_lists')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->where('course_code','=',$t_course->prerequisite_course_code_5)->where('complete_status','=',0)->first();

                @endphp

                @if($prerequisite_course_1)
                  {{$prerequisite_course_1->course_title}}
                @endif

                @if($prerequisite_course_2)
                  <hr>
                  {{$prerequisite_course_2->course_title}}
                @endif

                @if($prerequisite_course_3)
                  <hr>
                  {{$prerequisite_course_3->course_title}}
                @endif

                @if($prerequisite_course_4)
                  <hr>
                  {{$prerequisite_course_4->course_title}}
                @endif

                @if($prerequisite_course_5)
                  <hr>
                  {{$prerequisite_course_5->course_title}}
                @endif


              </td>
            </tr>

            @endforeach

            </tbody>
      </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- end Modal -->


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
        <h4> <b> Are you want to assign courses? </b> </h4>
      </div>
      <div class="modal-footer">
        <center>
        <a class="btn btn-success" href="{{url('course_coordinator/assign_regular_course_to_batch/final_step/'.$enc_batch_id.'/'.$enc_trimester_id)}}">Yes</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </center>
      </div>
    </div>
  </div>
</div>

<!-- end Modal -->


@endsection
