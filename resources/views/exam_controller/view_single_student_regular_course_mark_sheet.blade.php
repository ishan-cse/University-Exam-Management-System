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
     @if($faculty_final_submit_status==1)

      <form method="POST" action="{{url('exam_controller/update_single_student_regular_course_mark_sheet')}}" enctype="multipart/form-data">
          @csrf


        <input type="hidden" class="form-control" value="{{$single_student_mark_sheet->id}}" name="student_course_mark_sheet_id">
        <input type="hidden" class="form-control" value="{{$course_type}}" name="course_type">
        <input type="hidden" class="form-control" value="{{$single_student_mark_sheet->batch_course_list_id}}" name="batch_course_list_id">
        <input type="hidden" class="form-control" value="{{$single_student_mark_sheet->batch_id}}" name="batch_id">
        <input type="hidden" class="form-control" value="{{$single_student_mark_sheet->trimester_id}}" name="trimester_id">
        <input type="hidden" class="form-control" value="{{$single_student_mark_sheet->student_id}}" name="student_id">

        <input type="hidden" class="form-control" value="{{$single_student_mark_sheet->attendance_marks}}" name="old_attendance_marks">
        <input type="hidden" class="form-control" value="{{$single_student_mark_sheet->assignment_and_presentation_marks}}" name="old_assignment_and_presentation_marks">
        <input type="hidden" class="form-control" value="{{$single_student_mark_sheet->quiz_marks}}" name="old_quiz_marks">
        <input type="hidden" class="form-control" value="{{$single_student_mark_sheet->mid_term_marks}}" name="old_mid_term_marks">
        <input type="hidden" class="form-control" value="{{$single_student_mark_sheet->final_marks}}" name="old_final_marks">

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
           <label class="col-sm-4 col-form-label">Attendance Marks</label>

            <div class="col-sm-4">
               <input type="text" class="form-control @error('attendance_marks') is-invalid @enderror" value="{{ $single_student_mark_sheet->attendance_marks}}" value="{{old('attendance_marks')}}" autofocus name="attendance_marks">

               @error('attendance_marks')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
               @enderror
            </div>



            <div class="col-sm-2">
               <input type="radio" value="0" name="attendance_marks_attend_status"
               @php
                if($single_student_mark_sheet->attendance_marks_attend_status==0){
                  echo "checked";
                }
               @endphp
               >
               <b>Present</b>
            </div>

            <div class="col-sm-2">
               <input type="radio" value="1" name="attendance_marks_attend_status"
               @php
                if($single_student_mark_sheet->attendance_marks_attend_status==1){
                  echo "checked";
                }
               @endphp
               >
               <b>Absent</b>
            </div>


        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Assignment/Presentation Marks</label>

          <div class="col-sm-4">
            <input type="text" class="form-control @error('assignment_and_presentation_marks') is-invalid @enderror" value="{{$single_student_mark_sheet->assignment_and_presentation_marks}}" autofocus name="assignment_and_presentation_marks">

            @error('assignment_and_presentation_marks')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="col-sm-2">
             <input type="radio" value="0" name="assignment_and_presentation_marks_attend_status"
             @php
              if($single_student_mark_sheet->assignment_and_presentation_marks_attend_status==0){
                echo "checked";
              }
             @endphp
             >
             <b>Present</b>
          </div>

          <div class="col-sm-2">
             <input type="radio" value="1" name="assignment_and_presentation_marks_attend_status"
             @php
              if($single_student_mark_sheet->assignment_and_presentation_marks_attend_status==1){
                echo "checked";
              }
             @endphp
             >
             <b>Absent</b>
          </div>

        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Quiz Marks</label>

          <div class="col-sm-4">
            <input type="text" class="form-control @error('quiz_marks') is-invalid @enderror" value="{{$single_student_mark_sheet->quiz_marks}}" autofocus name="quiz_marks">

            @error('quiz_marks')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="col-sm-2">
             <input type="radio" value="0" name="quiz_marks_attend_status"
             @php
              if($single_student_mark_sheet->quiz_marks_attend_status==0){
                echo "checked";
              }
             @endphp
             >
             <b>Present</b>
          </div>

          <div class="col-sm-2">
             <input type="radio" value="1" name="quiz_marks_attend_status"
             @php
              if($single_student_mark_sheet->quiz_marks_attend_status==1){
                echo "checked";
              }
             @endphp
             >
             <b>Absent</b>
          </div>

        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Mid Term Marks</label>

          <div class="col-sm-4">
            <input type="text" class="form-control @error('mid_term_marks') is-invalid @enderror" value="{{$single_student_mark_sheet->mid_term_marks}}" autofocus name="mid_term_marks">

            @error('mid_term_marks')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="col-sm-2">
             <input type="radio" value="0" name="mid_term_marks_attend_status"
             @php
              if($single_student_mark_sheet->mid_term_marks_attend_status==0){
                echo "checked";
              }
             @endphp
             >
             <b>Present</b>
          </div>

          <div class="col-sm-2">
             <input type="radio" value="1" name="mid_term_marks_attend_status"
             @php
              if($single_student_mark_sheet->mid_term_marks_attend_status==1){
                echo "checked";
              }
             @endphp
             >
             <b>Absent</b>
          </div>

        </div>

        <div class="form-group row">
          <label class="col-sm-4 col-form-label">Final Term Marks</label>

          <div class="col-sm-4">
            <input type="text" class="form-control @error('final_marks') is-invalid @enderror" value="{{$single_student_mark_sheet->final_marks}}" autofocus name="final_marks">

            @error('final_marks')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="col-sm-2">
             <input type="radio" value="0" name="final_marks_attend_status"
             @php
              if($single_student_mark_sheet->final_marks_attend_status==0){
                echo "checked";
              }
             @endphp
             >
             <b>Present</b>
          </div>

          <div class="col-sm-2">
             <input type="radio" value="1" name="final_marks_attend_status"
             @php
              if($single_student_mark_sheet->final_marks_attend_status==1){
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

      @elseif($faculty_final_submit_status==0)

      @endif


    </blockquote>
  </div>
</div>
</div>
</div>
@endsection
