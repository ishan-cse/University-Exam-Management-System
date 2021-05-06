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
    Assign Regular Course for Student : <b> Step 1 </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">


      <form method="post" action="{{ url('/course_coordinator/assign/regular_course/student/first_step_process') }}" enctype="multipart/form-data">
          @csrf


          <div class="form-group row">
            <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Course Edition</label>

            <div class="col-sm-9">
              <select id="exampleFormControlSelect1" class="form-control" name="edition_no" required>
                <option value="">Select Course Edition</option>
                @foreach($course_edition as $edition_list)
                <option>{{$edition_list->edition_no}}</option>
                @endforeach
              </select>
            </div>
          </div>


        <footer class="text-center">
          <button type="submit" class="btn btn-success">Next Step</button>
        </footer>
      </form>


    </blockquote>
  </div>
</div>
</div>
</div>
@endsection
