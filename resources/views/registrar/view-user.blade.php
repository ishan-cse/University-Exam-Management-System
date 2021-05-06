@extends('layouts.dashboard')


@section('dashboard_information')



<div class="card">
  <div class="card-header">
    View User Information
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">

      <div class="row scrollable">
        <div class="col-xl-12">
          <table class="table table-bordered table-striped custom_table text-muted">

            <tbody>

              <tr>
                <td>Name</td>
                <td>:</td>
                <td>{{$data->name}}</td>
              </tr>

              <tr>
                <td>Email</td>
                <td>:</td>
                <td>{{$data->email}}</td>
              </tr>

              <tr>
                <td>Password</td>
                <td>:</td>
                <td>{{$data->password}}</td>
              </tr>

            </tbody>

          </table>
        </div>
      </div>

    </blockquote>
  </div>
  <div class="card-footer text-center">

  </div>
</div>



@endsection
