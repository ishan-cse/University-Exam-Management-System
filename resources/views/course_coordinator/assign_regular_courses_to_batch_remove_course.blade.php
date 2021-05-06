@extends('layouts.dashboard')


@section('dashboard_information')

@if(Session::has('success'))
  <script>
    swal({ title: "Done", text: "New Batch Creation is Successful!", icon: "success", button: "Ok",});
  </script>
@endif

<div class="row scrollable">
<div class="col-md-12">
<div class="card">
  <div class="card-header">
    <b> Shift Course to an other Level-Term  </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="post" action="{{ url('course_coordinator/assign_regular_course_to_batch/remove_course_process') }}" enctype="multipart/form-data">
          @csrf


          <input type="hidden" class="form-control" value="{{$department_id}}" name="department_id" required>
          <input type="hidden" class="form-control" value="{{$batch_id}}" name="batch_id" required>
          <input type="hidden" class="form-control" value="{{$trimester_id}}" name="trimester_id" required>
          <input type="hidden" class="form-control" value="{{$remove_course_id}}" name="remove_course_id" required>


          @php
            $batch_name=DB::table('batches')->where('id','=',$batch_id)->value('batch_name');
          @endphp

          <div class="form-group row">
            <label for="batch" class="col-sm-3 col-form-label">Batch</label>

            <div class="col-sm-9">
              <input type="text" class="form-control @error('batch') is-invalid @enderror" id="batch" name="batch" value="{{$batch_name}}" required readonly>

              @error('batch')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="level_term" class="col-sm-3 col-form-label">Current Level-Term</label>

            <div class="col-sm-9">
              <input type="text" class="form-control @error('level_term') is-invalid @enderror" id="level_term" name="current_level_term" value={{$level_term}} required readonly>

              @error('level_term')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          @php
            $course_name=DB::table('batch_course_lists')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->where('level_term','=',$level_term)->where('id','=',$remove_course_id)->value('course_title');
          @endphp

          <div class="form-group row">
            <label for="remove_course_name" class="col-sm-3 col-form-label">Course</label>

            <div class="col-sm-9">
              <input type="text" class="form-control @error('remove_course_id') is-invalid @enderror" id="remove_course_name" name="remove_course_name" value={{$course_name}} required readonly>

              @error('remove_course_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Move to</label>

            <div class="col-sm-9">
              <select id="exampleFormControlSelect1" class="form-control" name="remove_level_term" required>
               @if($level_term=='4-3')
                <option value="">No Level-Terms Remain</option>
               @else
                <option value="">Select Level-Term</option>
               @endif

                  @if($level_term=='1-1')

                  <option value="1-2">1-2</option>
                  <option value="1-3">1-3</option>
                  <option value="2-1">2-1</option>
                  <option value="2-2">2-2</option>
                  <option value="2-3">2-3</option>
                  <option value="3-1">3-1</option>
                  <option value="3-2">3-2</option>
                  <option value="3-3">3-3</option>
                  <option value="4-1">4-1</option>
                  <option value="4-2">4-2</option>
                  <option value="4-3">4-3</option>

                  @elseif($level_term=='1-2')

                  <option value="1-3">1-3</option>
                  <option value="2-1">2-1</option>
                  <option value="2-2">2-2</option>
                  <option value="2-3">2-3</option>
                  <option value="3-1">3-1</option>
                  <option value="3-2">3-2</option>
                  <option value="3-3">3-3</option>
                  <option value="4-1">4-1</option>
                  <option value="4-2">4-2</option>
                  <option value="4-3">4-3</option>

                  @elseif($level_term=='1-3')

                  <option value="2-1">2-1</option>
                  <option value="2-2">2-2</option>
                  <option value="2-3">2-3</option>
                  <option value="3-1">3-1</option>
                  <option value="3-2">3-2</option>
                  <option value="3-3">3-3</option>
                  <option value="4-1">4-1</option>
                  <option value="4-2">4-2</option>
                  <option value="4-3">4-3</option>

                  @elseif($level_term=='2-1')

                  <option value="2-2">2-2</option>
                  <option value="2-3">2-3</option>
                  <option value="3-1">3-1</option>
                  <option value="3-2">3-2</option>
                  <option value="3-3">3-3</option>
                  <option value="4-1">4-1</option>
                  <option value="4-2">4-2</option>
                  <option value="4-3">4-3</option>

                  @elseif($level_term=='2-2')

                  <option value="2-3">2-3</option>
                  <option value="3-1">3-1</option>
                  <option value="3-2">3-2</option>
                  <option value="3-3">3-3</option>
                  <option value="4-1">4-1</option>
                  <option value="4-2">4-2</option>
                  <option value="4-3">4-3</option>

                  @elseif($level_term=='2-3')

                  <option value="3-1">3-1</option>
                  <option value="3-2">3-2</option>
                  <option value="3-3">3-3</option>
                  <option value="4-1">4-1</option>
                  <option value="4-2">4-2</option>
                  <option value="4-3">4-3</option>

                  @elseif($level_term=='3-1')

                  <option value="3-2">3-2</option>
                  <option value="3-3">3-3</option>
                  <option value="4-1">4-1</option>
                  <option value="4-2">4-2</option>
                  <option value="4-3">4-3</option>

                  @elseif($level_term=='3-2')

                  <option value="3-3">3-3</option>
                  <option value="4-1">4-1</option>
                  <option value="4-2">4-2</option>
                  <option value="4-3">4-3</option>

                  @elseif($level_term=='3-3')

                  <option value="4-1">4-1</option>
                  <option value="4-2">4-2</option>
                  <option value="4-3">4-3</option>

                  @elseif($level_term=='4-1')

                  <option value="4-2">4-2</option>
                  <option value="4-3">4-3</option>

                  @elseif($level_term=='4-2')

                  <option value="4-3">4-3</option>

                  @endif
              </select>
            </div>
          </div>


        <footer class="text-center">
          <button type="submit" class="btn btn-warning">Shift Course</button>
        </footer>
      </form>


    </blockquote>
  </div>
</div>
</div>
</div>
@endsection
