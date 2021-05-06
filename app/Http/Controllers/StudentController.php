<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use Illuminate\Support\Facades\Crypt;


class StudentController extends Controller
{
  public function __construct(){
       $this->middleware('auth');
       $this->middleware('student');
  }


public function view_trimester_result_only_select_trimester(){

  $id=Auth::user()->id;

  $trimester_list=DB::table('regular_course_assign_to_students')->select('trimester_id')->where('student_id','=',$id)->distinct()->get();

  return view('student.view_trimester_result_only_select_trimester',compact('trimester_list'));
}

//
public function view_trimester_result_only_select_trimester_process(Request $request){

  $enc_trimester_id = Crypt::encryptString($request['trimester_id']);

  return redirect('student/view_trimester_result/with_select_trimester/'.$enc_trimester_id);
}


//

public function view_trimester_result_with_select_trimester($enc_trimester_id){

  $id=Auth::user()->id;
  $department_list=DB::table('departments')->get();
  $selected_trimester_id = Crypt::decryptString($enc_trimester_id);
  $trimester_active_status=DB::table('trimesters')->where('id','=',$selected_trimester_id)->value('active_status');
  $trimester_list=DB::table('regular_course_assign_to_students')->select('trimester_id')->where('student_id','=',$id)->distinct()->get();

  $assigned_courses=DB::table('regular_course_assign_to_students')->where('trimester_id','=',$selected_trimester_id)->where('student_id','=',$id)->where('faculty_final_submit_status','=',1)->where('result_publish_status','=',1)->get();


  return view('student.view_regular_assign_courses_result_with_select_trimester',compact('department_list','selected_trimester_id','trimester_list','assigned_courses','trimester_active_status'));
}

public function view_all_the_completed_trimester_result(){
  $id=Auth::user()->id;

  $trimester_list=DB::table('regular_course_assign_to_students')->select('trimester_id')->where('student_id','=',$id)->distinct()->get();
  $assigned_courses=DB::table('regular_course_assign_to_students')->where('student_id','=',$id)->where('faculty_final_submit_status','=',1)->where('result_publish_status','=',1)->get();

  return view('student.view_regular_assign_courses_all_trimester_result',compact('trimester_list','assigned_courses'));
}

public function view_total_remaining_credit_hours(){
  $id=Auth::user()->id;

  $student_details=DB::table('students')->where('id','=',$id)->first();
  $course_version_id=DB::table('batches')->where('id','=',$student_details->batch_id)->value('course_version_id');
  $total_credit_hours_for_graduation=DB::table('course_versions')->where('id','=',$course_version_id)->value('total_credit_hours');
  $trimester_list=DB::table('regular_course_assign_to_students')->select('trimester_id')->where('student_id','=',$id)->distinct()->get();
  $assigned_courses=DB::table('regular_course_assign_to_students')->where('student_id','=',$id)->where('faculty_final_submit_status','=',1)->where('result_publish_status','=',1)->get();
  $no_of_trimesters_after_admission=DB::table('students')->where('id','=',$id)->value('trimesters_after_admission');

  return view('student.view_total_remaining_credit_hours',compact('trimester_list','assigned_courses','total_credit_hours_for_graduation','no_of_trimesters_after_admission'));

}


}
