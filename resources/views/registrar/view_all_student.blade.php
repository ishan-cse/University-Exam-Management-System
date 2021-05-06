@extends('layouts.dashboard')


@section('dashboard_information')



@if(Session::has('student_information_updated'))
  <script>
    swal({ title: "Done", text: "Student Information Updated Successfully!", icon: "success", button: "Ok",});
  </script>
@endif

<div class="card">
  <div class="card-header">
    <b> All Students </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">

      <div class="row scrollable">
        <div class="col-xl-12">
          <table class="table table-bordered" id="dataTable">

            <thead>

              <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
                <th>Batch</th>
                <th>Department</th>
                <th>Update</th>
              </tr>

            </thead>

            <tbody>

              @php

              $i=1;

              @endphp

              @foreach($all_students as $student)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$student->uni_id}}</td>
                <td>{{$student->name}}</td>
                @php

                $batch_name = DB::table('batches')->where('id','=',$student->batch_id)->value('batch_name');
                $department_name = DB::table('departments')->where('id','=',$student->department_id)->value('department_name');
                @endphp
                <td>{{$batch_name}}</td>
                <td>{{$department_name}}</td>
                <td>
                  @php
                  $enc_student_database_id = Crypt::encryptString($student->id);
                  @endphp
                  <a class="btn btn-info" href="{{url('registrar/update_student_information/'.$enc_student_database_id)}}">Update</a>
                </td>
              </tr>

              @endforeach
            </tbody>

          </table>
        </div>
      </div>

    </blockquote>
  </div>
</div>


@endsection
