@extends('layouts.dashboard')


@section('dashboard_information')

<div class="card">
  <div class="card-header">
    <b> Students mark update information </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">

      <div class="row scrollable">
        <div class="col-xl-12">
          <table class="table table-bordered">

            <thead>

              <tr>
                <th>#</th>
                <th>Information</th>
                <th>Date</th>
              </tr>

            </thead>

            <tbody>

              @php

              $i=1;

              @endphp

              @foreach($mark_updated_by_exam_controller_information as $details)
              <tr>
                <td>{{$i++}}</td>
                @php
                $student_details=DB::table('students')->where('id','=',$details->student_id)->first();
                $course_details=DB::table('batch_course_lists')->where('id','=',$details->batch_course_list_id)->first();
                @endphp
                <td>ID : <b class="text-danger">{{$student_details->uni_id}}</b>'s mark updated for <b class="text-success">{{$course_details->course_title}}</b> course <b>[{{$details->course_type}}]</b></td>

                <td>
                  @php
                  $date = $details->created_at;
                  echo date(' m/d/Y', strtotime($date));
                  @endphp

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
