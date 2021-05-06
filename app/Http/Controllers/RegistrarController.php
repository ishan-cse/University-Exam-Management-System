<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Session;
use Image;

class RegistrarController extends Controller{
  public function __construct(){
       $this->middleware('auth');
       $this->middleware('registrar');
  }

  public function all_user(){
    $allusers=DB::table('users')->get();

    return view('registrar.all-user',compact('allusers'));
  }

  public function view_user($uni_id){
    $data=DB::table('users')->where('uni_id','=',$uni_id)->first();
    return view('registrar.view-user',compact('data'));
  }
/*
  public function create_student(){

  }
*/

  public function add($role){
    $dept=DB::table('departments')->get();
    $batch=DB::table('batches')->get();
    $trimester=DB::table('trimesters')->get();
    return view('registrar.add-user',compact('dept','role','batch','trimester'));
  }

  public function create_process_user(Request $request){

  $role=$request['role_name'];

  if($request['role_name']=='Student') {

    $this->validate($request,[
    //  'name' => ['required', 'string', 'max:255'],
      'uni_id' => ['required', 'string', 'max:20', 'unique:users'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
    ],[

    ]);

    $id=DB::table('users')->insertGetId([
      'uni_id'=>$request['uni_id'],
      'name'=>$request['name'],
      'email'=>$request['email'],
      'role_name'=>$request['role_name'],
      'password'=>Hash::make($request['password']),
      'created_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
    ]);
  }
  elseif(($request['role_name']=='Faculty') || ($request['role_name']=='Course Coordinator')){

    $this->validate($request,[
    //  'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
    ],[

    ]);


    $id=DB::table('users')->insertGetId([
      //'uni_id'=>NULL,
      'name'=>$request['name'],
      'email'=>$request['email'],
      'role_name'=>$request['role_name'],
      'password'=>Hash::make($request['password']),
      'created_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
    ]);
  }

    if($request['role_name']=='Student') {
      if($request['student_type']==1){
        $insert=DB::table('students')->insert([
          'id'=>$id,
          'uni_id'=>$request['uni_id'],
          'email'=>$request['email'],
          'role_name'=>$request['role_name'],
          'name'=>$request['name'],
          'department_id'=>$request['department_id'],
          'batch_id'=>$request['batch_id'],
          'student_type'=>$request['student_type'],
          'admission_trimester'=>$request['admission_trimester'],
          'password'=>Hash::make($request['password']),
          'created_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
        ]);
    }
    elseif($request['student_type']==2){
      $dept_total_credit_hours=DB::table('course_versions')->where('department_id','=',$request['department_id'])->where('new_version_status','=',1)->value('total_credit_hours');
      $sixty_percentage_credit_hours=(($dept_total_credit_hours*60)/100);
      $insert=DB::table('students')->insert([
        'id'=>$id,
        'uni_id'=>$request['uni_id'],
        'email'=>$request['email'],
        'role_name'=>$request['role_name'],
        'name'=>$request['name'],
        'department_id'=>$request['department_id'],
        'batch_id'=>$request['batch_id'],
        'student_type'=>$request['student_type'],
        'credit_transfer_student_graduation_credit_hours'=>$sixty_percentage_credit_hours,
        'admission_trimester'=>$request['admission_trimester'],
        'password'=>Hash::make($request['password']),
        'created_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
      ]);
  }

    }
    elseif($request['role_name']=='Faculty') {
      $insert=DB::table('faculties')->insert([
        'id'=>$id,
        //'uni_id'=>NULL,
        'email'=>$request['email'],
        'role_name'=>$request['role_name'],
        'name'=>$request['name'],
        'department_id'=>$request['department_id'],
        'designation'=>$request['designation'],
        'password'=>Hash::make($request['password']),
        'created_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
      ]);
    }
    elseif($request['role_name']=='Course Coordinator') {
      $insert=DB::table('course_coordinators')->insert([
        'id'=>$id,
        //'uni_id'=>NULL,
        'email'=>$request['email'],
        'role_name'=>$request['role_name'],
        'name'=>$request['name'],
        'department_id'=>$request['department_id'],
        'password'=>Hash::make($request['password']),
        'created_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
      ]);
    }


    if($insert){

        Session::flash('success');
        return redirect('registrar/add/'.$role);

    }

  }


  public function create_department(){
    return view('registrar.create_department');
  }

  public function create_process_department(Request $request){
    $this->validate($request,[
      'department_name' => ['required', 'string', 'max:150', 'unique:departments'],
    ],[

    ]);

    $insert1_id=DB::table('departments')->insertGetId([
      'department_name'=>$request['department_name']
    ]);


    $insert2=DB::table('maximum_credit_hours_assign_to_faculties')->insert([
      'department_id'=>$insert1_id,
      'maximum_credit_hours'=>0,
    ]);

    if($insert1_id && $insert2){

        Session::flash('success');
        return redirect('registrar/create/department');
     }
  }


  public function all_department(){
    $all_department=DB::table('departments')->get();

    return view('registrar.all_department',compact('all_department'));
  }

  public function update_department($enc_department_id){
    $department_id = Crypt::decryptString($enc_department_id);

    $department=DB::table('departments')->where('id','=',$department_id)->first();

    return view('registrar.update_department',compact('department'));
  }

  public function update_department_process(Request $request){
    $this->validate($request,[
      'department_name' => ['required', 'string', 'max:150', 'unique:departments'],
    ],[

    ]);

    $update=DB::table('departments')->where('id','=',$request['department_id'])->update([
      'department_name'=>$request['department_name'],
    ]);

    if($update){

        Session::flash('success');
        return redirect('registrar/all_department');
     }
  }

  public function create_batch(){
       $data=DB::table('departments')->get();

       return view('registrar.create_batch',compact('data'));
  }


  public function create_process_batch(Request $request){
    $this->validate($request,[
      'batch_name' => ['required', 'string', 'max:100', 'unique:batches'],
    ],[

    ]);

    $course_version=DB::table('course_versions')->where('department_id','=',$request['dept_id'])->where('new_version_status','=',1)->first();

       $insert_batch_id=DB::table('batches')->insertGetId([
         'batch_name'=>$request['batch_name'],
         'department_id'=>$request['dept_id'],
         'course_version_id'=>$course_version->id,
         'total_credit_hours'=>$course_version->total_credit_hours,
       ]);

       $course=DB::table('courses')->where('department_id','=',$request['dept_id'])->where('course_version_id','=',$course_version->id)->get();

       foreach($course as $course_list){
         DB::table('batch_course_lists')->insert([
           'course_code'=>$course_list->course_code,
           'course_title'=>$course_list->course_title,
           'credit_hours'=>$course_list->credit_hours,
           'course_version_id'=>$course_list->course_version_id,
           'level_term'=>$course_list->level_term,
           'batch_id'=>$insert_batch_id,
           'department_id'=>$course_list->department_id,
           'departmental_course_status'=>$course_list->departmental_course_status,
           'prerequisite_course_code_1'=>$course_list->prerequisite_course_code_1,
           'prerequisite_course_code_2'=>$course_list->prerequisite_course_code_2,
           'prerequisite_course_code_3'=>$course_list->prerequisite_course_code_3,
           'prerequisite_course_code_4'=>$course_list->prerequisite_course_code_4,
           'prerequisite_course_code_5'=>$course_list->prerequisite_course_code_5,
         ]);
       }

       $level_terms_id=DB::table('level_terms')->insertGetId([
         'batch_id'=>$insert_batch_id,
         'department_id'=>$request['dept_id'],
         'level_term'=>'1-1',
       ]);

       if($insert_batch_id && $level_terms_id){

           Session::flash('success');
           return redirect('registrar/create/batch');
        }
  }

  public function all_batch(){

    $all_batch=DB::table('batches')->get();
    return view('registrar.all_batch',compact('all_batch'));
  }


  public function update_batch($enc_batch_id){
    $batch_id = Crypt::decryptString($enc_batch_id);

    $batch=DB::table('batches')->where('id','=',$batch_id)->first();

    return view('registrar.update_batch',compact('batch'));
  }


  public function update_batch_process(Request $request){
    $this->validate($request,[
      'batch_name' => ['required', 'string', 'max:150', 'unique:batches'],
    ],[

    ]);

    $update=DB::table('batches')->where('id','=',$request['batch_id'])->update([
      'batch_name'=>$request['batch_name'],
    ]);

    if($update){

        Session::flash('success');
        return redirect('registrar/all_batch');
     }
  }


  public function create_trimester(){

    return view('registrar.create_trimester');
  }

  public function process_create_trimester(){

    $active_trimester=DB::table('trimester_generators')->where('active_trimester_status','=',1)->first();


    if($active_trimester->trimester_name_format=='Fall'){
      $current_year=$active_trimester->year+1;


      DB::table('trimester_generators')->where('trimester_name_format','=','Spring')->where('id','=',2)->update([
        'year'=>$current_year,
        'active_trimester_status'=>1,
      ]);

      DB::table('trimester_generators')->where('trimester_name_format','=','Fall')->where('id','=',1)->update([
        'active_trimester_status'=>0,
      ]);

      $trimester_name='Spring'.' '.$current_year;

    }
    elseif($active_trimester->trimester_name_format=='Spring'){
      $current_year=$active_trimester->year;


      DB::table('trimester_generators')->where('trimester_name_format','=','Summer')->where('id','=',3)->update([
        'year'=>$current_year,
        'active_trimester_status'=>1,
      ]);

      DB::table('trimester_generators')->where('trimester_name_format','=','Spring')->where('id','=',2)->update([
        'active_trimester_status'=>0,
      ]);

      $trimester_name='Summer'.' '.$current_year;

    }
    elseif($active_trimester->trimester_name_format=='Summer'){
      $current_year=$active_trimester->year;


      DB::table('trimester_generators')->where('trimester_name_format','=','Fall')->where('id','=',1)->update([
        'year'=>$current_year,
        'active_trimester_status'=>1,
      ]);

      DB::table('trimester_generators')->where('trimester_name_format','=','Summer')->where('id','=',3)->update([
        'active_trimester_status'=>0,
      ]);

      $trimester_name='Fall'.' '.$current_year;

    }



    $insert=DB::table('trimesters')->insert([
      'trimester_name'=>$trimester_name,
    ]);

    $students=DB::table('students')->get();

    foreach($students as $student){
      $no_of_trimesters_after_admission=0;
      $no_of_trimesters_after_admission=$student->trimesters_after_admission;
      $no_of_trimesters_after_admission=$no_of_trimesters_after_admission+1;

      DB::table('students')->where('id','=',$student->id)->update([
        'trimesters_after_admission'=>$no_of_trimesters_after_admission,
      ]);
    }


    if($insert){

        Session::flash('success');
        return redirect('registrar/create/trimester');
     }


  }

  // regular
      public function view_regular_assign_courses_only_select_trimester(){
        $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

          return view('registrar.view_regular_assign_courses_only_select_trimester',compact('trimester_list'));
      }
  //
      public function view_regular_assign_courses_only_select_trimester_process(Request $request){

        $enc_trimester_id = Crypt::encryptString($request['trimester_id']);

        return redirect('/registrar/view_regular_assign_courses/with_select_trimester/'.$enc_trimester_id);
      }
  //

      public function view_regular_assign_courses_with_select_trimester($enc_trimester_id){
        //$dept_id=DB::table('registrars')->where('id','=',Auth::user()->id)->value('department_id');
        $selected_trimester_id = Crypt::decryptString($enc_trimester_id);
        $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

        $assigned_courses=DB::table('regular_course_assign_to_faculties')->where('trimester_id','=',$selected_trimester_id)->where('registrar_assign_request_status','=',1)->get();


        return view('registrar.view_regular_assign_courses_with_select_trimester',compact('selected_trimester_id','trimester_list','assigned_courses'));
      }
  /*
      public function view_regular_assign_courses_type($enc_trimester_id,$enc_courses_type){
        $dept_id=DB::table('registrars')->where('id','=',Auth::user()->id)->value('department_id');
        $selected_trimester_id = Crypt::decryptString($enc_trimester_id);
        $courses_type = Crypt::decryptString($enc_courses_type);
        $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

        $assigned_courses=DB::table('regular_course_assign_to_faculties')->where('department_id','=',$dept_id)->where('trimester_id','=',$selected_trimester_id)->get();


        return view('registrar.view_regular_assign_courses_with_select_trimester',compact('dept_id','selected_trimester_id','trimester_list','assigned_courses','courses_type'));
      }
  */
  //

      public function assign_faculty_to_regular_course($enc_trimester_id,$enc_faculty_assign_id){
        //$dept_id=DB::table('registrars')->where('id','=',Auth::user()->id)->value('department_id');
        $trimester_id = Crypt::decryptString($enc_trimester_id);
        $faculty_assign_id = Crypt::decryptString($enc_faculty_assign_id);


        $faculty_assign_course_details=DB::table('regular_course_assign_to_faculties')->where('id','=',$faculty_assign_id)->where('trimester_id','=',$trimester_id)->where('registrar_assign_request_status','=',1)->first();
        $course_type=DB::table('batch_course_lists')->where('id','=',$faculty_assign_course_details->batch_course_list_id)->value('departmental_course_status');

        if ($course_type==1) {
            //$faculty_list=DB::table('faculties')->where('department_id','=',$dept_id)->get();
        }
        elseif ($course_type==0) {
            $faculty_list=DB::table('faculties')->get();
        }

        return view('registrar.assign_faculty_to_regular_course',compact('trimester_id','faculty_assign_id','faculty_assign_course_details','faculty_list'));

      }
  //
      public function assign_faculty_to_regular_course_process(Request $request){

        $dept_id=DB::table('faculties')->where('id','=',$request['faculty_id'])->value('department_id');
        $maximum_credit_hours=DB::table('maximum_credit_hours_assign_to_faculties')->where('department_id','=',$dept_id)->value('maximum_credit_hours');

        $assigned_courses=DB::table('regular_course_assign_to_faculties')->where('faculty_id','=',$request['faculty_id'])->where('trimester_id','=',$request['trimester_id'])->where('registrar_assign_request_status','=',1)->get();

        $faculty_assign_course_details=DB::table('regular_course_assign_to_faculties')->where('id','=',$request['faculty_assign_id'])->where('registrar_assign_request_status','=',1)->first();
        $total_assigned_credit_hours=DB::table('batch_course_lists')->where('id','=',$faculty_assign_course_details->batch_course_list_id)->value('credit_hours');

        foreach($assigned_courses as $assigned_course){
            $assigned_credit_hours=DB::table('batch_course_lists')->where('id','=',$assigned_course->batch_course_list_id)->value('credit_hours');
            $total_assigned_credit_hours=$total_assigned_credit_hours+$assigned_credit_hours;
        }

        if($total_assigned_credit_hours<=$maximum_credit_hours){

        $assign=DB::table('regular_course_assign_to_faculties')->where('id','=',$request['faculty_assign_id'])->where('registrar_assign_request_status','=',1)->update([
          'faculty_id'=>$request['faculty_id'],
          'registrar_assign_request_status'=>0,
        ]);


          Session::flash('assign_faculty');

          $enc_trimester_id = Crypt::encryptString($request['trimester_id']);
          return redirect('/registrar/view_regular_assign_courses/with_select_trimester/'.$enc_trimester_id);


      }
      elseif($total_assigned_credit_hours>$maximum_credit_hours){

        $insert_id=DB::table('permission_for_allow_assign_more_regular_course_to_faculties')->insertGetId([
          'faculty_assign_id'=>$request['faculty_assign_id'],
          'faculty_id'=>$request['faculty_id'],
          'trimester_id'=>$request['trimester_id'],
        ]);

        $faculty_assign_id=$request['faculty_assign_id'];
        $faculty_id=$request['faculty_id'];
        $trimester_id=$request['trimester_id'];

        return view('registrar.permission_for_allow_assign_more_regular_course_to_faculties',compact('faculty_assign_id','faculty_id','trimester_id','insert_id'));

      }

    }

      public function permission_for_allow_assign_more_regular_course_to_faculties(Request $request){

        if($request['permisssion']==1){
           $assign=DB::table('regular_course_assign_to_faculties')->where('id','=',$request['faculty_assign_id'])->where('registrar_assign_request_status','=',1)->update([
            'faculty_id'=>$request['faculty_id'],
            'registrar_assign_request_status'=>0,
          ]);

          $request['faculty_assign_id'];
          $request['faculty_id'];

            Session::flash('assign_faculty');

            $enc_trimester_id = Crypt::encryptString($request['trimester_id']);
            return redirect('/registrar/view_regular_assign_courses/with_select_trimester/'.$enc_trimester_id);

        }
        elseif($request['permisssion']==0){
            $enc_trimester_id = Crypt::encryptString($request['trimester_id']);
            return redirect('/registrar/view_regular_assign_courses/with_select_trimester/'.$enc_trimester_id);
          }
        }
  //
      public function assign_faculty_finally_to_regular_course($enc_trimester_id,$enc_faculty_assign_id){

        $trimester_id = Crypt::decryptString($enc_trimester_id);
        $faculty_assign_id = Crypt::decryptString($enc_faculty_assign_id);

        $assign=DB::table('regular_course_assign_to_faculties')->where('id','=',$faculty_assign_id)->update([
          'faculty_finally_assign_status'=>1,
        ]);

        if($assign){
          Session::flash('assign_faculty_finally');

          $enc_trimester_id = Crypt::encryptString($trimester_id);
          return redirect('/registrar/view_regular_assign_courses/with_select_trimester/'.$enc_trimester_id);
        }

      }

      public function send_to_registrar_for_assigning_faculty_to_regular_course($enc_trimester_id,$enc_faculty_assign_id){

        $trimester_id = Crypt::decryptString($enc_trimester_id);
        $faculty_assign_id = Crypt::decryptString($enc_faculty_assign_id);

        $assign=DB::table('regular_course_assign_to_faculties')->where('id','=',$faculty_assign_id)->update([
          'registrar_assign_request_status'=>1,
        ]);

        if($assign){
          Session::flash('send_to_registrar');

          $enc_trimester_id = Crypt::encryptString($trimester_id);
          return redirect('/registrar/view_regular_assign_courses/with_select_trimester/'.$enc_trimester_id);
        }

      }
//
      public function view_repeat_retake_assign_courses_only_select_trimester(){
        $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

          return view('registrar.view_repeat_retake_assign_courses_only_select_trimester',compact('trimester_list'));
      }

      public function view_repeat_retake_assign_courses_only_select_trimester_process(Request $request){

        $enc_trimester_id = Crypt::encryptString($request['trimester_id']);

        return redirect('/registrar/view_repeat_retake_assign_courses/with_select_trimester/'.$enc_trimester_id);
      }
  //
      public function view_repeat_retake_assign_courses_with_select_trimester($enc_trimester_id){
        //$dept_id=DB::table('registrars')->where('id','=',Auth::user()->id)->value('department_id');
        $selected_trimester_id = Crypt::decryptString($enc_trimester_id);
        $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

        $assigned_courses=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('trimester_id','=',$selected_trimester_id)->where('registrar_assign_request_status','=',1)->get();


        return view('registrar.view_repeat_retake_assign_courses_with_select_trimester',compact('selected_trimester_id','trimester_list','assigned_courses'));
      }
  //
      public function assign_faculty_to_repeat_retake_course($enc_trimester_id,$enc_faculty_assign_id){
        //$dept_id=DB::table('registrars')->where('id','=',Auth::user()->id)->value('department_id');
        $trimester_id = Crypt::decryptString($enc_trimester_id);
        $faculty_assign_id = Crypt::decryptString($enc_faculty_assign_id);


        $faculty_assign_course_details=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$faculty_assign_id)->where('trimester_id','=',$trimester_id)->where('registrar_assign_request_status','=',1)->first();
        $course_type=DB::table('batch_course_lists')->where('id','=',$faculty_assign_course_details->batch_course_list_id)->value('departmental_course_status');

        if ($course_type==1) {
            //$faculty_list=DB::table('faculties')->where('department_id','=',$dept_id)->get();
        }
        elseif ($course_type==0) {
            $faculty_list=DB::table('faculties')->get();
        }

        return view('registrar.assign_faculty_to_repeat_retake_course',compact('trimester_id','faculty_assign_id','faculty_assign_course_details','faculty_list'));

      }
  //
      public function assign_faculty_to_repeat_retake_course_process(Request $request){

        $dept_id=DB::table('faculties')->where('id','=',$request['faculty_id'])->value('department_id');

        $faculty_assign_course_details=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$request['faculty_assign_id'])->where('registrar_assign_request_status','=',1)->first();

        $assign=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$request['faculty_assign_id'])->where('registrar_assign_request_status','=',1)->update([
          'faculty_id'=>$request['faculty_id'],
          'registrar_assign_request_status'=>0,
        ]);


          Session::flash('assign_faculty');

          $enc_trimester_id = Crypt::encryptString($request['trimester_id']);
          return redirect('/registrar/view_repeat_retake_assign_courses/with_select_trimester/'.$enc_trimester_id);

      }
  //
      public function assign_faculty_finally_to_repeat_retake_course($enc_trimester_id,$enc_faculty_assign_id){

        $trimester_id = Crypt::decryptString($enc_trimester_id);
        $faculty_assign_id = Crypt::decryptString($enc_faculty_assign_id);

        $assign=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$faculty_assign_id)->update([
          'faculty_finally_assign_status'=>1,
        ]);

        if($assign){
          Session::flash('assign_faculty_finally');

          $enc_trimester_id = Crypt::encryptString($trimester_id);
          return redirect('/registrar/view_repeat_retake_assign_courses/with_select_trimester/'.$enc_trimester_id);
        }

      }

      public function send_to_registrar_for_assigning_faculty_to_repeat_retake_course($enc_trimester_id,$enc_faculty_assign_id){

        $trimester_id = Crypt::decryptString($enc_trimester_id);
        $faculty_assign_id = Crypt::decryptString($enc_faculty_assign_id);

        $assign=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$faculty_assign_id)->update([
          'registrar_assign_request_status'=>1,
        ]);

        if($assign){
          Session::flash('send_to_registrar');

          $enc_trimester_id = Crypt::encryptString($trimester_id);
          return redirect('/registrar/view_repeat_retake_assign_courses/with_select_trimester/'.$enc_trimester_id);
        }

      }
  //
      public function view_supplementary_assign_courses_only_select_trimester(){
        $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

          return view('registrar.view_supplementary_assign_courses_only_select_trimester',compact('trimester_list'));
      }

      public function view_supplementary_assign_courses_only_select_trimester_process(Request $request){

        $enc_trimester_id = Crypt::encryptString($request['trimester_id']);

        return redirect('/registrar/view_supplementary_assign_courses/with_select_trimester/'.$enc_trimester_id);
      }

      public function view_supplementary_assign_courses_with_select_trimester($enc_trimester_id){
        //$dept_id=DB::table('registrars')->where('id','=',Auth::user()->id)->value('department_id');
        $selected_trimester_id = Crypt::decryptString($enc_trimester_id);
        $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

        $assigned_courses=DB::table('assign_supplementary_exams')->where('trimester_id','=',$selected_trimester_id)->where('registrar_assign_request_status','=',1)->get();


        return view('registrar.view_supplementary_assign_courses_with_select_trimester',compact('selected_trimester_id','trimester_list','assigned_courses'));
      }

      public function assign_faculty_to_supplementary_course($enc_trimester_id,$enc_faculty_assign_id){
        //$dept_id=DB::table('registrars')->where('id','=',Auth::user()->id)->value('department_id');
        $trimester_id = Crypt::decryptString($enc_trimester_id);
        $faculty_assign_id = Crypt::decryptString($enc_faculty_assign_id);


        $faculty_assign_course_details=DB::table('assign_supplementary_exams')->where('id','=',$faculty_assign_id)->where('trimester_id','=',$trimester_id)->where('registrar_assign_request_status','=',1)->first();
        $course_type=DB::table('batch_course_lists')->where('id','=',$faculty_assign_course_details->batch_course_list_id)->value('departmental_course_status');

        if ($course_type==1) {
            //$faculty_list=DB::table('faculties')->where('department_id','=',$dept_id)->get();
        }
        elseif ($course_type==0) {
            $faculty_list=DB::table('faculties')->get();
        }

        return view('registrar.assign_faculty_to_supplementary_course',compact('trimester_id','faculty_assign_id','faculty_assign_course_details','faculty_list'));

      }

      public function assign_faculty_to_supplementary_course_process(Request $request){

        //$dept_id=DB::table('faculties')->where('id','=',$request['faculty_id'])->value('department_id');

        $faculty_assign_course_details=DB::table('assign_supplementary_exams')->where('id','=',$request['faculty_assign_id'])->where('registrar_assign_request_status','=',1)->first();

        $assign=DB::table('assign_supplementary_exams')->where('id','=',$request['faculty_assign_id'])->update([
          'faculty_id'=>$request['faculty_id'],
          'registrar_assign_request_status'=>0,
        ]);


          Session::flash('assign_faculty');

          $enc_trimester_id = Crypt::encryptString($request['trimester_id']);
          return redirect('/registrar/view_supplementary_assign_courses/with_select_trimester/'.$enc_trimester_id);

      }

      public function assign_faculty_finally_to_supplementary_course($enc_trimester_id,$enc_faculty_assign_id){

        $trimester_id = Crypt::decryptString($enc_trimester_id);
        $faculty_assign_id = Crypt::decryptString($enc_faculty_assign_id);

        $assign=DB::table('assign_supplementary_exams')->where('id','=',$faculty_assign_id)->where('registrar_assign_request_status','=',1)->update([
          'faculty_finally_assign_status'=>1,
        ]);

        if($assign){
          Session::flash('assign_faculty_finally');

          $enc_trimester_id = Crypt::encryptString($trimester_id);
          return redirect('/registrar/view_supplementary_assign_courses/with_select_trimester/'.$enc_trimester_id);
        }

      }

      public function send_to_registrar_for_assigning_faculty_to_supplementary_course($enc_trimester_id,$enc_faculty_assign_id){

        $trimester_id = Crypt::decryptString($enc_trimester_id);
        $faculty_assign_id = Crypt::decryptString($enc_faculty_assign_id);

        $assign=DB::table('assign_supplementary_exams')->where('id','=',$faculty_assign_id)->where('registrar_assign_request_status','=',1)->update([
          'registrar_assign_request_status'=>1,
        ]);

        if($assign){
          Session::flash('send_to_registrar');

          $enc_trimester_id = Crypt::encryptString($trimester_id);
          return redirect('/registrar/view_supplementary_assign_courses/with_select_trimester/'.$enc_trimester_id);
        }

      }

      public function view_all_student(){

        $all_students=DB::table('students')->get();
        return view('registrar.view_all_student',compact('all_students'));
      }

    public function single_student_information_update($enc_student_database_id){
      $student_database_id = Crypt::decryptString($enc_student_database_id);
      $student_details=DB::table('students')->where('id','=',$student_database_id)->first();
      $batch_list=DB::table('batches')->where('department_id','=',$student_details->department_id)->get();

      return view('registrar.single_student_update_information',compact('student_details','batch_list'));
    }

    public function single_student_information_update_process(Request $request){
      $student_database_id=$request['student_database_id'];

      $update=DB::table('students')->where('id','=',$student_database_id)->update([
        'batch_id'=>$request['batch_id'],

      ]);


        Session::flash('student_information_updated');

        $enc_student_database_id = Crypt::encryptString($student_database_id);
        return redirect('registrar/view_all_student');

    }

    public function view_all_faculty(){

      $all_faculties=DB::table('faculties')->get();
      return view('registrar.view_all_faculties',compact('all_faculties'));

    }

    public function single_faculty_information_update($enc_faculty_database_id){
      $faculty_database_id = Crypt::decryptString($enc_faculty_database_id);
      $faculty_details=DB::table('faculties')->where('id','=',$faculty_database_id)->first();

      return view('registrar.single_faculty_update_information',compact('faculty_details'));
    }

    public function single_faculty_information_update_process(Request $request){
      $faculty_database_id=$request['faculty_database_id'];

      $update=DB::table('faculties')->where('id','=',$faculty_database_id)->update([
        'designation'=>$request['designation'],

      ]);


        Session::flash('faculty_information_updated');

        $enc_faculty_database_id = Crypt::encryptString($faculty_database_id);
        return redirect('registrar/view_all_faculty');

    }


  public function data(){

    return DB::table('users')->get();
  }


}
