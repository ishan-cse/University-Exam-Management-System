@extends('layouts.dashboard')


@section('dashboard_information')


<div class="card">
  <div class="card-header">
    All Course Editions for : <b> {{$dept}} Department</b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">

      <div class="row scrollable">
        <div class="col-xl-12">
          <table class="table table-bordered">

            <thead>

              <tr>
                <th>All Course Editions</th>
                <th>Manage</th>
              </tr>

            </thead>

            <tbody>

              @foreach($all_edition as $editions)
              <tr>
                <td>{{$editions->edition_no}}</td>
                <td>
                 @php
                 $edition_noc = Crypt::encryptString($editions->edition_no);
                 @endphp
                  <a class="btn btn-success" href="{{url('course_coordinator/view/course_list/'.$edition_noc)}}">View Course List</a>
                </td>
              </tr>

              @endforeach
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
