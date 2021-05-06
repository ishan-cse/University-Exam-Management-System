@extends('layouts.dashboard')


@section('dashboard_information')

@if(Session::has('success'))
  <script>
    swal({ title: "Done", text: "Your Profile Information Update is Successful!", icon: "success", button: "Ok",});
  </script>
@endif



<div class="row scrollable">
  <div class="col-md-12">
<div class="card">
  <div class="card-header">
    Update Student Marks
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
     @if($faculty_final_submit_status==0)

      <form method="POST" action="{{url('faculty/see/single_course_marks_sheet_process')}}" enctype="multipart/form-data">
          @csrf


        <input type="hidden" class="form-control" value="{{$single_course->id}}" autocomplete="assigned_single_course_id" autofocus name="assigned_single_course_id">
        <input type="hidden" class="form-control" value="{{$single_course->course_title}}" autocomplete="single_course_title" autofocus name="single_course_title">
        <input type="hidden" class="form-control" value="{{$single_course->edition_no}}" autocomplete="single_course_edition" autofocus name="single_course_edition">
        <input type="hidden" class="form-control" value="{{$single_course->department_name}}" autocomplete="single_course_department" autofocus name="single_course_department">
        <input type="hidden" class="form-control" value="{{$db}}" autocomplete="db" autofocus name="db">
        <input type="hidden" class="form-control" value="{{$course_assigned_id}}" autocomplete="course_id" autofocus name="course_id">
        <input type="hidden" class="form-control" value="{{$single_course->total_marks}}" autocomplete="total_marks" autofocus name="total_marks">


        @php
        $course=DB::table('courses')->where('course_title','=',$single_course->course_title)->where('edition_no','=',$single_course->edition_no)->where('department_name','=',$single_course->department_name)->first();
        @endphp

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Course Code</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" value="{{$course->course_code}}" autocomplete="name" autofocus name="name" readonly>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Course Title</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" value="{{$single_course->course_title}}" autocomplete="name" autofocus name="name" readonly>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Credit Hours</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" value="{{$course->credit_hours}}" autocomplete="name" autofocus name="name" readonly>
          </div>
        </div>


        <div class="form-group row">
           <label class="col-sm-3 col-form-label">Student ID</label>

           <div class="col-sm-9">
              <input type="text" class="form-control" value="{{$single_course->student_id}}" autocomplete="phone" autofocus name="phone" readonly>
           </div>
        </div>

        <div class="form-group row">
           <label class="col-sm-3 col-form-label">Attendance Marks</label>

            <div class="col-sm-9">
               <input type="text" class="form-control" value="{{$single_course->attendance_marks}}" autocomplete="address" autofocus name="attendance_marks">
            </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Assignment & Presentation Marks</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" value="{{$single_course->assignment_and_presentation_marks}}" autocomplete="assignment_and_presentation_marks" autofocus name="assignment_and_presentation_marks">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Quiz Marks</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" value="{{$single_course->quiz_marks}}" autocomplete="quiz_marks" autofocus name="quiz_marks">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Mid Term Marks</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" value="{{$single_course->mid_term_marks}}" autocomplete="mid_term_marks" autofocus name="mid_term_marks">
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Final Term Marks</label>

          <div class="col-sm-9">
            <input type="text" class="form-control" value="{{$single_course->final_marks}}" autocomplete="final_marks" autofocus name="final_marks">
          </div>
        </div>


        <footer class="text-center">
          <button type="submit" class="btn btn-success"> Update Student Marks </button>
        </footer>
      </form>

      @elseif($faculty_final_submit_status==1)

      @endif

    </blockquote>
  </div>
</div>
</div>
</div>
@endsection
