@extends('layouts.dashboard')


@section('dashboard_information')



@if(Session::has('success'))
  <script>
    swal({ title: "Done", text: "Batch Information Update is Successful!", icon: "success", button: "Ok",});
  </script>
@endif

<div class="card">
  <div class="card-header">
    <b> All Batches </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">

      <div class="row scrollable">
        <div class="col-xl-12">
          <table class="table table-bordered" id="dataTable">

            <thead>

              <tr>
                <th>#</th>
                <th>Batch Name</th>
                <th>Department Name</th>
                <th>Update</th>
              </tr>

            </thead>

            <tbody>

              @php

              $i=1;

              @endphp

              @foreach($all_batch as $batch)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$batch->batch_name}}</td>
                @php
                  $dept_name=DB::table('departments')->where('id','=',$batch->department_id)->value('department_name');
                @endphp
                <td>{{$dept_name}}</td>
                <td>
                  @php
                  $enc_batch_id = Crypt::encryptString($batch->id);
                  @endphp
                  <a class="btn btn-info" href="{{url('registrar/update_batch/'.$enc_batch_id)}}">Update</a>
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
