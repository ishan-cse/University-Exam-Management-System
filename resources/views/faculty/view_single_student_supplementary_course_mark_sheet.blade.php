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
    <b>Update Student Marks</b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
     @if($faculty_final_submit_status==0)

      <form method="POST" action="{{url('faculty/update_single_student_supplementary_course_mark_sheet')}}" enctype="multipart/form-data">
          @csrf


        <input type="hidden" class="form-control" value="{{$single_student_mark_sheet->id}}" name="student_course_mark_sheet_id">
        <input type="hidden" class="form-control" value="{{$single_student_mark_sheet->batch_course_list_id}}" name="batch_course_list_id">
        <input type="hidden" class="form-control" value="{{$single_student_mark_sheet->trimester_id}}" name="trimester_id">
        <input type="hidden" class="form-control" value="{{$enc_faculty_assign_id}}" name="enc_faculty_assign_id">

        @php
        $course_details=DB::table('batch_course_lists')->where('id','=',$single_student_mark_sheet->batch_course_list_id)->first();
        @endphp

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Course Code</label>

          <div class="col-sm-8">
            <input type="text" class="form-control" value="{{$course_details->course_code}}" autocomplete="name" autofocus name="name" readonly>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Course Title</label>

          <div class="col-sm-8">
            <input type="text" class="form-control" value="{{$course_details->course_title}}" autocomplete="name" autofocus name="name" readonly>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Credit Hours</label>

          <div class="col-sm-8">
            <input type="text" class="form-control" value="{{$course_details->credit_hours}}" autocomplete="name" autofocus name="name" readonly>
          </div>
        </div>

        @php
          $student_uni_id=DB::table('students')->where('id','=',$single_student_mark_sheet->student_id)->value('uni_id');
        @endphp

        <div class="form-group row">
           <label class="col-sm-4 col-form-label">Student ID</label>

           <div class="col-sm-8">
              <input type="text" class="form-control" value="{{$student_uni_id}}" autofocus name="student_uni_id" readonly>
           </div>
        </div>


        <div class="form-group row">
          <label class="col-sm-4 col-form-label">70% Marks</label>

          <div class="col-sm-4">
            <input type="text" class="form-control @error('seventy_percentage_marks') is-invalid @enderror" value="{{$single_student_mark_sheet->seventy_percentage_marks}}" autofocus name="seventy_percentage_marks">

            @error('seventy_percentage_marks')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="col-sm-2">
             <input type="radio" value="0" name="seventy_percentage_marks_attend_status"
             @php
              if($single_student_mark_sheet->seventy_percentage_marks_attend_status==0){
                echo "checked";
              }
             @endphp
             >
             <b>Present</b>
          </div>

          <div class="col-sm-2">
             <input type="radio" value="1" name="seventy_percentage_marks_attend_status"
             @php
              if($single_student_mark_sheet->seventy_percentage_marks_attend_status==1){
                echo "checked";
              }
             @endphp
             >
             <b>Absent</b>
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
