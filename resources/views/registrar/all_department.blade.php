@extends('layouts.dashboard')


@section('dashboard_information')



@if(Session::has('success'))
  <script>
    swal({ title: "Done", text: "Department Information Update is Successful!", icon: "success", button: "Ok",});
  </script>
@endif

<div class="card">
  <div class="card-header">
    <b> All Departments </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">

      <div class="row scrollable">
        <div class="col-xl-12">
          <table class="table table-bordered" id="dataTable">

            <thead>

              <tr>
                <th>#</th>
                <th>Department Name</th>
                <th>Update</th>
              </tr>

            </thead>

            <tbody>

              @php

              $i=1;

              @endphp

              @foreach($all_department as $department)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$department->department_name}}</td>
                <td>
                  @php
                  $enc_department_id = Crypt::encryptString($department->id);
                  @endphp
                  <a class="btn btn-info" href="{{url('registrar/update_department/'.$enc_department_id)}}">Update</a>
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
