@extends('layouts.dashboard')


@section('dashboard_information')


<div class="card">
  <div class="card-header">
      <b> All User Information </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">

      <div class="row scrollable">
        <div class="col-xl-12">
          <table class="table table-bordered" id="dataTable">

            <thead>

              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Manage</th>
              </tr>

            </thead>

            <tbody>

              @foreach($allusers as $data)
              <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{Str::limit($data->password,10)}}</td>
                <td>
                  <a href="{{url('registrar/view-user/'.$data->uni_id)}}"><i class="fas fa-plus-square"></i></a>
                  <a href="#"><i class="fas fa-pen-square"></i></a>
                  <a href="#"><i class="fas fa-trash-alt"></i></a>
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
