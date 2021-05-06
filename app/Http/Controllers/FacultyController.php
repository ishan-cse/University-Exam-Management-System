<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use Illuminate\Support\Facades\Crypt;


class FacultyController extends Controller
{
  public function __construct(){
       $this->middleware('auth');
       $this->middleware('faculty');
  }

  public function faculty_see_assigned_course(){


      $faculty_id=Auth::user()->id;
      $trimester=DB::table('trimesters')->where('active_status','=',1)->value('trimester_name');

      $assigned_course_list=DB::table('regular_course_assign_to_faculties')->where('trimester_name','=',$trimester)->where('faculty_id','=',$faculty_id)->where('faculty_final_submit_status','=',0)->get();
      $assigned_supplementary_list=DB::table('assign_supplementary_exams')->where('trimester_name','=',$trimester)->where('faculty_id','=',$faculty_id)->where('faculty_final_submit_status','=',0)->get();

      return view('faculty.see_assigned_course',compact('assigned_course_list','assigned_supplementary_list'));
  }

  public function faculty_see_course_marks_sheet($course_assigned_id){

    $assigned_course=DB::table('regular_course_assign_to_faculties')->where('id','=',$course_assigned_id)->first();
    $faculty_final_submit_status=$assigned_course->faculty_final_submit_status;


    $regular_student_list=DB::table('regular_course_assign_to_students')->where('course_title','=',$assigned_course->course_title)->where('batch_name','=',$assigned_course->batch_name)->where('department_name','=',$assigned_course->department_name)->where('trimester_name','=',$assigned_course->trimester_name)->where('edition_no','=',$assigned_course->edition_no)->
    where('faculty_final_submit_status','=',0)->get();
    $repeat_retake_student_list=DB::table('repeat_retake_course_assign_to_students')->where('course_title','=',$assigned_course->course_title)->where('batch_name','=',$assigned_course->batch_name)->where('department_name','=',$assigned_course->department_name)->where('trimester_name','=',$assigned_course->trimester_name)->where('edition_no','=',$assigned_course->edition_no)->
    where('faculty_final_submit_status','=',0)->get();

    $department=$assigned_course->department_name;
    $batch=$assigned_course->batch_name;

    return view('faculty.see_course_marks_sheet',compact('regular_student_list','repeat_retake_student_list','course_assigned_id','department','batch','faculty_final_submit_status'));
  }

    public function faculty_see_single_course_marks_sheet($single_course_assigned_id,$db,$course_assigned_id){

      if($db==1){
        $single_course=DB::table('regular_course_assign_to_students')->where('id','=',$single_course_assigned_id)->first();

        $faculty_final_submit_status=$single_course->faculty_final_submit_status;

        return view('faculty.see_single_course_marks_sheet',compact('single_course','db','course_assigned_id','faculty_final_submit_status'));
      }
      elseif($db==2){
        $single_course=DB::table('repeat_retake_course_assign_to_students')->where('id','=',$single_course_assigned_id)->first();

        $faculty_final_submit_status=$single_course->faculty_final_submit_status;
        return view('faculty.see_single_course_marks_sheet',compact('single_course','db','course_assigned_id','faculty_final_submit_status'));
      }

    }

    public function faculty_see_single_course_marks_sheet_process(Request $request){

      $total_marks=$request['attendance_marks']+$request['assignment_and_presentation_marks']+$request['quiz_marks']+$request['mid_term_marks']+$request['final_marks']+$request['total_marks'];


      if($request['db']==1){
        $update=DB::table('regular_course_assign_to_students')->where('id','=',$request['single_course_id'])->update([
          'attendance_marks'=>$request['attendance_marks'],
          'assignment_and_presentation_marks'=>$request['assignment_and_presentation_marks'],
          'quiz_marks'=>$request['quiz_marks'],
          'mid_term_marks'=>$request['mid_term_marks'],
          'final_marks'=>$request['final_marks'],
          'total_marks'=>$total_marks,
        ]);
      }
      elseif($request['db']==2){
        $update=DB::table('repeat_retake_course_assign_to_students')->where('id','=',$request['single_course_id'])->update([
          'attendance_marks'=>$request['attendance_marks'],
          'assignment_and_presentation_marks'=>$request['assignment_and_presentation_marks'],
          'quiz_marks'=>$request['quiz_marks'],
          'mid_term_marks'=>$request['mid_term_marks'],
          'final_marks'=>$request['final_marks'],
          'total_marks'=>$total_marks,
        ]);
      }

      if(empty($update) || !empty($update)){
   /*   $course_edition=$request['edition_no'];
        $faculty_department=$request['faculty_department'];

        $enc_faculty_department = Crypt::encryptString($faculty_department);
        $enc_course_edition = Crypt::encryptString($course_edition);
      */
        Session::flash('success');
        return redirect('/faculty/see/course_marks_sheet/'.$request['course_id']);

      }


    }

    public function faculty_final_submission_course_marks_sheet($course_assigned_id){
      $assigned_course=DB::table('regular_course_assign_to_faculties')->where('id','=',$course_assigned_id)->first();
      $faculty_final_submit_status=$assigned_course->faculty_final_submit_status;

      $regular_student_list=DB::table('regular_course_assign_to_students')->where('course_title','=',$assigned_course->course_title)->where('batch_name','=',$assigned_course->batch_name)->where('department_name','=',$assigned_course->department_name)->where('trimester_name','=',$assigned_course->trimester_name)->where('edition_no','=',$assigned_course->edition_no)->
      where('faculty_final_submit_status','=',0)->get();
      $repeat_retake_student_list=DB::table('repeat_retake_course_assign_to_students')->where('course_title','=',$assigned_course->course_title)->where('batch_name','=',$assigned_course->batch_name)->where('department_name','=',$assigned_course->department_name)->where('trimester_name','=',$assigned_course->trimester_name)->where('edition_no','=',$assigned_course->edition_no)->
      where('faculty_final_submit_status','=',0)->get();

      $department=$assigned_course->department_name;
      $batch=$assigned_course->batch_name;

      foreach ($regular_student_list as $regular_list) {
        if($regular_list->attendance_marks=== NULL || $regular_list->assignment_and_presentation_marks=== NULL || $regular_list->quiz_marks=== NULL || $regular_list->mid_term_marks=== NULL || $regular_list->final_marks=== NULL){
          Session::flash('null_marks');
          return view('faculty.see_course_marks_sheet',compact('regular_student_list','repeat_retake_student_list','course_assigned_id','department','batch','faculty_final_submit_status'));
        }
      }

      foreach ($repeat_retake_student_list as $repeat_retake_list) {
        if($repeat_retake_list->attendance_marks=== NULL || $repeat_retake_list->assignment_and_presentation_marks=== NULL || $repeat_retake_list->quiz_marks=== NULL || $repeat_retake_list->mid_term_marks=== NULL || $repeat_retake_list->final_marks=== NULL){
          Session::flash('null_marks');
          return view('faculty.see_course_marks_sheet',compact('regular_student_list','repeat_retake_student_list','course_assigned_id','department','batch','faculty_final_submit_status'));
        }
      }

      $assigned_course1=DB::table('regular_course_assign_to_faculties')->where('id','=',$course_assigned_id)->update([
        'faculty_final_submit_status'=>1,
      ]);
      $faculty_final_submit_status1=$assigned_course->faculty_final_submit_status;

      $regular_student_list1=DB::table('regular_course_assign_to_students')->where('course_title','=',$assigned_course1->course_title)->where('batch_name','=',$assigned_course1->batch_name)->where('department_name','=',$assigned_course1->department_name)->where('trimester_name','=',$assigned_course1->trimester_name)->where('edition_no','=',$assigned_course1->edition_no)->
      where('faculty_final_submit_status','=',0)->get();
      $repeat_retake_student_list1=DB::table('repeat_retake_course_assign_to_students')->where('course_title','=',$assigned_course1->course_title)->where('batch_name','=',$assigned_course1->batch_name)->where('department_name','=',$assigned_course1->department_name)->where('trimester_name','=',$assigned_course1->trimester_name)->where('edition_no','=',$assigned_course1->edition_no)->
      where('faculty_final_submit_status','=',0)->get();
/*
      foreach ($regular_student_list1 as $regular_list1) {
        if($regular_list1->total_marks>=0 && $regular_list1->total_marks<=39){

        }
      }

      foreach ($repeat_retake_student_list as $repeat_retake_list) {
        if($repeat_retake_list->attendance_marks=== NULL || $repeat_retake_list->assignment_and_presentation_marks=== NULL || $repeat_retake_list->quiz_marks=== NULL || $repeat_retake_list->mid_term_marks=== NULL || $repeat_retake_list->final_marks=== NULL){
          Session::flash('null_marks');
          return view('faculty.see_course_marks_sheet',compact('regular_student_list','repeat_retake_student_list','course_assigned_id','department','batch','faculty_final_submit_status'));
        }
      } */

    }


//regular


public function view_regular_assign_courses_only_select_trimester(){
  $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

    return view('faculty.view_regular_assign_courses_only_select_trimester',compact('trimester_list'));
}
//
public function view_regular_assign_courses_only_select_trimester_process(Request $request){

  $enc_trimester_id = Crypt::encryptString($request['trimester_id']);

  return redirect('/faculty/view_regular_assign_courses/with_select_trimester/'.$enc_trimester_id);
}
//

public function view_regular_assign_courses_with_select_trimester($enc_trimester_id){
  $dept_id=DB::table('faculties')->where('id','=',Auth::user()->id)->value('department_id');
  $selected_trimester_id = Crypt::decryptString($enc_trimester_id);
  $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

  $assigned_courses=DB::table('regular_course_assign_to_faculties')->where('trimester_id','=',$selected_trimester_id)->where('faculty_id','=',Auth::user()->id)->where('faculty_finally_assign_status','=',1)->where('faculty_final_submit_status','=',0)->get();


  return view('faculty.view_regular_assign_courses_with_select_trimester',compact('dept_id','selected_trimester_id','trimester_list','assigned_courses'));
}
//
public function faculty_see_regular_assigned_course_marks_sheet($enc_batch_course_list_id,$enc_batch_id,$enc_trimester_id){
  $batch_course_list_id = Crypt::decryptString($enc_batch_course_list_id);
  $batch_id = Crypt::decryptString($enc_batch_id);
  $trimester_id = Crypt::decryptString($enc_trimester_id);

  $faculty_final_submit_status=DB::table('regular_course_assign_to_faculties')->where('batch_course_list_id','=',$batch_course_list_id)->where('batch_id','=',$batch_id)->where('trimester_id','=',$trimester_id)->value('faculty_final_submit_status');

  $assigned_regular_course_student_mark_sheet=DB::table('regular_course_assign_to_students')->where('batch_course_list_id','=',$batch_course_list_id)->where('batch_id','=',$batch_id)->where('trimester_id','=',$trimester_id)->where('faculty_final_submit_status','=',0)->get();

  $assigned_repeat_retake_course_with_batch_student_mark_sheet=DB::table('repeat_retake_course_assign_to_student_with_batches')->where('batch_course_list_id','=',$batch_course_list_id)->where('batch_id','=',$batch_id)->where('trimester_id','=',$trimester_id)->where('faculty_final_submit_status','=',0)->get();

  //return view('faculty.see_regular_assign_course_marks_sheet',compact('dept_id','selected_trimester_id','trimester_list','assigned_courses'));
  return view('faculty.view_regular_assign_course_marks_sheet',compact('assigned_regular_course_student_mark_sheet','assigned_repeat_retake_course_with_batch_student_mark_sheet','faculty_final_submit_status','trimester_id','enc_batch_course_list_id','enc_batch_id','enc_trimester_id','batch_id','batch_course_list_id'));
}

//
public function faculty_view_single_student_regular_course_mark_sheet($enc_student_course_mark_sheet_id,$course_type){

  $student_course_mark_sheet_id = Crypt::decryptString($enc_student_course_mark_sheet_id);

  if($course_type==1){
    //$student_course_mark_sheet_id = Crypt::decryptString($enc_student_regular_course_mark_sheet_id);
    $single_student_mark_sheet=DB::table('regular_course_assign_to_students')->where('id','=',$student_course_mark_sheet_id)->first();

    $faculty_final_submit_status=$single_student_mark_sheet->faculty_final_submit_status;


    return view('faculty.view_single_student_regular_course_mark_sheet',compact('single_student_mark_sheet','course_type','faculty_final_submit_status'));

  }
  elseif($course_type==2){
    $single_student_mark_sheet=DB::table('repeat_retake_course_assign_to_student_with_batches')->where('id','=',$student_course_mark_sheet_id)->first();

    $faculty_final_submit_status=$single_student_mark_sheet->faculty_final_submit_status;

    return view('faculty.view_single_student_regular_course_mark_sheet',compact('single_student_mark_sheet','course_type','faculty_final_submit_status'));
  }

}


public function faculty_update_single_student_regular_course_mark_sheet(Request $request){

  $this->validate($request,[
    'attendance_marks' => 'nullable|numeric|max:10|min:0',
    'assignment_and_presentation_marks' => 'nullable|numeric|max:10|min:0',
    'quiz_marks' => 'nullable|numeric|max:10|min:0',
    'mid_term_marks' => 'nullable|numeric|max:30|min:0',
    'final_marks' => 'nullable|numeric|max:40|min:0',
  ],[

  ]);

  if($request['course_type']==1){

    $attendance_marks=NULL;

    if($request['attendance_marks_attend_status']==0){

      $attendance_marks=$request['attendance_marks'];

      DB::table('regular_course_assign_to_students')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'attendance_marks'=>$request['attendance_marks'],
      ]);
    }

    if($request['attendance_marks_attend_status']==1){

      DB::table('regular_course_assign_to_students')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'attendance_marks'=>$attendance_marks,
      ]);
    }

    $assignment_and_presentation_marks=NULL;

    if($request['assignment_and_presentation_marks_attend_status']==0){

      $assignment_and_presentation_marks=$request['assignment_and_presentation_marks'];

      DB::table('regular_course_assign_to_students')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'assignment_and_presentation_marks'=>$request['assignment_and_presentation_marks'],
      ]);
    }

    if($request['assignment_and_presentation_marks_attend_status']==1){

      DB::table('regular_course_assign_to_students')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'assignment_and_presentation_marks'=>$assignment_and_presentation_marks,
      ]);
    }

    $quiz_marks=NULL;

    if($request['quiz_marks_attend_status']==0){

      $quiz_marks=$request['quiz_marks'];

      DB::table('regular_course_assign_to_students')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'quiz_marks'=>$request['quiz_marks'],
      ]);
    }

    if($request['quiz_marks_attend_status']==1){

      DB::table('regular_course_assign_to_students')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'quiz_marks'=>$quiz_marks,
      ]);
    }

    $mid_term_marks=NULL;

    if($request['mid_term_marks_attend_status']==0){

      $mid_term_marks=$request['mid_term_marks'];

      DB::table('regular_course_assign_to_students')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'mid_term_marks'=>$request['mid_term_marks'],
      ]);
    }

    if($request['mid_term_marks_attend_status']==1){

      DB::table('regular_course_assign_to_students')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'mid_term_marks'=>$mid_term_marks,
      ]);
    }

    $final_marks=NULL;

    if($request['final_marks_attend_status']==0){

      $final_marks=$request['final_marks'];

      DB::table('regular_course_assign_to_students')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'final_marks'=>$request['final_marks'],
      ]);
    }

    if($request['final_marks_attend_status']==1){

      DB::table('regular_course_assign_to_students')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'final_marks'=>$final_marks,
      ]);
    }

      $total_marks=$attendance_marks+$assignment_and_presentation_marks+$quiz_marks+$mid_term_marks+$final_marks;


    $update=DB::table('regular_course_assign_to_students')->where('id','=',$request['student_course_mark_sheet_id'])->update([
      'attendance_marks_attend_status'=>$request['attendance_marks_attend_status'],
      'assignment_and_presentation_marks_attend_status'=>$request['assignment_and_presentation_marks_attend_status'],
      'quiz_marks_attend_status'=>$request['quiz_marks_attend_status'],
      'mid_term_marks_attend_status'=>$request['mid_term_marks_attend_status'],
      'final_marks_attend_status'=>$request['final_marks_attend_status'],
      'total_marks'=>$total_marks,
    ]);
  }

  elseif($request['course_type']==2){
  /*  $update=DB::table('repeat_retake_course_assign_to_student_with_batches')->where('id','=',$request['student_course_mark_sheet_id'])->update([
      'attendance_marks'=>$request['attendance_marks'],
      'assignment_and_presentation_marks'=>$request['assignment_and_presentation_marks'],
      'quiz_marks'=>$request['quiz_marks'],
      'mid_term_marks'=>$request['mid_term_marks'],
      'final_marks'=>$request['final_marks'],
      'total_marks'=>$total_marks,
    ]);
    */

    $attendance_marks=NULL;

    if($request['attendance_marks_attend_status']==0){

      $attendance_marks=$request['attendance_marks'];

      DB::table('repeat_retake_course_assign_to_student_with_batches')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'attendance_marks'=>$request['attendance_marks'],
      ]);
    }

    if($request['attendance_marks_attend_status']==1){

      DB::table('repeat_retake_course_assign_to_student_with_batches')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'attendance_marks'=>$attendance_marks,
      ]);
    }

    $assignment_and_presentation_marks=NULL;

    if($request['assignment_and_presentation_marks_attend_status']==0){

      $assignment_and_presentation_marks=$request['assignment_and_presentation_marks'];

      DB::table('repeat_retake_course_assign_to_student_with_batches')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'assignment_and_presentation_marks'=>$request['assignment_and_presentation_marks'],
      ]);
    }

    if($request['assignment_and_presentation_marks_attend_status']==1){

      DB::table('repeat_retake_course_assign_to_student_with_batches')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'assignment_and_presentation_marks'=>$assignment_and_presentation_marks,
      ]);
    }

    $quiz_marks=NULL;

    if($request['quiz_marks_attend_status']==0){

      $quiz_marks=$request['quiz_marks'];

      DB::table('repeat_retake_course_assign_to_student_with_batches')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'quiz_marks'=>$request['quiz_marks'],
      ]);
    }

    if($request['quiz_marks_attend_status']==1){

      DB::table('repeat_retake_course_assign_to_student_with_batches')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'quiz_marks'=>$quiz_marks,
      ]);
    }

    $mid_term_marks=NULL;

    if($request['mid_term_marks_attend_status']==0){

      $mid_term_marks=$request['mid_term_marks'];

      DB::table('repeat_retake_course_assign_to_student_with_batches')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'mid_term_marks'=>$request['mid_term_marks'],
      ]);
    }

    if($request['mid_term_marks_attend_status']==1){

      DB::table('repeat_retake_course_assign_to_student_with_batches')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'mid_term_marks'=>$mid_term_marks,
      ]);
    }

    $final_marks=NULL;

    if($request['final_marks_attend_status']==0){

      $final_marks=$request['final_marks'];

      DB::table('repeat_retake_course_assign_to_student_with_batches')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'final_marks'=>$request['final_marks'],
      ]);
    }

    if($request['final_marks_attend_status']==1){

      DB::table('repeat_retake_course_assign_to_student_with_batches')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'final_marks'=>$final_marks,
      ]);
    }

    $total_marks=$attendance_marks+$assignment_and_presentation_marks+$quiz_marks+$mid_term_marks+$final_marks;

    $update=DB::table('repeat_retake_course_assign_to_student_with_batches')->where('id','=',$request['student_course_mark_sheet_id'])->update([
      'attendance_marks_attend_status'=>$request['attendance_marks_attend_status'],
      'assignment_and_presentation_marks_attend_status'=>$request['assignment_and_presentation_marks_attend_status'],
      'quiz_marks_attend_status'=>$request['quiz_marks_attend_status'],
      'mid_term_marks_attend_status'=>$request['mid_term_marks_attend_status'],
      'final_marks_attend_status'=>$request['final_marks_attend_status'],
      'total_marks'=>$total_marks,
    ]);


  }

//  if(empty($update) || !empty($update)){
/*  $course_edition=$request['edition_no'];
    $faculty_department=$request['faculty_department'];

    $enc_faculty_department = Crypt::encryptString($faculty_department);
    $enc_course_edition = Crypt::encryptString($course_edition);
  */
    $enc_batch_course_list_id = Crypt::encryptString($request['batch_course_list_id']);
    $enc_batch_id = Crypt::encryptString($request['batch_id']);
    $enc_trimester_id = Crypt::encryptString($request['trimester_id']);

    Session::flash('success');
    return redirect('faculty/view_regular_assigned_course_marks_sheet/'.$enc_batch_course_list_id.'/'.$enc_batch_id.'/'.$enc_trimester_id);

//  }

}

public function faculty_final_submit_regular_assigned_course_marks_sheet($enc_batch_course_list_id,$enc_batch_id,$enc_trimester_id){

  $batch_course_list_id = Crypt::decryptString($enc_batch_course_list_id);
  $batch_id = Crypt::decryptString($enc_batch_id);
  $trimester_id = Crypt::decryptString($enc_trimester_id);

  $faculty_final_submit_status=DB::table('regular_course_assign_to_faculties')->where('batch_course_list_id','=',$batch_course_list_id)->where('batch_id','=',$batch_id)->where('trimester_id','=',$trimester_id)->value('faculty_final_submit_status');

  $assigned_regular_course_student_mark_sheet=DB::table('regular_course_assign_to_students')->where('batch_course_list_id','=',$batch_course_list_id)->where('batch_id','=',$batch_id)->where('trimester_id','=',$trimester_id)->get();

  $assigned_repeat_retake_course_with_batch_student_mark_sheet=DB::table('repeat_retake_course_assign_to_student_with_batches')->where('batch_course_list_id','=',$batch_course_list_id)->where('batch_id','=',$batch_id)->where('trimester_id','=',$trimester_id)->get();

// check mark sheet null or not
  foreach ($assigned_regular_course_student_mark_sheet as $regular_list) {
    if(($regular_list->attendance_marks_attend_status===0 && $regular_list->attendance_marks=== NULL) || ($regular_list->assignment_and_presentation_marks_attend_status=== 0 && $regular_list->assignment_and_presentation_marks=== NULL) || ($regular_list->quiz_marks_attend_status=== 0 && $regular_list->quiz_marks=== NULL) || ($regular_list->mid_term_marks_attend_status=== 0 && $regular_list->mid_term_marks=== NULL)
        || ($regular_list->final_marks_attend_status=== 0 && $regular_list->final_marks=== NULL)){
      Session::flash('null_marks');
      //return view('faculty.view_regular_assign_course_marks_sheet',compact('assigned_regular_course_student_mark_sheet','assigned_repeat_retake_course_with_batch_student_mark_sheet','faculty_final_submit_status','trimester_id','enc_batch_course_list_id','enc_batch_id','enc_trimester_id'));
      return redirect('faculty/view_regular_assigned_course_marks_sheet/'.$enc_batch_course_list_id.'/'.$enc_batch_id.'/'.$enc_trimester_id);
    }
  }


foreach ($assigned_repeat_retake_course_with_batch_student_mark_sheet as $repeat_retake_list) {
  if(($repeat_retake_list->attendance_marks_attend_status===0 && $repeat_retake_list->attendance_marks=== NULL) || ($repeat_retake_list->assignment_and_presentation_marks_attend_status=== 0 && $repeat_retake_list->assignment_and_presentation_marks=== NULL) || ($repeat_retake_list->quiz_marks_attend_status=== 0 && $repeat_retake_list->quiz_marks=== NULL) || ($repeat_retake_list->mid_term_marks_attend_status=== 0 && $repeat_retake_list->mid_term_marks=== NULL)
      || ($repeat_retake_list->final_marks_attend_status=== 0 && $repeat_retake_list->final_marks=== NULL)){
    Session::flash('null_marks');
    //return view('faculty.view_regular_assign_course_marks_sheet',compact('assigned_regular_course_student_mark_sheet','assigned_repeat_retake_course_with_batch_student_mark_sheet','faculty_final_submit_status','trimester_id','enc_batch_course_list_id','enc_batch_id','enc_trimester_id'));
    return redirect('faculty/view_regular_assigned_course_marks_sheet/'.$enc_batch_course_list_id.'/'.$enc_batch_id.'/'.$enc_trimester_id);
  }
}

// submit
  DB::table('regular_course_assign_to_faculties')->where('batch_course_list_id','=',$batch_course_list_id)->where('batch_id','=',$batch_id)->where('trimester_id','=',$trimester_id)->update([
    'faculty_final_submit_status'=>1,
  ]);


  foreach ($assigned_regular_course_student_mark_sheet as $regular_list) {
    DB::table('regular_course_assign_to_students')->where('batch_course_list_id','=',$regular_list->batch_course_list_id)->where('batch_id','=',$regular_list->batch_id)->where('trimester_id','=',$regular_list->trimester_id)->update([
      'faculty_final_submit_status'=>1,
    ]);
  }


  foreach ($assigned_repeat_retake_course_with_batch_student_mark_sheet as $repeat_retake_list) {
    DB::table('repeat_retake_course_assign_to_student_with_batches')->where('batch_course_list_id','=',$repeat_retake_list->batch_course_list_id)->where('batch_id','=',$repeat_retake_list->batch_id)->where('trimester_id','=',$repeat_retake_list->trimester_id)->update([
      'faculty_final_submit_status'=>1,
    ]);
  }
//
  $dept_id=DB::table('faculties')->where('id','=',Auth::user()->id)->value('department_id');
  $selected_trimester_id = Crypt::decryptString($enc_trimester_id);
  $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

  $assigned_courses=DB::table('regular_course_assign_to_faculties')->where('trimester_id','=',$selected_trimester_id)->where('faculty_id','=',Auth::user()->id)->where('faculty_finally_assign_status','=',1)->get();


  Session::flash('mark_sheet_submit');
  //$enc_trimester_id = Crypt::encryptString($request['trimester_id']);

  return redirect('/faculty/view_regular_assign_courses/with_select_trimester/'.$enc_trimester_id);
  //return view('faculty.view_regular_assign_courses_with_select_trimester',compact('dept_id','selected_trimester_id','trimester_list','assigned_courses'));

}


// repeat
public function view_repeat_retake_assign_courses_only_select_trimester(){
  $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

    return view('faculty.view_repeat_retake_assign_courses_only_select_trimester',compact('trimester_list'));
}

public function view_repeat_retake_assign_courses_only_select_trimester_process(Request $request){

  $enc_trimester_id = Crypt::encryptString($request['trimester_id']);

  return redirect('/faculty/view_repeat_retake_assign_courses/with_select_trimester/'.$enc_trimester_id);
}

public function view_repeat_retake_assign_courses_with_select_trimester($enc_trimester_id){
  $dept_id=DB::table('faculties')->where('id','=',Auth::user()->id)->value('department_id');
  $selected_trimester_id = Crypt::decryptString($enc_trimester_id);
  $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

  $assigned_courses=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('trimester_id','=',$selected_trimester_id)->where('faculty_id','=',Auth::user()->id)->where('faculty_finally_assign_status','=',1)->where('faculty_final_submit_status','=',0)->get();


  return view('faculty.view_repeat_retake_assign_courses_with_select_trimester',compact('dept_id','selected_trimester_id','trimester_list','assigned_courses'));
}

public function faculty_see_repeat_retake_assigned_course_marks_sheet($enc_faculty_assign_id){

  $faculty_assign_id = Crypt::decryptString($enc_faculty_assign_id);

  $assigned_repeat_retake_course_without_batch_student_mark_sheet=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$faculty_assign_id)->where('faculty_finally_assign_status','=',1)->where('faculty_final_submit_status','=',0)->first();

  $batch_course_list_id = $assigned_repeat_retake_course_without_batch_student_mark_sheet->batch_course_list_id;
  //$batch_id = $assigned_repeat_retake_course_without_batch_student_mark_sheet->batch_id;
  $trimester_id = $assigned_repeat_retake_course_without_batch_student_mark_sheet->trimester_id;

  $faculty_final_submit_status=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$faculty_assign_id)->value('faculty_final_submit_status');

  //$assigned_repeat_retake_course_without_batch_student_mark_sheet=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('batch_course_list_id','=',$batch_course_list_id)->where('batch_id','=',$batch_id)->where('trimester_id','=',$trimester_id)->where('faculty_final_submit_status','=',0)->get();

  //return view('faculty.see_regular_assign_course_marks_sheet',compact('dept_id','selected_trimester_id','trimester_list','assigned_courses'));
  return view('faculty.view_repeat_retake_assign_course_marks_sheet',compact('assigned_repeat_retake_course_without_batch_student_mark_sheet','faculty_final_submit_status','trimester_id','enc_faculty_assign_id'));
}

public function faculty_view_single_student_repeat_retake_course_mark_sheet($enc_student_course_mark_sheet_id,$enc_faculty_assign_id){


  $student_course_mark_sheet_id = Crypt::decryptString($enc_student_course_mark_sheet_id);

    //$student_course_mark_sheet_id = Crypt::decryptString($enc_student_regular_course_mark_sheet_id);
    $single_student_mark_sheet=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$student_course_mark_sheet_id)->first();

    $faculty_final_submit_status=$single_student_mark_sheet->faculty_final_submit_status;

    return view('faculty.view_single_student_repeat_retake_course_mark_sheet',compact('single_student_mark_sheet','faculty_final_submit_status','enc_faculty_assign_id'));
}


public function faculty_update_single_student_repeat_retake_course_mark_sheet(Request $request){

  $this->validate($request,[
    'attendance_marks' => 'nullable|numeric|max:10|min:0',
    'assignment_and_presentation_marks' => 'nullable|numeric|max:10|min:0',
    'quiz_marks' => 'nullable|numeric|max:10|min:0',
    'mid_term_marks' => 'nullable|numeric|max:30|min:0',
    'final_marks' => 'nullable|numeric|max:40|min:0',
  ],[

  ]);

    $attendance_marks=NULL;

    if($request['attendance_marks_attend_status']==0){

      $attendance_marks=$request['attendance_marks'];

      DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'attendance_marks'=>$request['attendance_marks'],
      ]);
    }

    if($request['attendance_marks_attend_status']==1){

      DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'attendance_marks'=>$attendance_marks,
      ]);
    }

    $assignment_and_presentation_marks=NULL;

    if($request['assignment_and_presentation_marks_attend_status']==0){

      $assignment_and_presentation_marks=$request['assignment_and_presentation_marks'];

      DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'assignment_and_presentation_marks'=>$request['assignment_and_presentation_marks'],
      ]);
    }

    if($request['assignment_and_presentation_marks_attend_status']==1){

      DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'assignment_and_presentation_marks'=>$assignment_and_presentation_marks,
      ]);
    }

    $quiz_marks=NULL;

    if($request['quiz_marks_attend_status']==0){

      $quiz_marks=$request['quiz_marks'];

      DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'quiz_marks'=>$request['quiz_marks'],
      ]);
    }

    if($request['quiz_marks_attend_status']==1){

      DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'quiz_marks'=>$quiz_marks,
      ]);
    }


    $mid_term_marks=NULL;

    if($request['mid_term_marks_attend_status']==0){

      $mid_term_marks=$request['mid_term_marks'];

      DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'mid_term_marks'=>$request['mid_term_marks'],
      ]);
    }


    if($request['mid_term_marks_attend_status']==1){

      DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'mid_term_marks'=>$mid_term_marks,
      ]);
    }

    $final_marks=NULL;

    if($request['final_marks_attend_status']==0){

      $final_marks=$request['final_marks'];

      DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'final_marks'=>$request['final_marks'],
      ]);
    }

    if($request['final_marks_attend_status']==0){

      DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'final_marks'=>$final_marks,
      ]);
    }

      $total_marks=$attendance_marks+$assignment_and_presentation_marks+$quiz_marks+$mid_term_marks+$final_marks;


    $update=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$request['student_course_mark_sheet_id'])->update([
      'attendance_marks_attend_status'=>$request['attendance_marks_attend_status'],
      'assignment_and_presentation_marks_attend_status'=>$request['assignment_and_presentation_marks_attend_status'],
      'quiz_marks_attend_status'=>$request['quiz_marks_attend_status'],
      'mid_term_marks_attend_status'=>$request['mid_term_marks_attend_status'],
      'final_marks_attend_status'=>$request['final_marks_attend_status'],
      'total_marks'=>$total_marks,
    ]);


//  if(empty($update) || !empty($update)){
/*  $course_edition=$request['edition_no'];
    $faculty_department=$request['faculty_department'];

    $enc_faculty_department = Crypt::encryptString($faculty_department);
    $enc_course_edition = Crypt::encryptString($course_edition);
  */
    $enc_faculty_assign_id = $request['enc_faculty_assign_id'];

    Session::flash('success');
    return redirect('faculty/view_repeat_retake_assigned_course_marks_sheet/'.$enc_faculty_assign_id);

//  }

}


public function faculty_final_submit_repeat_retake_assigned_course_marks_sheet($enc_faculty_assign_id){

  $faculty_assign_id = Crypt::decryptString($enc_faculty_assign_id);

  $assigned_repeat_retake_course_without_batch_student_mark_sheet=$assigned_courses=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$faculty_assign_id)->where('faculty_finally_assign_status','=',1)->where('faculty_final_submit_status','=',0)->first();

  $batch_course_list_id = $assigned_repeat_retake_course_without_batch_student_mark_sheet->batch_course_list_id;
    //$batch_id = $assigned_repeat_retake_course_without_batch_student_mark_sheet->batch_id;
  $trimester_id = $assigned_repeat_retake_course_without_batch_student_mark_sheet->trimester_id;

  $faculty_final_submit_status=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$faculty_assign_id)->value('faculty_final_submit_status');

// check mark sheet null or not
    if(($assigned_repeat_retake_course_without_batch_student_mark_sheet->attendance_marks_attend_status===0 && $assigned_repeat_retake_course_without_batch_student_mark_sheet->attendance_marks=== NULL) || ($assigned_repeat_retake_course_without_batch_student_mark_sheet->assignment_and_presentation_marks_attend_status=== 0 && $assigned_repeat_retake_course_without_batch_student_mark_sheet->assignment_and_presentation_marks=== NULL) || ($assigned_repeat_retake_course_without_batch_student_mark_sheet->quiz_marks_attend_status=== 0 && $assigned_repeat_retake_course_without_batch_student_mark_sheet->quiz_marks=== NULL) || ($assigned_repeat_retake_course_without_batch_student_mark_sheet->mid_term_marks_attend_status=== 0 && $assigned_repeat_retake_course_without_batch_student_mark_sheet->mid_term_marks=== NULL)
        || ($assigned_repeat_retake_course_without_batch_student_mark_sheet->final_marks_attend_status=== 0 && $assigned_repeat_retake_course_without_batch_student_mark_sheet->final_marks=== NULL)){
      Session::flash('null_marks');
      return view('faculty.view_repeat_retake_assign_course_marks_sheet',compact('assigned_repeat_retake_course_without_batch_student_mark_sheet','faculty_final_submit_status','trimester_id','enc_faculty_assign_id'));
    }

// submit
  DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$faculty_assign_id)->update([
    'faculty_final_submit_status'=>1,
  ]);

//


Session::flash('mark_sheet_submit');

$enc_trimester_id = Crypt::encryptString($trimester_id);

return redirect('/faculty/view_repeat_retake_assign_courses/with_select_trimester/'.$enc_trimester_id);

}


// supplementary

public function view_supplementary_assign_courses_only_select_trimester(){
  $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

    return view('faculty.view_supplementary_assign_courses_only_select_trimester',compact('trimester_list'));
}

public function view_supplementary_assign_courses_only_select_trimester_process(Request $request){

  $enc_trimester_id = Crypt::encryptString($request['trimester_id']);

  return redirect('/faculty/view_supplementary_assign_courses/with_select_trimester/'.$enc_trimester_id);
}

public function view_supplementary_assign_courses_with_select_trimester($enc_trimester_id){
  $dept_id=DB::table('faculties')->where('id','=',Auth::user()->id)->value('department_id');
  $selected_trimester_id = Crypt::decryptString($enc_trimester_id);
  $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

  $assigned_courses=DB::table('assign_supplementary_exams')->where('trimester_id','=',$selected_trimester_id)->where('faculty_id','=',Auth::user()->id)->where('faculty_finally_assign_status','=',1)->where('faculty_final_submit_status','=',0)->get();


  return view('faculty.view_supplementary_assign_courses_with_select_trimester',compact('dept_id','selected_trimester_id','trimester_list','assigned_courses'));
}

public function faculty_see_supplementary_assigned_course_marks_sheet($enc_faculty_assign_id){

  $faculty_assign_id = Crypt::decryptString($enc_faculty_assign_id);

  $assigned_supplementsry_exam_student_mark_sheet=DB::table('assign_supplementary_exams')->where('id','=',$faculty_assign_id)->where('faculty_finally_assign_status','=',1)->where('faculty_final_submit_status','=',0)->first();

  $batch_course_list_id = $assigned_supplementsry_exam_student_mark_sheet->batch_course_list_id;
  //$batch_id = $assigned_repeat_retake_course_without_batch_student_mark_sheet->batch_id;
  $trimester_id = $assigned_supplementsry_exam_student_mark_sheet->trimester_id;

  $faculty_final_submit_status=DB::table('assign_supplementary_exams')->where('id','=',$faculty_assign_id)->value('faculty_final_submit_status');

  //$assigned_repeat_retake_course_without_batch_student_mark_sheet=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('batch_course_list_id','=',$batch_course_list_id)->where('batch_id','=',$batch_id)->where('trimester_id','=',$trimester_id)->where('faculty_final_submit_status','=',0)->get();

  //return view('faculty.see_regular_assign_course_marks_sheet',compact('dept_id','selected_trimester_id','trimester_list','assigned_courses'));
  return view('faculty.view_supplementary_assign_course_marks_sheet',compact('assigned_supplementsry_exam_student_mark_sheet','faculty_final_submit_status','trimester_id','enc_faculty_assign_id'));
}


public function faculty_view_single_student_supplementary_course_mark_sheet($enc_student_course_mark_sheet_id,$enc_faculty_assign_id){


  $student_course_mark_sheet_id = Crypt::decryptString($enc_student_course_mark_sheet_id);

    //$student_course_mark_sheet_id = Crypt::decryptString($enc_student_regular_course_mark_sheet_id);
    $single_student_mark_sheet=DB::table('assign_supplementary_exams')->where('id','=',$student_course_mark_sheet_id)->first();

    $faculty_final_submit_status=$single_student_mark_sheet->faculty_final_submit_status;

    return view('faculty.view_single_student_supplementary_course_mark_sheet',compact('single_student_mark_sheet','faculty_final_submit_status','enc_faculty_assign_id'));
}

public function faculty_update_single_student_supplementary_course_mark_sheet(Request $request){

  $this->validate($request,[
    'seventy_percentage_marks' => 'nullable|numeric|max:70|min:0',

  ],[

  ]);


    $seventy_percentage_marks=NULL;

    if($request['seventy_percentage_marks_attend_status']==0){

      $seventy_percentage_marks=$request['seventy_percentage_marks'];

      DB::table('assign_supplementary_exams')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'seventy_percentage_marks'=>$request['seventy_percentage_marks'],
      ]);
    }

    if($request['seventy_percentage_marks_attend_status']==1){

      DB::table('assign_supplementary_exams')->where('id','=',$request['student_course_mark_sheet_id'])->update([
        'seventy_percentage_marks'=>$seventy_percentage_marks,
      ]);
    }



    $update=DB::table('assign_supplementary_exams')->where('id','=',$request['student_course_mark_sheet_id'])->update([
      'seventy_percentage_marks_attend_status'=>$request['seventy_percentage_marks_attend_status'],
    ]);


//  if(empty($update) || !empty($update)){
/*  $course_edition=$request['edition_no'];
    $faculty_department=$request['faculty_department'];

    $enc_faculty_department = Crypt::encryptString($faculty_department);
    $enc_course_edition = Crypt::encryptString($course_edition);
  */
    $enc_faculty_assign_id = $request['enc_faculty_assign_id'];

    Session::flash('success');
    return redirect('faculty/view_supplementary_assigned_course_marks_sheet/'.$enc_faculty_assign_id);

//  }

}

public function faculty_final_submit_supplementary_assigned_course_marks_sheet($enc_faculty_assign_id){

  $faculty_assign_id = Crypt::decryptString($enc_faculty_assign_id);

  $assigned_supplementsry_exam_student_mark_sheet=DB::table('assign_supplementary_exams')->where('id','=',$faculty_assign_id)->where('faculty_finally_assign_status','=',1)->where('faculty_final_submit_status','=',0)->first();

  $batch_course_list_id = $assigned_supplementsry_exam_student_mark_sheet->batch_course_list_id;
    //$batch_id = $assigned_repeat_retake_course_without_batch_student_mark_sheet->batch_id;
  $trimester_id = $assigned_supplementsry_exam_student_mark_sheet->trimester_id;

  $faculty_final_submit_status=DB::table('assign_supplementary_exams')->where('id','=',$faculty_assign_id)->value('faculty_final_submit_status');

// check mark sheet null or not
    if($assigned_supplementsry_exam_student_mark_sheet->seventy_percentage_marks_attend_status===0 && $assigned_supplementsry_exam_student_mark_sheet->seventy_percentage_marks=== NULL){
      Session::flash('null_marks');
      return view('faculty.view_supplementary_assign_course_marks_sheet',compact('assigned_supplementsry_exam_student_mark_sheet','faculty_final_submit_status','trimester_id','enc_faculty_assign_id'));
    }

// submit
  DB::table('assign_supplementary_exams')->where('id','=',$faculty_assign_id)->update([
    'faculty_final_submit_status'=>1,
  ]);

//


Session::flash('mark_sheet_submit');

$enc_trimester_id = Crypt::encryptString($trimester_id);

return redirect('/faculty/view_supplementary_assign_courses/with_select_trimester/'.$enc_trimester_id);

}

public function mark_updated_by_exam_controller_information(){

  $faculty_id=Auth::user()->id;

  $mark_updated_by_exam_controller_information=DB::table('student_mark_update_information_for_faculties')->where('faculty_id','=',$faculty_id)->orderBy('id','desc')->get();

  return view('faculty.mark_updated_by_exam_controller_information',compact('mark_updated_by_exam_controller_information'));

}

}
