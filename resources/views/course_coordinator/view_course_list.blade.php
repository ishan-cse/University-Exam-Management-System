@extends('layouts.dashboard')


@section('dashboard_information')


<div class="card">
  <div class="card-header">
    All Courses for Edition No : <b> {{$edition_no}} </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">

      <div class="row scrollable">
        <div class="col-xl-12">
          <table class="table table-bordered">

            <thead>

              <tr>
                <th>Course Code</th>
                <th>Course Title</th>
                <th>Credit Hours</th>
                <th>Manage</th>
              </tr>

            </thead>

            <tbody>

              @foreach($course_list as $courses)
              <tr>
                <td>{{$courses->course_code}}</td>
                <td>{{$courses->course_title}}</td>
                <td>{{$courses->credit_hours}}</td>
                <td>
                  @php
                  $id_enc = Crypt::encryptString($courses->id);
                  @endphp
                  <a class="btn btn-success" href="{{url('course_coordinator/view/single_course/'.$id_enc)}}">Update</a>
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
