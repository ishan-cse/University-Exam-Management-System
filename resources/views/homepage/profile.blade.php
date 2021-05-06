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

@if(Auth::user()->role_name=='Student')

              <tr>
                <td>ID</td>
                <td>:</td>
                <td>{{$data->uni_id}}</td>
              </tr>

@endif

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

@if(Auth::user()->role_name=='Student' || Auth::user()->role_name=='Course Coordinator' || Auth::user()->role_name=='Faculty')

              <tr>
                <td>Department Name</td>
                <td>:</td>
                @php
                  $dept_name=DB::table('departments')->where('id','=',$data->department_id)->value('department_name');
                @endphp
                <td>{{$dept_name}}</td>
              </tr>

@endif

@if(Auth::user()->role_name=='Student')

              <tr>
                <td>Batch Name</td>
                <td>:</td>
                @php
                  $batch_name=DB::table('batches')->where('id','=',$data->batch_id)->value('batch_name');
                @endphp
                <td>{{$batch_name}}</td>
              </tr>

              <tr>
                <td>Admission Trimester</td>
                <td>:</td>
                <td>{{$data->admission_trimester}}</td>
              </tr>

              <tr>
                <td>Student Type</td>
                <td>:</td>
                <td>
                  @php
                    if($data->student_type==1){
                      echo "Regular";
                    }
                    elseif($data->student_type==0){
                      echo "Credit transfer";
                    }
                  @endphp
                </td>
              </tr>

              <tr>
                <td>NID</td>
                <td>:</td>
                <td>{{$data->nid}}</td>
              </tr>

              <tr>
                <td>Birth Certificate No</td>
                <td>:</td>
                <td>{{$data->birth_certificate_no}}</td>
              </tr>

              <tr>
                <td>PSC Result</td>
                <td>:</td>
                <td>{{$data->psc_result}}</td>
              </tr>

              <tr>
                <td>JSC Result</td>
                <td>:</td>
                <td>{{$data->jsc_result}}</td>
              </tr>

              <tr>
                <td>SSC Result</td>
                <td>:</td>
                <td>{{$data->ssc_result}}</td>
              </tr>

              <tr>
                <td>HSC Result</td>
                <td>:</td>
                <td>{{$data->hsc_result}}</td>
              </tr>

@endif

@if(Auth::user()->role_name=='Faculty')

              <tr>
                <td>Designation</td>
                <td>:</td>
                <td>{{$data->designation}}</td>
              </tr>

@endif

@if(Auth::user()->role_name=='Student' || Auth::user()->role_name=='Faculty')

              <tr>
                <td>Phone</td>
                <td>:</td>
                <td>{{$data->phone}}</td>
              </tr>

              <tr>
                <td>Address</td>
                <td>:</td>
                <td>{{$data->address}}</td>
              </tr>

@endif

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
