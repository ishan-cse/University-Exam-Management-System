@extends('layouts.dashboard')


@section('dashboard_information')

@if(Session::has('assign_faculty'))
  <script>
    swal({ title: "Done", text: "Faculty assigned successfully!", icon: "success", button: "Ok",});
  </script>
@endif

@if(Session::has('assign_faculty_finally'))
  <script>
    swal({ title: "Done", text: "Faculty finally assigned for this trimester successfully!", icon: "success", button: "Ok",});
  </script>
@endif

@if(Session::has('send_to_registrar'))
  <script>
    swal({ title: "Done", text: "Send to registrar for assigning faculty for this course!", icon: "success", button: "Ok",});
  </script>
@endif

<div class="row">
<div class="col-md-12">
<div class="card">
  <div class="card-header">
    <b> Assign Repeat/Retake (without the Batch) Courses To Faculty </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="post" action="{{ url('/registrar/view_repeat_retake_assign_courses/only_select_trimester_process') }}" enctype="multipart/form-data">
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


<hr>


<!-- non departmental course -->

<h3 class="text-center text-success"> <b>Non Departmental courses </b> </h3>

<table class="table table-bordered">

  <thead>

    <tr>
      <th>#</th>
      <th>Course Code</th>
      <th>Course Title</th>
      <th>Credit Hours</th>
      <th>Student ID</th>
      <th>Faculty</th>
      <th>Manage</th>
    </tr>

  </thead>

  <tbody>


          @php

          $i=1;

          @endphp


          @foreach($assigned_courses as $assigned_course)

          @php

          $course_details=DB::table('batch_course_lists')->where('department_id','=',$assigned_course->department_id)->where('id','=',$assigned_course->batch_course_list_id)->first();
          //$batch_details=DB::table('batches')->where('department_id','=',$assigned_course->department_id)->where('id','=',$assigned_course->batch_id)->where('course_version_id','=',$assigned_course->course_version_id)->first();
          $faculty_details=DB::table('faculties')->where('department_id','=',$assigned_course->department_id)->where('id','=',$assigned_course->faculty_id)->first();

          @endphp

          @if($course_details->departmental_course_status==0)


          <tr>
            <td>{{$i++}}</td>
            <td>{{$course_details->course_code}}</td>
            <td>{{$course_details->course_title}}</td>
            <td>{{$course_details->credit_hours}}</td>
            <td>{{$assigned_course->student_id}}</td>
            <td>
              @php
                if($faculty_details){
                  echo $faculty_details->name;
                }
              @endphp
            </td>
            <td>
              @php
              $enc_faculty_assign_id = Crypt::encryptString($assigned_course->id);
              $enc_trimester_id = Crypt::encryptString($selected_trimester_id);
              @endphp

              <a class="btn btn-info btn_for_custom" href="{{url('registrar/assign_faculty_to_repeat_retake_course/'.$enc_trimester_id.'/'.$enc_faculty_assign_id)}}">Assign Faculty</a>

              @if($assigned_course->registrar_assign_request_status==0)
              <a class="btn btn-warning btn_for_custom" data-toggle="modal" data-target="#exampleModalLong2{{$i}}">Send to Registrar</a>
              @if($assigned_course->faculty_finally_assign_status==0)
              <a class="btn btn-danger text-white btn_for_custom" data-toggle="modal" data-target="#exampleModalLong1{{$i}}">Finally Assign</a>
              @endif
              @endif
            </td>
          </tr>

          @endif


          <!-- Finally Faculty Assign Button Modal -->


          <div class="modal fade" id="exampleModalLong1{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                  <h4> <b> Are you want to finally assign this faculty? </b> </h4>
                </div>
                <div class="modal-footer">
                  <center>
                  <a class="btn btn-success" href="{{url('registrar/assign_faculty_finally_to_repeat_retake_course/'.$enc_trimester_id.'/'.$enc_faculty_assign_id)}}">Yes</a>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                  </center>
                </div>
              </div>
            </div>
          </div>

          <!-- end Modal -->

          <!-- Send faculty assign request to registrar Button Modal -->


          <div class="modal fade" id="exampleModalLong2{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                  <h4> <b> Are you want to send request to registrar for assigning faculty? </b> </h4>
                </div>
                <div class="modal-footer">
                  <center>
                  <a class="btn btn-success" href="{{url('registrar/send_to_registrar_for_assigning_faculty_to_repeat_retake_course/'.$enc_trimester_id.'/'.$enc_faculty_assign_id)}}">Yes</a>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                  </center>
                </div>
              </div>
            </div>
          </div>

          <!-- end Modal -->



          @endforeach

        </tbody>

      </table>

    </div>

    </blockquote>
  </div>
</div>
</div>
</div>


@endsection
