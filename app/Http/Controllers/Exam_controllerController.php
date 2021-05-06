<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use Illuminate\Support\Facades\Crypt;


class Exam_controllerController extends Controller
{
  public function __construct(){
       $this->middleware('auth');
       $this->middleware('exam_controller');
  }

  public function view_regular_assign_courses_only_select_trimester(){
    $trimester_list=DB::table('trimesters')->get();

      return view('exam_controller.view_regular_assign_courses_only_select_trimester',compact('trimester_list'));
  }


  //
  public function view_regular_assign_courses_only_select_trimester_process(Request $request){

    $enc_trimester_id = Crypt::encryptString($request['trimester_id']);

    return redirect('/exam_controller/view_regular_assign_courses/with_select_trimester/'.$enc_trimester_id);
  }
  //

  public function view_regular_assign_courses_with_select_trimester($enc_trimester_id){
    $department_list=DB::table('departments')->get();
    $selected_trimester_id = Crypt::decryptString($enc_trimester_id);
    $trimester_list=DB::table('trimesters')->get();

    $assigned_courses=DB::table('regular_course_assign_to_students')->select('trimester_id','batch_id','department_id')->where('trimester_id','=',$selected_trimester_id)->where('faculty_final_submit_status','=',1)->distinct()->get();


    return view('exam_controller.view_regular_assign_courses_with_select_trimester',compact('department_list','selected_trimester_id','trimester_list','assigned_courses'));
  }
//
  public function exam_controller_see_regular_assigned_course_marks_sheet($enc_batch_id,$enc_trimester_id){

    $batch_id = Crypt::decryptString($enc_batch_id);
    $trimester_id = Crypt::decryptString($enc_trimester_id);


    $assigned_courses=DB::table('regular_course_assign_to_students')->select('batch_course_list_id')->where('trimester_id','=',$trimester_id)->where('batch_id','=',$batch_id)->where('faculty_final_submit_status','=',1)->distinct()->get();
    $repeat_assigned_courses=DB::table('repeat_retake_course_assign_to_student_with_batches')->select('batch_course_list_id')->where('trimester_id','=',$trimester_id)->where('batch_id','=',$batch_id)->where('faculty_final_submit_status','=',1)->distinct()->get();

    $assigned_regular_student=DB::table('regular_course_assign_to_students')->select('student_id')->where('trimester_id','=',$trimester_id)->where('batch_id','=',$batch_id)->where('faculty_final_submit_status','=',1)->distinct()->get();

    $assigned_repeat_retake_with_batch_student=DB::table('repeat_retake_course_assign_to_student_with_batches')->select('student_id')->where('trimester_id','=',$trimester_id)->where('batch_id','=',$batch_id)->where('faculty_final_submit_status','=',1)->distinct()->get();

    $assigned_regular_course_student_mark_sheet=DB::table('regular_course_assign_to_students')->where('batch_id','=',$batch_id)->where('trimester_id','=',$trimester_id)->where('faculty_final_submit_status','=',1)->get();

    $assigned_repeat_retake_course_with_batch_student_mark_sheet=DB::table('repeat_retake_course_assign_to_student_with_batches')->where('batch_id','=',$batch_id)->where('trimester_id','=',$trimester_id)->where('faculty_final_submit_status','=',1)->get();

    //return view('faculty.see_regular_assign_course_marks_sheet',compact('dept_id','selected_trimester_id','trimester_list','assigned_courses'));
    return view('exam_controller.view_regular_assign_course_marks_sheet',compact('assigned_regular_course_student_mark_sheet','assigned_repeat_retake_course_with_batch_student_mark_sheet','trimester_id','enc_batch_id','enc_trimester_id','assigned_courses','assigned_regular_student','assigned_repeat_retake_with_batch_student','repeat_assigned_courses','batch_id'));

  }
//
  public function exam_controller_view_single_student_regular_course_mark_sheet($enc_student_course_mark_sheet_id,$course_type){

    $student_course_mark_sheet_id = Crypt::decryptString($enc_student_course_mark_sheet_id);

    if($course_type==1){
      //$student_course_mark_sheet_id = Crypt::decryptString($enc_student_regular_course_mark_sheet_id);
      $single_student_mark_sheet=DB::table('regular_course_assign_to_students')->where('id','=',$student_course_mark_sheet_id)->first();

      $faculty_final_submit_status=$single_student_mark_sheet->faculty_final_submit_status;


      return view('exam_controller.view_single_student_regular_course_mark_sheet',compact('single_student_mark_sheet','course_type','faculty_final_submit_status'));

    }
    elseif($course_type==2){
      $single_student_mark_sheet=DB::table('repeat_retake_course_assign_to_student_with_batches')->where('id','=',$student_course_mark_sheet_id)->first();

      $faculty_final_submit_status=$single_student_mark_sheet->faculty_final_submit_status;

      return view('exam_controller.view_single_student_regular_course_mark_sheet',compact('single_student_mark_sheet','course_type','faculty_final_submit_status'));
    }

  }
//
  public function exam_controller_update_single_student_regular_course_mark_sheet(Request $request){

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

//send mark update information to faculty

    if($request['old_attendance_marks']!=$attendance_marks || $request['old_assignment_and_presentation_marks']!=$assignment_and_presentation_marks || $request['old_quiz_marks']!=$quiz_marks || $request['old_mid_term_marks']!=$mid_term_marks || $request['old_final_marks']!=$final_marks){
        $faculty_id=DB::table('regular_course_assign_to_faculties')->where('batch_course_list_id','=',$request['batch_course_list_id'])->where('batch_id','=',$request['batch_id'])->where('trimester_id','=',$request['trimester_id'])->value('faculty_id');

        DB::table('student_mark_update_information_for_faculties')->insert([
          'faculty_id'=>$faculty_id,
          'student_id'=>$request['student_id'],
          'batch_course_list_id'=>$request['batch_course_list_id'],
          'course_type'=>'Regular course',
          'created_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
        ]);
    }

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


      //send mark update information to faculty

          if($request['old_attendance_marks']!=$attendance_marks || $request['old_assignment_and_presentation_marks']!=$assignment_and_presentation_marks || $request['old_quiz_marks']!=$quiz_marks || $request['old_mid_term_marks']!=$mid_term_marks || $request['old_final_marks']!=$final_marks){
              $faculty_id=DB::table('regular_course_assign_to_faculties')->where('batch_course_list_id','=',$request['batch_course_list_id'])->where('batch_id','=',$request['batch_id'])->where('trimester_id','=',$request['trimester_id'])->value('faculty_id');

              DB::table('student_mark_update_information_for_faculties')->insert([
                'faculty_id'=>$faculty_id,
                'student_id'=>$request['student_id'],
                'batch_course_list_id'=>$request['batch_course_list_id'],
                'course_type'=>'Repeat\Retake with batch course',
                'created_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
              ]);
          }


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
      return redirect('exam_controller/view_regular_assigned_course_marks_sheet/'.$enc_batch_id.'/'.$enc_trimester_id);

  //  }

  }


// Repeat

  public function view_repeat_retake_assign_courses_only_select_trimester(){
    $trimester_list=DB::table('trimesters')->get();

      return view('exam_controller.view_repeat_retake_assign_courses_only_select_trimester',compact('trimester_list'));
  }


  //
  public function view_repeat_retake_assign_courses_only_select_trimester_process(Request $request){

    $enc_trimester_id = Crypt::encryptString($request['trimester_id']);

    return redirect('/exam_controller/view_repeat_retake_assign_courses/with_select_trimester/'.$enc_trimester_id);
  }
  //

  public function view_repeat_retake_assign_courses_with_select_trimester($enc_trimester_id){
    $department_list=DB::table('departments')->get();
    $selected_trimester_id = Crypt::decryptString($enc_trimester_id);
    $trimester_list=DB::table('trimesters')->get();

    $assigned_courses=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('trimester_id','=',$selected_trimester_id)->where('faculty_final_submit_status','=',1)->distinct()->get();


    return view('exam_controller.view_repeat_retake_assign_courses_with_select_trimester',compact('department_list','selected_trimester_id','trimester_list','assigned_courses'));
  }
  //
  public function exam_controller_see_repeat_retake_assigned_course_marks_sheet($enc_faculty_assign_id){

    $faculty_assign_id = Crypt::decryptString($enc_faculty_assign_id);

    $assigned_repeat_retake_course_without_batch_student_mark_sheet=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$faculty_assign_id)->where('faculty_final_submit_status','=',1)->first();

    $batch_course_list_id = $assigned_repeat_retake_course_without_batch_student_mark_sheet->batch_course_list_id;
    //$batch_id = $assigned_repeat_retake_course_without_batch_student_mark_sheet->batch_id;
    $trimester_id = $assigned_repeat_retake_course_without_batch_student_mark_sheet->trimester_id;

    $faculty_final_submit_status=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$faculty_assign_id)->value('faculty_final_submit_status');

    //$assigned_repeat_retake_course_without_batch_student_mark_sheet=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('batch_course_list_id','=',$batch_course_list_id)->where('batch_id','=',$batch_id)->where('trimester_id','=',$trimester_id)->where('faculty_final_submit_status','=',0)->get();

    //return view('faculty.see_regular_assign_course_marks_sheet',compact('dept_id','selected_trimester_id','trimester_list','assigned_courses'));
    return view('exam_controller.view_repeat_retake_assign_course_marks_sheet',compact('assigned_repeat_retake_course_without_batch_student_mark_sheet','faculty_final_submit_status','trimester_id','enc_faculty_assign_id'));
  }
  //


  public function exam_controller_view_single_student_repeat_retake_course_mark_sheet($enc_student_course_mark_sheet_id,$enc_faculty_assign_id){


    $student_course_mark_sheet_id = Crypt::decryptString($enc_student_course_mark_sheet_id);

      //$student_course_mark_sheet_id = Crypt::decryptString($enc_student_regular_course_mark_sheet_id);
      $single_student_mark_sheet=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$student_course_mark_sheet_id)->first();

      $faculty_final_submit_status=$single_student_mark_sheet->faculty_final_submit_status;

      return view('exam_controller.view_single_student_repeat_retake_course_mark_sheet',compact('single_student_mark_sheet','faculty_final_submit_status','enc_faculty_assign_id'));
  }


  public function exam_controller_update_single_student_repeat_retake_course_mark_sheet(Request $request){

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


      //send mark update information to faculty

      if($request['old_attendance_marks']!=$attendance_marks || $request['old_assignment_and_presentation_marks']!=$assignment_and_presentation_marks || $request['old_quiz_marks']!=$quiz_marks || $request['old_mid_term_marks']!=$mid_term_marks || $request['old_final_marks']!=$final_marks){
          $faculty_id=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('batch_course_list_id','=',$request['batch_course_list_id'])->where('student_id','=',$request['student_id'])->where('trimester_id','=',$request['trimester_id'])->value('faculty_id');

          DB::table('student_mark_update_information_for_faculties')->insert([
            'faculty_id'=>$faculty_id,
            'student_id'=>$request['student_id'],
            'batch_course_list_id'=>$request['batch_course_list_id'],
            'course_type'=>'Repeat\Retake without batch course',
            'created_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
          ]);
      }


  //  if(empty($update) || !empty($update)){
  /*  $course_edition=$request['edition_no'];
      $faculty_department=$request['faculty_department'];

      $enc_faculty_department = Crypt::encryptString($faculty_department);
      $enc_course_edition = Crypt::encryptString($course_edition);
    */
      $enc_faculty_assign_id = $request['enc_faculty_assign_id'];

      Session::flash('success');
      return redirect('exam_controller/view_repeat_retake_assigned_course_marks_sheet/'.$enc_faculty_assign_id);

  //  }

  }

// Supplementary


public function view_supplementary_assign_courses_only_select_trimester(){
  $trimester_list=DB::table('trimesters')->get();

    return view('exam_controller.view_supplementary_assign_courses_only_select_trimester',compact('trimester_list'));
}

public function view_supplementary_assign_courses_only_select_trimester_process(Request $request){

  $enc_trimester_id = Crypt::encryptString($request['trimester_id']);

  return redirect('/exam_controller/view_supplementary_assign_courses/with_select_trimester/'.$enc_trimester_id);
}

public function view_supplementary_assign_courses_with_select_trimester($enc_trimester_id){

  $department_list=DB::table('departments')->get();
  $selected_trimester_id = Crypt::decryptString($enc_trimester_id);
  $trimester_list=DB::table('trimesters')->get();

  $assigned_courses=DB::table('assign_supplementary_exams')->where('trimester_id','=',$selected_trimester_id)->where('faculty_final_submit_status','=',1)->distinct()->get();

  return view('exam_controller.view_supplementary_assign_courses_with_select_trimester',compact('selected_trimester_id','trimester_list','assigned_courses','department_list'));

}

public function exam_controller_see_supplementary_assigned_course_marks_sheet($enc_faculty_assign_id){

  $faculty_assign_id = Crypt::decryptString($enc_faculty_assign_id);

  $assigned_supplementsry_exam_student_mark_sheet=DB::table('assign_supplementary_exams')->where('id','=',$faculty_assign_id)->where('faculty_finally_assign_status','=',1)->where('faculty_final_submit_status','=',1)->first();

  $batch_course_list_id = $assigned_supplementsry_exam_student_mark_sheet->batch_course_list_id;
  //$batch_id = $assigned_repeat_retake_course_without_batch_student_mark_sheet->batch_id;
  $trimester_id = $assigned_supplementsry_exam_student_mark_sheet->trimester_id;

  $faculty_final_submit_status=DB::table('assign_supplementary_exams')->where('id','=',$faculty_assign_id)->value('faculty_final_submit_status');

  //$assigned_repeat_retake_course_without_batch_student_mark_sheet=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('batch_course_list_id','=',$batch_course_list_id)->where('batch_id','=',$batch_id)->where('trimester_id','=',$trimester_id)->where('faculty_final_submit_status','=',0)->get();

  //return view('faculty.see_regular_assign_course_marks_sheet',compact('dept_id','selected_trimester_id','trimester_list','assigned_courses'));
  return view('exam_controller.view_supplementary_assign_course_marks_sheet',compact('assigned_supplementsry_exam_student_mark_sheet','faculty_final_submit_status','trimester_id','enc_faculty_assign_id'));
}


public function exam_controller_view_single_student_supplementary_course_mark_sheet($enc_student_course_mark_sheet_id,$enc_faculty_assign_id){


  $student_course_mark_sheet_id = Crypt::decryptString($enc_student_course_mark_sheet_id);

    //$student_course_mark_sheet_id = Crypt::decryptString($enc_student_regular_course_mark_sheet_id);
    $single_student_mark_sheet=DB::table('assign_supplementary_exams')->where('id','=',$student_course_mark_sheet_id)->first();

    $faculty_final_submit_status=$single_student_mark_sheet->faculty_final_submit_status;

    return view('exam_controller.view_single_student_supplementary_course_mark_sheet',compact('single_student_mark_sheet','faculty_final_submit_status','enc_faculty_assign_id'));
}

public function exam_controller_update_single_student_supplementary_course_mark_sheet(Request $request){

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

    //send mark update information to faculty

    if($request['old_seventy_percentage_marks']!=$seventy_percentage_marks){
        $faculty_id=DB::table('assign_supplementary_exams')->where('batch_course_list_id','=',$request['batch_course_list_id'])->where('student_id','=',$request['student_id'])->where('trimester_id','=',$request['trimester_id'])->value('faculty_id');

        DB::table('student_mark_update_information_for_faculties')->insert([
          'faculty_id'=>$faculty_id,
          'student_id'=>$request['student_id'],
          'batch_course_list_id'=>$request['batch_course_list_id'],
          'course_type'=>'Supplementary exam',
          'created_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
        ]);
    }


//  if(empty($update) || !empty($update)){
/*  $course_edition=$request['edition_no'];
    $faculty_department=$request['faculty_department'];

    $enc_faculty_department = Crypt::encryptString($faculty_department);
    $enc_course_edition = Crypt::encryptString($course_edition);
  */
    $enc_faculty_assign_id = $request['enc_faculty_assign_id'];

    Session::flash('success');
    return redirect('exam_controller/view_supplementary_assigned_course_marks_sheet/'.$enc_faculty_assign_id);

//  }

}


public function view_trimester_for_publish_result(){
  $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

  return view('exam_controller.publish_trimester_result',compact('trimester_list'));

}

public function publish_trimester_result(Request $request){
  $trimester_id=$request['trimester_id'];

  $regular_assigned_course_mark_sheet=DB::table('regular_course_assign_to_students')->where('trimester_id','=',$trimester_id)->get();

  $repeat_retake_course_with_batch_marksheet=DB::table('repeat_retake_course_assign_to_student_with_batches')->where('trimester_id','=',$trimester_id)->get();

  $repeat_retake_course_without_batch_marksheet=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('trimester_id','=',$trimester_id)->get();

  $supplementary_exam_assigned_mark_sheet=DB::table('assign_supplementary_exams')->where('trimester_id','=',$trimester_id)->get();

// check weather faculty sumitted their result or not

  foreach($regular_assigned_course_mark_sheet as $single_mark_sheet){
    if($single_mark_sheet->faculty_final_submit_status==0){
      Session::flash('all_mark_sheet_yet_not_submitted');
      return redirect('exam_controller/view_trimester_for_publish_result');
    }
  }

  foreach($repeat_retake_course_with_batch_marksheet as $single_mark_sheet){
    if($single_mark_sheet->faculty_final_submit_status==0){
      Session::flash('all_mark_sheet_yet_not_submitted');
      return redirect('exam_controller/view_trimester_for_publish_result');
    }
  }

  foreach($repeat_retake_course_without_batch_marksheet as $single_mark_sheet){
    if($single_mark_sheet->faculty_final_submit_status==0){
      Session::flash('all_mark_sheet_yet_not_submitted');
      return redirect('exam_controller/view_trimester_for_publish_result');
    }
  }

  foreach($supplementary_exam_assigned_mark_sheet as $single_mark_sheet){
    if($single_mark_sheet->faculty_final_submit_status==0){
      Session::flash('all_mark_sheet_yet_not_submitted');
      return redirect('exam_controller/view_trimester_for_publish_result');
    }
  }

// repeat retake & supplementary marks replace

// repeat with batch

foreach($repeat_retake_course_with_batch_marksheet as $single_mark_sheet){

  $regular_total_mark=DB::table('regular_course_assign_to_students')->where('student_id','=',$single_mark_sheet->student_id)->where('batch_course_list_id','=',$single_mark_sheet->batch_course_list_id)->value('total_marks');

  $repeat_total_mark=$single_mark_sheet->total_marks;

  $regular_gpa=0;
  $repeat_gpa=0;

// regular gpa

  if($regular_total_mark>=80 && $regular_total_mark<=100){
    $regular_gpa=4.0;
  }
  elseif($regular_total_mark>=75 && $regular_total_mark<=79){
    $regular_gpa=3.75;
  }
  elseif($regular_total_mark>=70 && $regular_total_mark<=74){
    $regular_gpa=3.50;
  }
  elseif($regular_total_mark>=65 && $regular_total_mark<=69){
    $regular_gpa=3.25;
  }
  elseif($regular_total_mark>=60 && $regular_total_mark<=64){
    $regular_gpa=3.00;
  }
  elseif($regular_total_mark>=55 && $regular_total_mark<=59){
    $regular_gpa=2.75;
  }
  elseif($regular_total_mark>=50 && $regular_total_mark<=54){
    $regular_gpa=2.50;
  }
  elseif($regular_total_mark>=45 && $regular_total_mark<=49){
    $regular_gpa=2.25;
  }
  elseif($regular_total_mark>=40 && $regular_total_mark<=44){
    $regular_gpa=2.00;
  }
  elseif($regular_total_mark>=0 && $regular_total_mark<=39){
    $regular_gpa=0.00;
  }

// repeat gpa

if($repeat_total_mark>=80 && $repeat_total_mark<=100){
  $repeat_gpa=4.0;
}
elseif($repeat_total_mark>=75 && $repeat_total_mark<=79){
  $repeat_gpa=3.75;
}
elseif($repeat_total_mark>=70 && $repeat_total_mark<=74){
  $repeat_gpa=3.50;
}
elseif($repeat_total_mark>=65 && $repeat_total_mark<=69){
  $repeat_gpa=3.25;
}
elseif($repeat_total_mark>=60 && $repeat_total_mark<=64){
  $repeat_gpa=3.00;
}
elseif($repeat_total_mark>=55 && $repeat_total_mark<=59){
  $repeat_gpa=2.75;
}
elseif($repeat_total_mark>=50 && $repeat_total_mark<=54){
  $repeat_gpa=2.50;
}
elseif($repeat_total_mark>=45 && $repeat_total_mark<=49){
  $repeat_gpa=2.25;
}
elseif($repeat_total_mark>=40 && $repeat_total_mark<=44){
  $repeat_gpa=2.00;
}
elseif($repeat_total_mark>=0 && $repeat_total_mark<=39){
  $repeat_gpa=0.00;
}


if($repeat_gpa>$regular_gpa){
  DB::table('regular_course_assign_to_students')->where('student_id','=',$single_mark_sheet->student_id)->where('batch_course_list_id','=',$single_mark_sheet->batch_course_list_id)->update([
    'attendance_marks'=>$single_mark_sheet->attendance_marks,
    'attendance_marks_attend_status'=>$single_mark_sheet->attendance_marks_attend_status,
    'assignment_and_presentation_marks'=>$single_mark_sheet->assignment_and_presentation_marks,
    'assignment_and_presentation_marks_attend_status'=>$single_mark_sheet->assignment_and_presentation_marks_attend_status,
    'quiz_marks'=>$single_mark_sheet->quiz_marks,
    'quiz_marks_attend_status'=>$single_mark_sheet->quiz_marks_attend_status,
    'mid_term_marks'=>$single_mark_sheet->mid_term_marks,
    'mid_term_marks_attend_status'=>$single_mark_sheet->mid_term_marks_attend_status,
    'final_marks'=>$single_mark_sheet->final_marks,
    'final_marks_attend_status'=>$single_mark_sheet->final_marks_attend_status,
    'total_marks'=>$single_mark_sheet->total_marks,
  ]);
}

}

// repeat without batch

foreach($repeat_retake_course_without_batch_marksheet as $single_mark_sheet){

  $regular_total_mark=DB::table('regular_course_assign_to_students')->where('student_id','=',$single_mark_sheet->student_id)->where('batch_course_list_id','=',$single_mark_sheet->batch_course_list_id)->value('total_marks');

  $repeat_total_mark=$single_mark_sheet->total_marks;

  $regular_gpa=0;
  $repeat_gpa=0;

// regular gpa

  if($regular_total_mark>=80 && $regular_total_mark<=100){
    $regular_gpa=4.0;
  }
  elseif($regular_total_mark>=75 && $regular_total_mark<=79){
    $regular_gpa=3.75;
  }
  elseif($regular_total_mark>=70 && $regular_total_mark<=74){
    $regular_gpa=3.50;
  }
  elseif($regular_total_mark>=65 && $regular_total_mark<=69){
    $regular_gpa=3.25;
  }
  elseif($regular_total_mark>=60 && $regular_total_mark<=64){
    $regular_gpa=3.00;
  }
  elseif($regular_total_mark>=55 && $regular_total_mark<=59){
    $regular_gpa=2.75;
  }
  elseif($regular_total_mark>=50 && $regular_total_mark<=54){
    $regular_gpa=2.50;
  }
  elseif($regular_total_mark>=45 && $regular_total_mark<=49){
    $regular_gpa=2.25;
  }
  elseif($regular_total_mark>=40 && $regular_total_mark<=44){
    $regular_gpa=2.00;
  }
  elseif($regular_total_mark>=0 && $regular_total_mark<=39){
    $regular_gpa=0.00;
  }


// repeat gpa

if($repeat_total_mark>=80 && $repeat_total_mark<=100){
  $repeat_gpa=4.0;
}
elseif($repeat_total_mark>=75 && $repeat_total_mark<=79){
  $repeat_gpa=3.75;
}
elseif($repeat_total_mark>=70 && $repeat_total_mark<=74){
  $repeat_gpa=3.50;
}
elseif($repeat_total_mark>=65 && $repeat_total_mark<=69){
  $repeat_gpa=3.25;
}
elseif($repeat_total_mark>=60 && $repeat_total_mark<=64){
  $repeat_gpa=3.00;
}
elseif($repeat_total_mark>=55 && $repeat_total_mark<=59){
  $repeat_gpa=2.75;
}
elseif($repeat_total_mark>=50 && $repeat_total_mark<=54){
  $repeat_gpa=2.50;
}
elseif($repeat_total_mark>=45 && $repeat_total_mark<=49){
  $repeat_gpa=2.25;
}
elseif($repeat_total_mark>=40 && $repeat_total_mark<=44){
  $repeat_gpa=2.00;
}
elseif($repeat_total_mark>=0 && $repeat_total_mark<=39){
  $repeat_gpa=0.00;
}


if($repeat_gpa>$regular_gpa){
  DB::table('regular_course_assign_to_students')->where('student_id','=',$single_mark_sheet->student_id)->where('batch_course_list_id','=',$single_mark_sheet->batch_course_list_id)->update([
    'attendance_marks'=>$single_mark_sheet->attendance_marks,
    'attendance_marks_attend_status'=>$single_mark_sheet->attendance_marks_attend_status,
    'assignment_and_presentation_marks'=>$single_mark_sheet->assignment_and_presentation_marks,
    'assignment_and_presentation_marks_attend_status'=>$single_mark_sheet->assignment_and_presentation_marks_attend_status,
    'quiz_marks'=>$single_mark_sheet->quiz_marks,
    'quiz_marks_attend_status'=>$single_mark_sheet->quiz_marks_attend_status,
    'mid_term_marks'=>$single_mark_sheet->mid_term_marks,
    'mid_term_marks_attend_status'=>$single_mark_sheet->mid_term_marks_attend_status,
    'final_marks'=>$single_mark_sheet->final_marks,
    'final_marks_attend_status'=>$single_mark_sheet->final_marks_attend_status,
    'total_marks'=>$single_mark_sheet->total_marks,
  ]);
}

}

// supplementary

foreach($supplementary_exam_assigned_mark_sheet as $single_mark_sheet){

  $regular_total_mark=DB::table('regular_course_assign_to_students')->where('student_id','=',$single_mark_sheet->student_id)->where('batch_course_list_id','=',$single_mark_sheet->batch_course_list_id)->value('total_marks');

  $supplementary_total_mark=$single_mark_sheet->seventy_percentage_marks;

if($supplementary_total_mark>$regular_total_mark){


$supplementary_seventy_percentage_mark=$single_mark_sheet->seventy_percentage_marks;
$supplementary_forty_percentage_mark=($supplementary_seventy_percentage_mark*40)/100;
$supplementary_thirty_percentage_mark=($supplementary_seventy_percentage_mark*30)/100;

  DB::table('regular_course_assign_to_students')->where('student_id','=',$single_mark_sheet->student_id)->where('batch_course_list_id','=',$single_mark_sheet->batch_course_list_id)->update([

    'mid_term_marks'=>$supplementary_thirty_percentage_mark,
    'mid_term_marks_attend_status'=>1,
    'final_marks'=>$supplementary_forty_percentage_mark,
    'final_marks_attend_status'=>1,
    'total_marks'=>$supplementary_seventy_percentage_mark,
  ]);
}

}

// publish trimester result

foreach($regular_assigned_course_mark_sheet as $single_mark_sheet){
  DB::table('regular_course_assign_to_students')->where('id','=',$single_mark_sheet->id)->update([
    'result_publish_status'=>1,
  ]);
}

foreach($repeat_retake_course_with_batch_marksheet as $single_mark_sheet){
  DB::table('repeat_retake_course_assign_to_student_with_batches')->where('id','=',$single_mark_sheet->id)->update([
    'result_publish_status'=>1,
  ]);
}

foreach($repeat_retake_course_without_batch_marksheet as $single_mark_sheet){
  DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$single_mark_sheet->id)->update([
    'result_publish_status'=>1,
  ]);
}

foreach($supplementary_exam_assigned_mark_sheet as $single_mark_sheet){
  DB::table('assign_supplementary_exams')->where('id','=',$single_mark_sheet->id)->update([
    'result_publish_status'=>1,
  ]);
}




DB::table('trimesters')->where('id','=',$trimester_id)->update([
  'active_status'=>0,
]);

Session::flash('trimester_result_publish');
return redirect('exam_controller/view_trimester_for_publish_result');


}

// unsubmit marksheets

public function view_unsubmit_marksheets_only_select_trimester(){
  $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

    return view('exam_controller.view_unsubmit_assign_courses_only_select_trimester',compact('trimester_list'));
}


//
public function view_unsubmit_marksheets_only_select_trimester_process(Request $request){

  $enc_trimester_id = Crypt::encryptString($request['trimester_id']);

  return redirect('/exam_controller/view_unsubmit_marksheets/with_select_trimester/'.$enc_trimester_id);
}
//

public function view_unsubmit_marksheets_with_select_trimester($enc_trimester_id){
  $department_list=DB::table('departments')->get();
  $selected_trimester_id = Crypt::decryptString($enc_trimester_id);
  $trimester_list=DB::table('trimesters')->get();

  $assigned_regular_courses=DB::table('regular_course_assign_to_faculties')->select('trimester_id','batch_id','department_id','faculty_id','batch_course_list_id')->where('trimester_id','=',$selected_trimester_id)->where('faculty_finally_assign_status','=',1)->where('faculty_final_submit_status','=',0)->distinct()->get();
  $assigned_repeat_courses=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('trimester_id','=',$selected_trimester_id)->where('faculty_finally_assign_status','=',1)->where('faculty_final_submit_status','=',0)->distinct()->get();
  $assigned_supplementary_courses=DB::table('assign_supplementary_exams')->where('trimester_id','=',$selected_trimester_id)->where('faculty_finally_assign_status','=',1)->where('faculty_final_submit_status','=',0)->distinct()->get();

  return view('exam_controller.view_unsubmit_assign_courses_with_select_trimester',compact('department_list','selected_trimester_id','trimester_list','assigned_regular_courses','assigned_repeat_courses','assigned_supplementary_courses'));
}


}
