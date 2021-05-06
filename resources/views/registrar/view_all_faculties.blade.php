@extends('layouts.dashboard')


@section('dashboard_information')



@if(Session::has('faculty_information_updated'))
  <script>
    swal({ title: "Done", text: "Faculty Information Updated Successfully!", icon: "success", button: "Ok",});
  </script>
@endif

<div class="card">
  <div class="card-header">
    <b> All Faculties </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">

      <div class="row scrollable">
        <div class="col-xl-12">
          <table class="table table-bordered" id="dataTable">

            <thead>

              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Department</th>
                <th>Update</th>
              </tr>

            </thead>

            <tbody>

              @php

              $i=1;

              @endphp

              @foreach($all_faculties as $faculty)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$faculty->name}}</td>
                <td>{{$faculty->designation}}</td>
                @php

                $department_name = DB::table('departments')->where('id','=',$faculty->department_id)->value('department_name');
                @endphp
                <td>{{$department_name}}</td>
                <td>
                  @php
                  $enc_faculty_database_id = Crypt::encryptString($faculty->id);
                  @endphp
                  <a class="btn btn-info" href="{{url('registrar/update_faculty_information/'.$enc_faculty_database_id)}}">Update</a>
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
