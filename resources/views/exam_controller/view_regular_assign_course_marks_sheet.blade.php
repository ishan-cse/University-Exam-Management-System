@extends('layouts.whiteboard')


@section('dashboard_information')



@if(Session::has('success'))
  <script>
    swal({ title: "Done", text: "Mark Sheet Successfully Updated!", icon: "success", button: "Ok",});
  </script>
@endif

@if(Session::has('null_marks'))
  <script>
    swal({ title: "Oops", text: "All Marks Yet Not Submitted!", icon: "error", button: "Ok",});
  </script>
@endif

@php
  $enc_trimester_id = Crypt::encryptString($trimester_id);
@endphp



<a type="button" class="btn btn-warning btn-lg text-white float-left" href="{{url('exam_controller/view_regular_assign_courses/with_select_trimester/'.$enc_trimester_id)}}"><b>Close</b></a>

<br>
<br>
<br>


              @php

              $p=1;
              @endphp

              @foreach($assigned_regular_student as $regular_student)

                                <!-- Course List Modal -->

                                  <div class="modal fade" id="exampleModalLong2{{$p}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>

                                        <div class="modal-body">

                                          <table class="table table-bordered table-striped">
                                            <thead>
                                              <tr>
                                              <!--  <th>No</th>  -->
                                                <th>Course Code</th>
                                                <th>Name</th>
                                                <th>Update</th>
                                              </tr>
                                            </thead>

                                            <tbody>

                                          @foreach($assigned_regular_course_student_mark_sheet as $student_regular_course_mark_sheet)
                                          @if($regular_student->student_id==$student_regular_course_mark_sheet->student_id)
                                          <tr>
                                            @php

                                            //$course_no=$course_no+1;
                                            $course_code=DB::table('batch_course_lists')->where('id','=',$student_regular_course_mark_sheet->batch_course_list_id)->value('course_code');
                                            $course_title=DB::table('batch_course_lists')->where('id','=',$student_regular_course_mark_sheet->batch_course_list_id)->value('course_title');

                                            @endphp
                                          <td>{{$course_code}}</td>
                                          <td>{{$course_title}}</td>
                                          @php
                                            $enc_student_regular_course_mark_sheet_id = Crypt::encryptString($student_regular_course_mark_sheet->id);
                                          @endphp

                                          <td><a type="button" class="btn btn-info text-white" href="{{url('exam_controller/view_single_student_regular_course_mark_sheet/'.$enc_student_regular_course_mark_sheet_id.'/'.'1')}}">Update</a></td>
                                          </tr>
                                          @endif
                                          @endforeach


                                        </tbody>
                                      </table>
                                        </div>
                                        <div class="modal-footer">
                                          <center>
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                          </center>
                                        </div>
                                      </div>
                                    </div>
                                  </div>


                                  <!-- end Modal -->
                                  @php

                                 $p=$p+1;
                                @endphp
                              @endforeach





                            @php
//
                              $j=1;
                              @endphp

                              @foreach($assigned_repeat_retake_with_batch_student as $retake_student)

                                                <!-- Course List Modal -->

                                                  <div class="modal fade" id="exampleModalLong3{{$j}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>

                                                        <div class="modal-body">

                                                          <table class="table table-bordered table-striped">
                                                            <thead>
                                                              <tr>
                                                              <!--  <th>No</th>  -->
                                                                <th>Course Code</th>
                                                                <th>Name</th>
                                                                <th>Update</th>
                                                              </tr>
                                                            </thead>

                                                            <tbody>

                                                          @foreach($assigned_repeat_retake_course_with_batch_student_mark_sheet as $student_regular_course_mark_sheet)
                                                          @if($retake_student->student_id==$student_regular_course_mark_sheet->student_id)
                                                          <tr>
                                                            @php

                                                            //$course_no=$course_no+1;
                                                            $course_code=DB::table('batch_course_lists')->where('id','=',$student_regular_course_mark_sheet->batch_course_list_id)->value('course_code');
                                                            $course_title=DB::table('batch_course_lists')->where('id','=',$student_regular_course_mark_sheet->batch_course_list_id)->value('course_title');

                                                            @endphp
                                                          <td>{{$course_code}}</td>
                                                          <td>{{$course_title}}</td>
                                                          @php
                                                            $enc_student_regular_course_mark_sheet_id = Crypt::encryptString($student_regular_course_mark_sheet->id);
                                                          @endphp

                                                          <td><a type="button" class="btn btn-info text-white" href="{{url('exam_controller/view_single_student_regular_course_mark_sheet/'.$enc_student_regular_course_mark_sheet_id.'/'.'2')}}">Update</a></td>
                                                          </tr>
                                                          @endif
                                                          @endforeach


                                                        </tbody>
                                                      </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                          <center>
                                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                          </center>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>


                                                  <!-- end Modal -->

                                              @php

                                              $j=$j+1;
                                              @endphp
                                              @endforeach



  <div class="card">
  <div class="card-header">
    <b> Trimester Final Results </b>
    <button class="btn btn-danger btn-md text-white float-right" id="download"><b>Download as PDF</b></a>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">

      <div class="row scrollable">
        <div class="col-md-12" id="result">

          @php
            $batch_name=DB::table('batches')->where('id','=',$batch_id)->value('batch_name');
          @endphp


          <h2 class="text-center"><b>Batch : </b><b class="text-warning">{{$batch_name}}</b></h2>

          <hr>
          <h3 class="text-primary text-center"><b> Regular Students Result </b></h3>
          <hr>

      <table class="table table-bordered table-striped">
        <thead>
          <tr>
          <!--  <th>No</th>  -->
            <th>ID</th>
            <th>Name</th>
            @php
            $course_no=1;
            @endphp

            @php

            $pp=1;

            @endphp


            @foreach($assigned_courses as $course)
            @php

            //$course_no=$course_no+1;
            $course_code=DB::table('batch_course_lists')->where('id','=',$course->batch_course_list_id)->value('course_code');

            @endphp
            <th>
              <table>
              <tr>{{$course_code}}</tr>
              <br>
              <hr>
              <tr>
                <td>Grade</td>
                <td>GPA</td>
              </tr>
              </table>
            </th>

            @php

            $course_no=$course_no+1;
            //$course_code=DB::table('batch_course_lists')->where('id','=',$course->batch_course_list_id)->value('course_code');

            @endphp
            @endforeach
            <th>SGPA</th>
            <th>Update</th>
          </tr>
        </thead>
<!--
              @php

                  $i=1;

              @endphp
-->
          <tbody>


              @foreach($assigned_regular_student as $regular_student)
                <tr>
                  <!--  <td>{{$i++}}</td> -->
                  @php
                    $student_uni_id=DB::table('students')->where('id','=',$regular_student->student_id)->value('uni_id');
                  @endphp


                    <td><b>{{$student_uni_id}}</b></td>
                    @php
                    $name=DB::table('students')->where('id','=',$regular_student->student_id)->value('name');
                    @endphp
                    <td><b>{{$name}}</b></td>

                    @php
                      $total_gpa=0;
                      $total_credit=0;
                    @endphp

                    @foreach($assigned_regular_course_student_mark_sheet as $student_regular_course_mark_sheet)
                    @if($regular_student->student_id==$student_regular_course_mark_sheet->student_id)
                    <td>
                    <table>
                      <tr>

                        @php
                          $mid=NULL;
                          $final=NULL;
                        if($student_regular_course_mark_sheet->mid_term_marks_attend_status==0){
                          $mid=$student_regular_course_mark_sheet->mid_term_marks;
                        }
                        if($student_regular_course_mark_sheet->final_marks_attend_status==0){
                          $final=$student_regular_course_mark_sheet->final_marks;
                        }
                        $seventy_marks=$mid+$final;
                        @endphp


                        @if($seventy_marks>=28 && $student_regular_course_mark_sheet->total_marks>=80 && $student_regular_course_mark_sheet->total_marks<=100)
                        <td><b>A+</b></td>
                        <td><b>4.0</b></td>
                        @php
                          $credit_hour=DB::table('batch_course_lists')->where('id','=',$student_regular_course_mark_sheet->batch_course_list_id)->value('credit_hours');
                          $total_gpa=4.0*$credit_hour+$total_gpa;
                          $total_credit=$credit_hour+$total_credit;
                        @endphp
                        @elseif($seventy_marks>=28 && $student_regular_course_mark_sheet->total_marks>=75 && $student_regular_course_mark_sheet->total_marks<=79)
                        <td><b>A</b></td>
                        <td><b>3.75</b></td>
                        @php
                          $credit_hour=DB::table('batch_course_lists')->where('id','=',$student_regular_course_mark_sheet->batch_course_list_id)->value('credit_hours');
                          $total_gpa=3.75*$credit_hour+$total_gpa;
                          $total_credit=$credit_hour+$total_credit;
                        @endphp
                        @elseif($seventy_marks>=28 && $student_regular_course_mark_sheet->total_marks>=70 && $student_regular_course_mark_sheet->total_marks<=74)
                        <td><b>A-</b></td>
                        <td><b>3.50</b></td>
                        @php
                          $credit_hour=DB::table('batch_course_lists')->where('id','=',$student_regular_course_mark_sheet->batch_course_list_id)->value('credit_hours');
                          $total_gpa=3.50*$credit_hour+$total_gpa;
                          $total_credit=$credit_hour+$total_credit;
                        @endphp
                        @elseif($seventy_marks>=28 && $student_regular_course_mark_sheet->total_marks>=65 && $student_regular_course_mark_sheet->total_marks<=69)
                        <td><b>B+</b></td>
                        <td><b>3.25</b></td>
                        @php
                          $credit_hour=DB::table('batch_course_lists')->where('id','=',$student_regular_course_mark_sheet->batch_course_list_id)->value('credit_hours');
                          $total_gpa=3.25*$credit_hour+$total_gpa;
                          $total_credit=$credit_hour+$total_credit;
                        @endphp
                        @elseif($seventy_marks>=28 && $student_regular_course_mark_sheet->total_marks>=60 && $student_regular_course_mark_sheet->total_marks<=64)
                        <td><b>B</b></td>
                        <td><b>3.00</b></td>
                        @php
                          $credit_hour=DB::table('batch_course_lists')->where('id','=',$student_regular_course_mark_sheet->batch_course_list_id)->value('credit_hours');
                          $total_gpa=3.00*$credit_hour+$total_gpa;
                          $total_credit=$credit_hour+$total_credit;
                        @endphp
                        @elseif($seventy_marks>=28 && $student_regular_course_mark_sheet->total_marks>=55 && $student_regular_course_mark_sheet->total_marks<=59)
                        <td><b>B-</b></td>
                        <td><b>2.75</b></td>
                        @php
                          $credit_hour=DB::table('batch_course_lists')->where('id','=',$student_regular_course_mark_sheet->batch_course_list_id)->value('credit_hours');
                          $total_gpa=2.75*$credit_hour+$total_gpa;
                          $total_credit=$credit_hour+$total_credit;
                        @endphp
                        @elseif($seventy_marks>=28 && $student_regular_course_mark_sheet->total_marks>=50 && $student_regular_course_mark_sheet->total_marks<=54)
                        <td><b>C+</b></td>
                        <td><b>2.50</b></td>
                        @php
                          $credit_hour=DB::table('batch_course_lists')->where('id','=',$student_regular_course_mark_sheet->batch_course_list_id)->value('credit_hours');
                          $total_gpa=2.50*$credit_hour+$total_gpa;
                          $total_credit=$credit_hour+$total_credit;
                        @endphp
                        @elseif($seventy_marks>=28 && $student_regular_course_mark_sheet->total_marks>=45 && $student_regular_course_mark_sheet->total_marks<=49)
                        <td><b>C</b></td>
                        <td><b>2.25</b></td>
                        @php
                          $credit_hour=DB::table('batch_course_lists')->where('id','=',$student_regular_course_mark_sheet->batch_course_list_id)->value('credit_hours');
                          $total_gpa=2.25*$credit_hour+$total_gpa;
                          $total_credit=$credit_hour+$total_credit;
                        @endphp
                        @elseif($seventy_marks>=28 && $student_regular_course_mark_sheet->total_marks>=40 && $student_regular_course_mark_sheet->total_marks<=44)
                        <td><b>D</b></td>
                        <td><b>2.00</b></td>
                        @php
                          $credit_hour=DB::table('batch_course_lists')->where('id','=',$student_regular_course_mark_sheet->batch_course_list_id)->value('credit_hours');
                          $total_gpa=2.00*$credit_hour+$total_gpa;
                          $total_credit=$credit_hour+$total_credit;
                        @endphp
                        @elseif($seventy_marks<=27 || ($student_regular_course_mark_sheet->total_marks>=0 && $student_regular_course_mark_sheet->total_marks<=39))
                        <td><b>F</b></td>
                        <td><b>0.00</b></td>
                        @php
                          $credit_hour=DB::table('batch_course_lists')->where('id','=',$student_regular_course_mark_sheet->batch_course_list_id)->value('credit_hours');
                          $total_gpa=0.00*$credit_hour+$total_gpa;
                          $total_credit=$credit_hour+$total_credit;
                        @endphp
                        @endif
                      </tr>
                    </table>
                  </td>

                    @endif
                    @endforeach


                    @php
                      if($total_credit!=0){
                        $sgpa=round($total_gpa/$total_credit, 2);
                        //$sgpa=$total_gpa/$total_credit;
                      }
                      elseif($total_credit==0){
                        $sgpa=0;
                      }
                    @endphp
                    <td><b>{{$sgpa}}</b></td>


                    <td><a type="button" class="btn btn-primary btn-lg text-white" data-toggle="modal" data-target="#exampleModalLong2{{$pp}}"><b>Update</b></a></td>

                </tr>


              @php

              $pp=$pp+1;

              @endphp
              @endforeach


            </tbody>
          </table>

          <hr>
          <h3 class="text-primary text-center"><b> Repeat/Retake Students Result </b></h3>
          <hr>

          <table class="table table-bordered table-striped">
            <thead>
              <tr>
              <!--  <th>No</th>  -->
                <th>ID</th>
                <th>Name</th>


                @foreach($repeat_assigned_courses as $course)

                @php

                $course_code=DB::table('batch_course_lists')->where('id','=',$course->batch_course_list_id)->value('course_code');

                @endphp

                <th>
                  <table>
                  <tr>{{$course_code}}</tr>
                  <br>
                  <hr>
                  <tr>
                    <td>Grade</td>
                    <td>GPA</td>
                  </tr>
                  </table>
                </th>

                @endforeach

              <th>Update</th>
              </tr>
            </thead>

            <tbody>


              @php

              $jj=1;

              @endphp

              @foreach($assigned_repeat_retake_with_batch_student as $retake_student)
                <tr>
                  <!--  <td>{{$i++}}</td> -->
                  @php
                    $student_uni_id=DB::table('students')->where('id','=',$retake_student->student_id)->value('uni_id');
                  @endphp

                    <td><b>{{$student_uni_id}}</b></td>
                    @php
                    $name=DB::table('students')->where('id','=',$retake_student->student_id)->value('name');
                    @endphp
                    <td><b>{{$name}}</b></td>

                    @php
                      $total_gpa=0;
                      $total_credit=0;
                    @endphp

                    @foreach($assigned_repeat_retake_course_with_batch_student_mark_sheet as $student_regular_course_mark_sheet)
                    @if($retake_student->student_id==$student_regular_course_mark_sheet->student_id)
                    <td>
                    <table>
                      <tr>


                        @php
                          $mid=NULL;
                          $final=NULL;
                        if($student_regular_course_mark_sheet->mid_term_marks_attend_status==0){
                          $mid=$student_regular_course_mark_sheet->mid_term_marks;
                        }
                        if($student_regular_course_mark_sheet->final_marks_attend_status==0){
                          $final=$student_regular_course_mark_sheet->final_marks;
                        }
                        $seventy_marks=$mid+$final;
                        @endphp


                        @if($seventy_marks>=28 && $student_regular_course_mark_sheet->total_marks>=80 && $student_regular_course_mark_sheet->total_marks<=100)
                        <td><b>A+</b></td>
                        <td><b>4.0</b></td>
                        @php
                          $credit_hour=DB::table('batch_course_lists')->where('id','=',$student_regular_course_mark_sheet->batch_course_list_id)->value('credit_hours');
                          $total_gpa=4.0*$credit_hour+$total_gpa;
                          $total_credit=$credit_hour+$total_credit;
                        @endphp
                        @elseif($seventy_marks>=28 && $student_regular_course_mark_sheet->total_marks>=75 && $student_regular_course_mark_sheet->total_marks<=79)
                        <td><b>A</b></td>
                        <td><b>3.75</b></td>
                        @php
                          $credit_hour=DB::table('batch_course_lists')->where('id','=',$student_regular_course_mark_sheet->batch_course_list_id)->value('credit_hours');
                          $total_gpa=3.75*$credit_hour+$total_gpa;
                          $total_credit=$credit_hour+$total_credit;
                        @endphp
                        @elseif($seventy_marks>=28 && $student_regular_course_mark_sheet->total_marks>=70 && $student_regular_course_mark_sheet->total_marks<=74)
                        <td><b>A-</b></td>
                        <td><b>3.50</b></td>
                        @php
                          $credit_hour=DB::table('batch_course_lists')->where('id','=',$student_regular_course_mark_sheet->batch_course_list_id)->value('credit_hours');
                          $total_gpa=3.50*$credit_hour+$total_gpa;
                          $total_credit=$credit_hour+$total_credit;
                        @endphp
                        @elseif($seventy_marks>=28 && $student_regular_course_mark_sheet->total_marks>=65 && $student_regular_course_mark_sheet->total_marks<=69)
                        <td><b>B+</b></td>
                        <td><b>3.25</b></td>
                        @php
                          $credit_hour=DB::table('batch_course_lists')->where('id','=',$student_regular_course_mark_sheet->batch_course_list_id)->value('credit_hours');
                          $total_gpa=3.25*$credit_hour+$total_gpa;
                          $total_credit=$credit_hour+$total_credit;
                        @endphp
                        @elseif($seventy_marks>=28 && $student_regular_course_mark_sheet->total_marks>=60 && $student_regular_course_mark_sheet->total_marks<=64)
                        <td><b>B</b></td>
                        <td><b>3.00</b></td>
                        @php
                          $credit_hour=DB::table('batch_course_lists')->where('id','=',$student_regular_course_mark_sheet->batch_course_list_id)->value('credit_hours');
                          $total_gpa=3.00*$credit_hour+$total_gpa;
                          $total_credit=$credit_hour+$total_credit;
                        @endphp
                        @elseif($seventy_marks>=28 && $student_regular_course_mark_sheet->total_marks>=55 && $student_regular_course_mark_sheet->total_marks<=59)
                        <td><b>B-</b></td>
                        <td><b>2.75</b></td>
                        @php
                          $credit_hour=DB::table('batch_course_lists')->where('id','=',$student_regular_course_mark_sheet->batch_course_list_id)->value('credit_hours');
                          $total_gpa=2.75*$credit_hour+$total_gpa;
                          $total_credit=$credit_hour+$total_credit;
                        @endphp
                        @elseif($seventy_marks>=28 && $student_regular_course_mark_sheet->total_marks>=50 && $student_regular_course_mark_sheet->total_marks<=54)
                        <td><b>C+</b></td>
                        <td><b>2.50</b></td>
                        @php
                          $credit_hour=DB::table('batch_course_lists')->where('id','=',$student_regular_course_mark_sheet->batch_course_list_id)->value('credit_hours');
                          $total_gpa=2.50*$credit_hour+$total_gpa;
                          $total_credit=$credit_hour+$total_credit;
                        @endphp
                        @elseif($seventy_marks>=28 && $student_regular_course_mark_sheet->total_marks>=45 && $student_regular_course_mark_sheet->total_marks<=49)
                        <td><b>C</b></td>
                        <td><b>2.25</b></td>
                        @php
                          $credit_hour=DB::table('batch_course_lists')->where('id','=',$student_regular_course_mark_sheet->batch_course_list_id)->value('credit_hours');
                          $total_gpa=2.25*$credit_hour+$total_gpa;
                          $total_credit=$credit_hour+$total_credit;
                        @endphp
                        @elseif($seventy_marks>=28 && $student_regular_course_mark_sheet->total_marks>=40 && $student_regular_course_mark_sheet->total_marks<=44)
                        <td><b>D</b></td>
                        <td><b>2.00</b></td>
                        @php
                          $credit_hour=DB::table('batch_course_lists')->where('id','=',$student_regular_course_mark_sheet->batch_course_list_id)->value('credit_hours');
                          $total_gpa=2.00*$credit_hour+$total_gpa;
                          $total_credit=$credit_hour+$total_credit;
                        @endphp
                        @elseif($seventy_marks<=27 || ($student_regular_course_mark_sheet->total_marks>=0 && $student_regular_course_mark_sheet->total_marks<=39))
                        <td><b>F</b></td>
                        <td><b>0.00</b></td>
                        @php
                          $credit_hour=DB::table('batch_course_lists')->where('id','=',$student_regular_course_mark_sheet->batch_course_list_id)->value('credit_hours');
                          $total_gpa=0.00*$credit_hour+$total_gpa;
                          $total_credit=$credit_hour+$total_credit;
                        @endphp
                        @endif
                      </tr>
                    </table>
                    </td>

                    @endif
                    @endforeach

                    <td><a type="button" class="btn btn-primary btn-lg text-white" data-toggle="modal" data-target="#exampleModalLong3{{$jj}}"><b>Update</b></a></td>

                    </tr>


                    @php

                    $jj=$jj+1;

                    @endphp
                    @endforeach



            </tbody>
      </table>

      <br>

      <footer class="text-center">
      </footer>

      <br>

    </div>
  </div>


    </blockquote>
  </div>
</div>

@endsection
