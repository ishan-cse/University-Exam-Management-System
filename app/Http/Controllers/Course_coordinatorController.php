<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;
use Image;
use Auth;
use Illuminate\Support\Facades\Crypt;


class Course_coordinatorController extends Controller
{

  public function __construct(){
       $this->middleware('auth');
       $this->middleware('course_coordinator');
  }

  public function create_course_edition(){

    $dept=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_name');
    $data=DB::table('course_editions')->where('department_name','=',$dept)->get();
    return view('course_coordinator.create_course_edition',compact('data','dept'));

  }


  public function create_process_course_edition(Request $request){

    $this->validate($request,[
      'edition_no' => ['required', 'string', 'max:100', 'unique:course_editions'],
    ],[

    ]);

    $insert=DB::table('course_editions')->insert([
      'edition_no'=>$request['edition_no'],
      'department_name'=>$request['department_name'],
    ]);

    if($insert){
        Session::flash('success');
        return redirect('course_coordinator/create/course_edition');
      }
  }

  public function create_course_by_select_edition(){

    $dept=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_name');
    $data=DB::table('course_editions')->where('department_name','=',$dept)->get();
    return view('course_coordinator.create_course',compact('data','dept'));

  }


  public function create_course_by_select_edition_process(Request $request){

    $dept=$request['department_name'];
    $edition_no=$request['course_edition'];

    $edition_noc = Crypt::encryptString($edition_no);

    return redirect('course_coordinator/create/view/course/select_edition/'.$edition_noc);

  }



  public function create_course_by_select_edition_view($edition_noc){

   $edition_no = Crypt::decryptString($edition_noc);
   $dept=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_name');

   $all_course=DB::table('courses')->where('department_name','=',$dept)->where('edition_no','=',$edition_no)->get();

   return view('course_coordinator.create_course_with_prerequisite_course',compact('dept','edition_no','all_course'));
 }


 public function create_course_by_select_edition_with_prerequisite_process(Request $request){

   $this->validate($request,[
     'course_code' => ['required', 'string', 'max:150'],
     'course_title' => ['required', 'string', 'max:150'],
     'credit_hours' => ['required', 'numeric'],
   ],[

   ]);

   $data=DB::table('courses')->where('edition_no','=',$request['edition_no'])->where('department_name','=',$request['department_name'])->get();

   $course_codec=$request['course_code'];
   $course_titlec=$request['course_title'];
   $course_editionc=$request['edition_no'];

   foreach($data as $info){

     if(($info->course_code==$course_codec && $info->course_title==$course_titlec && $info->edition_no==$course_editionc) ||
     ($info->course_code==$course_codec && $info->edition_no==$course_editionc) ||
     ($info->course_title==$course_titlec && $info->edition_no==$course_editionc)){

       $dept=$request['department_name'];
       $edition_no=$request['edition_no'];

       $edition_noc = Crypt::encryptString($edition_no);

       Session::flash('course_exist');
       return redirect('course_coordinator/create/view/course/select_edition/'.$edition_noc);
     }
   }

       $insert=DB::table('courses')->insert([
           'course_code'=>$request['course_code'],
           'course_title'=>$request['course_title'],
           'credit_hours'=>$request['credit_hours'],
           'edition_no'=>$request['edition_no'],
           'department_name'=>$request['department_name'],
           'prerequisite_course_1'=>$request['prerequisite_course_1'],
           'prerequisite_course_2'=>$request['prerequisite_course_2'],
           'prerequisite_course_3'=>$request['prerequisite_course_3'],
           'prerequisite_course_4'=>$request['prerequisite_course_4'],
           'prerequisite_course_5'=>$request['prerequisite_course_5'],
       ]);

             if($insert){

               $deptt=$request['department_name'];
               $edition_noo=$request['edition_no'];

               $edition_noc = Crypt::encryptString($edition_noo);

               Session::flash('course_create');
               return redirect('course_coordinator/create/view/course/select_edition/'.$edition_noc);
             }
}

  public function view_all_course_with_edition(){
    $dept=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_name');
    $all_edition=DB::table('course_editions')->where('department_name','=',$dept)->get();

    return view('course_coordinator.view_all_course_with_edition',compact('dept','all_edition'));
  }

  public function view_course_list_with_edition($edition_noc){
    $edition_no = Crypt::decryptString($edition_noc);
    $dept=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_name');
    $course_list=DB::table('courses')->where('edition_no','=',$edition_no)->where('department_name','=',$dept)->get();
    return view('course_coordinator.view_course_list',compact('dept','course_list','edition_no'));
  }


  public function view_single_course($id_enc){
    $id = Crypt::decryptString($id_enc);

    $course_data=DB::table('courses')->where('id','=',$id)->first();

    return view('course_coordinator.view_single_course',compact('course_data'));
  }

  public function assign_regular_departmental_course_to_faculty(){
    $dept_id=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_id');
    $all_batch=DB::table('batches')->where('department_id','=',$dept_id)->get();
    $faculty_list=DB::table('faculties')->where('department_id','=',$dept_id)->get();
    $trimester=DB::table('trimesters')->where('active_status','=',1)->value('trimester_name');

    return view('course_coordinator.assign_regular_departmental_course_to_faculty',compact('dept_id','all_batch','faculty_list','trimester'));
  }
/*
  public function assign_regular_course_to_faculty_first_step_process(Request $request){

      $course_edition=$request['edition_no'];
      $faculty_department=$request['faculty_department_name'];


      $enc_faculty_department = Crypt::encryptString($faculty_department);
      $enc_course_edition = Crypt::encryptString($course_edition);

     return redirect('course_coordinator/assign/regular_course/faculty/final_step/'.$enc_faculty_department.'/'.$enc_course_edition);
  }

  public function assign_regular_course_to_faculty_final_step($enc_faculty_department,$enc_course_edition){
     $faculty_department = Crypt::decryptString($enc_faculty_department);
     $course_edition = Crypt::decryptString($enc_course_edition);

     $dept=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_name');
     $trimester=DB::table('trimesters')->where('active_status','=',1)->value('trimester_name');
     $batch_list=DB::table('batches')->where('department_name','=',$dept)->get();
     $course_list=DB::table('courses')->where('department_name','=',$dept)->where('edition_no','=',$course_edition)->get();
     $faculty_list=DB::table('faculties')->where('department_name','=',$faculty_department)->get();

     return view('course_coordinator.assign_regular_course_to_faculty_final_step',compact('faculty_department','faculty_list','trimester','batch_list','course_list','dept','course_edition'));

  }
*/
  public function assign_regular_course_to_faculty_final_step_process(Request $request){
    $this->validate($request,[
      'course' => ['required', 'string', 'max:150'],
      'batch_name' => ['required', 'string', 'max:100'],
      'faculty_name' => ['required', 'string', 'max:255'],
      'department_name' => ['required', 'string', 'max:150'],
      'trimester' => ['required', 'string', 'max:150'],
    ],[

    ]);

    $data=DB::table('regular_course_assign_to_faculties')->where('course_title','=',$request['course'])->where('batch_name','=',$request['batch_name'])->where('department_name','=',$request['department_name'])->where('edition_no','=',$request['edition_no'])->
    where('trimester_name','=',$request['trimester'])->first();

    if($data){

      $course_edition=$request['edition_no'];
      $faculty_department=$request['faculty_department'];

      $enc_faculty_department = Crypt::encryptString($faculty_department);
      $enc_course_edition = Crypt::encryptString($course_edition);

      Session::flash('course_exist');
      return redirect('course_coordinator/assign/regular_course/faculty/final_step/'.$enc_faculty_department.'/'.$enc_course_edition);

    }
    else{
      $insert=DB::table('regular_course_assign_to_faculties')->insert([
          'course_title'=>$request['course'],
          'batch_name'=>$request['batch_name'],
          'faculty_id'=>$request['faculty_id'],
          'department_name'=>$request['department_name'],
          'trimester_name'=>$request['trimester'],
          'edition_no'=>$request['edition_no'],
      ]);

      if($insert){

        $course_edition=$request['edition_no'];
        $faculty_department=$request['faculty_department'];

        $enc_faculty_department = Crypt::encryptString($faculty_department);
        $enc_course_edition = Crypt::encryptString($course_edition);

        Session::flash('course_assign');
        return redirect('course_coordinator/assign/regular_course/faculty/final_step/'.$enc_faculty_department.'/'.$enc_course_edition);
      }

    }
  }


    public function assign_regular_course_to_student_first_step(){

      $dept=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_name');
      $course_edition=DB::table('course_editions')->where('department_name','=',$dept)->get();

      return view('course_coordinator.assign_regular_course_to_student_first_step',compact('dept','course_edition'));

    }



    public function assign_regular_course_to_student_first_step_process(Request $request){

      $course_edition=$request['edition_no'];
      $enc_course_edition = Crypt::encryptString($course_edition);

     return redirect('course_coordinator/assign/regular_course/student/final_step/'.$enc_course_edition);

    }

    public function assign_regular_course_to_student_final_step($enc_course_edition){

      $course_edition = Crypt::decryptString($enc_course_edition);

      $dept=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_name');
      $trimester=DB::table('trimesters')->where('active_status','=',1)->value('trimester_name');
      $batch_list=DB::table('batches')->where('department_name','=',$dept)->get();
      $course_list=DB::table('courses')->where('department_name','=',$dept)->where('edition_no','=',$course_edition)->get();
      $student_list=DB::table('students')->where('department_name','=',$dept)->get();

      return view('course_coordinator.assign_regular_course_to_student_final_step',compact('student_list','trimester','batch_list','course_list','dept','course_edition'));

    }

    public function assign_regular_course_to_student_final_step_process(Request $request){

      $prc=0;

      $this->validate($request,[
        'course' => ['required', 'string', 'max:150'],
        'batch_name' => ['required', 'string', 'max:100'],
        'student_id' => ['required', 'string'],
        'department_name' => ['required', 'string', 'max:150'],
        'trimester' => ['required', 'string', 'max:150'],
      ],[

      ]);

      $data=DB::table('regular_course_assign_to_students')->where('student_id','=',$request['student_id'])->where('course_title','=',$request['course'])->where('department_name','=',$request['department_name'])->where('edition_no','=',$request['edition_no'])->where('trimester_name','=',$request['trimester'])->first();

      if($data){

        $course_edition=$request['edition_no'];

        $enc_course_edition = Crypt::encryptString($course_edition);

        Session::flash('course_exist');
        return redirect('course_coordinator/assign/regular_course/student/final_step/'.$enc_course_edition);

      }
      else{

        $prerequisite_courses=DB::table('courses')->where('course_title','=',$request['course'])->where('edition_no','=',$request['edition_no'])->where('department_name','=',$request['department_name'])->first();

        $total_marks_1=DB::table('regular_course_assign_to_students')->where('course_title','=',$prerequisite_courses->prerequisite_course_1)->where('edition_no','=',$request['edition_no'])->where('department_name','=',$request['department_name'])->value('total_marks');
        $total_marks_2=DB::table('regular_course_assign_to_students')->where('course_title','=',$prerequisite_courses->prerequisite_course_2)->where('edition_no','=',$request['edition_no'])->where('department_name','=',$request['department_name'])->value('total_marks');
        $total_marks_3=DB::table('regular_course_assign_to_students')->where('course_title','=',$prerequisite_courses->prerequisite_course_3)->where('edition_no','=',$request['edition_no'])->where('department_name','=',$request['department_name'])->value('total_marks');
        $total_marks_4=DB::table('regular_course_assign_to_students')->where('course_title','=',$prerequisite_courses->prerequisite_course_4)->where('edition_no','=',$request['edition_no'])->where('department_name','=',$request['department_name'])->value('total_marks');
        $total_marks_5=DB::table('regular_course_assign_to_students')->where('course_title','=',$prerequisite_courses->prerequisite_course_5)->where('edition_no','=',$request['edition_no'])->where('department_name','=',$request['department_name'])->value('total_marks');


    if($total_marks_1>=0 && $total_marks_1<40){
        $prc1=1;
      }
      if($total_marks_2>=0 && $total_marks_2<40){
        $prc2=1;
      }
      if($total_marks_3>=0 && $total_marks_3<40){
        $prc3=1;
      }
      if($total_marks_4>=0 && $total_marks_4<40){
        $prc4=1;
      }
      if($total_marks_5>=0 && $total_marks_5<40){
        $prc5=1;
      }


  if($prc1==1 || $prc2==1 || $prc3==1 || $prc4==1 || $prc5=1){

    $temp_id=DB::table('temporary_regular_course_assign_to_students')->insertGetId([
        'course_title'=>$request['course'],
        'batch_name'=>$request['batch_name'],
        'student_id'=>$request['student_id'],
        'department_name'=>$request['department_name'],
        'trimester_name'=>$request['trimester'],
        'edition_no'=>$request['edition_no'],
    ]);

    if($temp_id){

      $course_edition=$request['edition_no'];
      $prc=1;
  //  $enc_course_edition = Crypt::encryptString($course_edition);

      Session::flash('prerequisite_course');
      return view('course_coordinator.temporary_assign_regular_course_to_student_final_step',compact('course_edition','temp_id','prc'));

  }
}

/*
        $insert=DB::table('regular_course_assign_to_students')->insert([
            'course_title'=>$request['course'],
            'batch_name'=>$request['batch_name'],
            'student_id'=>$request['student_id'],
            'department_name'=>$request['department_name'],
            'trimester_name'=>$request['trimester'],
            'edition_no'=>$request['edition_no'],
        ]);

        if($insert){

          $course_edition=$request['edition_no'];

          $enc_course_edition = Crypt::encryptString($course_edition);

          Session::flash('course_assign');
          return redirect('course_coordinator/assign/regular_course/student/final_step/'.$enc_course_edition);
        } */
      }

    }


    public function temp_assign_regular_course_to_student_final_step(Request $request){
      if($request['permisssion']==0){
        $enc_course_edition = Crypt::encryptString($request['edition']);

        DB::table('temporary_regular_course_assign_to_students')->where('id','=',$request['temp_id'])->delete();

        return redirect('course_coordinator/assign/regular_course/student/final_step/'.$enc_course_edition);

      }
      elseif($request['permisssion']==1){

        $temp_id=$request['temp_id'];

        $temp_data=DB::table('temporary_regular_course_assign_to_students')->where('id','=',$temp_id)->first();

        $insert=DB::table('regular_course_assign_to_students')->insert([
            'course_title'=>$temp_data->course_title,
            'batch_name'=>$temp_data->batch_name,
            'student_id'=>$temp_data->student_id,
            'department_name'=>$temp_data->department_name,
            'trimester_name'=>$temp_data->trimester_name,
            'edition_no'=>$temp_data->edition_no,
        ]);

        DB::table('temporary_regular_course_assign_to_students')->where('id','=',$temp_id)->delete();

        if($insert){

          $course_edition=$request['edition'];

          $enc_course_edition = Crypt::encryptString($course_edition);

          Session::flash('course_assign');
          return redirect('course_coordinator/assign/regular_course/student/final_step/'.$enc_course_edition);
        }
      }

    }


// regular
    public function assign_regular_course_to_batch_first_step(){
      $ccid=Auth::user()->id;
      $dept_id=DB::table('course_coordinators')->where('id','=',$ccid)->value('department_id');

      $batch_list=DB::table('batches')->where('department_id','=',$dept_id)->get();

      $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

/*
       echo $dept_id;
      foreach($batch_list as $batch){
        if($batch->earned_credit_hours<$batch->total_credit_hours){
          echo $batch->batch_name;
        }
      }
*/
      return view('course_coordinator.assign_regular_courses_to_batch_first_step',compact('batch_list','dept_id','trimester_list'));
    }

    public function assign_regular_course_to_batch_first_step_process(Request $request){
      //$department_id=$request['department_id'];
      //$batch_id=$request['batch_id'];
      //$trimester_id=$request['trimester_id'];

      $enc_batch_id = Crypt::encryptString($request['batch_id']);
      $enc_trimester_id = Crypt::encryptString($request['trimester_id']);

      //$level_term=DB::table('level_terms')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->value('level_term');

      //$trimester_course_list=DB::table('batch_course_lists')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->where('level_term','=',$level_term)->get();

      //return view('course_coordinator.assign_regular_courses_to_batch_final_step',compact('department_id','batch_id','level_term','trimester_course_list','trimester_id'));

      return redirect('course_coordinator/assign_regular_course_to_batch/first_step_process_2/'.$enc_batch_id.'/'.$enc_trimester_id);
    }

    public function assign_regular_course_to_batch_first_step_process_2($enc_batch_id,$enc_trimester_id){

            $ccid=Auth::user()->id;
            $department_id=DB::table('course_coordinators')->where('id','=',$ccid)->value('department_id');

            $batch_id = Crypt::decryptString($enc_batch_id);
            $trimester_id = Crypt::decryptString($enc_trimester_id);

            $level_term=DB::table('level_terms')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->value('level_term');

            $trimester_course_list=DB::table('batch_course_lists')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->where('level_term','=',$level_term)->get();

            return view('course_coordinator.assign_regular_courses_to_batch_final_step',compact('department_id','batch_id','level_term','trimester_course_list','trimester_id'));
    }

    public function assign_regular_course_to_batch_add_course($enc_batch_id,$enc_trimester_id){

      $ccid=Auth::user()->id;
      $department_id=DB::table('course_coordinators')->where('id','=',$ccid)->value('department_id');

      $batch_id = Crypt::decryptString($enc_batch_id);
      $trimester_id = Crypt::decryptString($enc_trimester_id);

      $level_term=DB::table('level_terms')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->value('level_term');

      $batch_course_list=DB::table('batch_course_lists')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->where('level_term','!=',$level_term)->where('complete_status','=',0)->get();

      //$trimester_course_list=DB::table('batch_course_lists')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->where('level_term','=',$level_term)->get();

      return view('course_coordinator.assign_regular_courses_to_batch_add_course',compact('department_id','batch_id','level_term','batch_course_list','trimester_id'));

    }

    public function assign_regular_course_to_batch_add_course_process(Request $request){

      $department_id=$request['department_id'];
      $level_term=$request['level_term'];
      $add_course_id=$request['add_course_id'];

     $update=DB::table('batch_course_lists')->where('department_id','=',$department_id)->where('batch_id','=',$request['batch_id'])->where('id','=',$add_course_id)->update([
       'level_term'=>$level_term,
       ]);

     if($update){
       $enc_batch_id = Crypt::encryptString($request['batch_id']);
       $enc_trimester_id = Crypt::encryptString($request['trimester_id']);

       Session::flash('course_add');
       return redirect('course_coordinator/assign_regular_course_to_batch/first_step_process_2/'.$enc_batch_id.'/'.$enc_trimester_id);

       }

    }

    public function assign_regular_course_to_batch_remove_course($enc_batch_id,$enc_trimester_id,$enc_course_id){

            $ccid=Auth::user()->id;
            $department_id=DB::table('course_coordinators')->where('id','=',$ccid)->value('department_id');

            $batch_id = Crypt::decryptString($enc_batch_id);
            $trimester_id = Crypt::decryptString($enc_trimester_id);
            $remove_course_id = Crypt::decryptString($enc_course_id);

            $level_term=DB::table('level_terms')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->value('level_term');

            //$batch_course_list=DB::table('batch_course_lists')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->where('level_term','!=',$level_term)->where('complete_status','=',0)->get();

            //$trimester_course_list=DB::table('batch_course_lists')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->where('level_term','=',$level_term)->get();

            return view('course_coordinator.assign_regular_courses_to_batch_remove_course',compact('department_id','batch_id','level_term','remove_course_id','trimester_id'));

    }

    public function assign_regular_course_to_batch_remove_course_process(Request $request){

      $department_id=$request['department_id'];
      $current_level_term=$request['current_level_term'];
      $remove_level_term=$request['remove_level_term'];
      $remove_course_id=$request['remove_course_id'];

     $update=DB::table('batch_course_lists')->where('department_id','=',$department_id)->where('batch_id','=',$request['batch_id'])->where('level_term','=',$current_level_term)->where('id','=',$request['remove_course_id'])->update([
          'level_term'=>$remove_level_term,
        ]);

     if($update){

       $enc_batch_id = Crypt::encryptString($request['batch_id']);
       $enc_trimester_id = Crypt::encryptString($request['trimester_id']);

       Session::flash('course_remove');
       return redirect('course_coordinator/assign_regular_course_to_batch/first_step_process_2/'.$enc_batch_id.'/'.$enc_trimester_id);

       }

    }


    public function assign_regular_course_to_batch_interchange_course($enc_batch_id,$enc_trimester_id,$enc_course_id){

      $ccid=Auth::user()->id;
      $department_id=DB::table('course_coordinators')->where('id','=',$ccid)->value('department_id');

      $batch_id = Crypt::decryptString($enc_batch_id);
      $trimester_id = Crypt::decryptString($enc_trimester_id);
      $current_course_id = Crypt::decryptString($enc_course_id);

      $level_term=DB::table('level_terms')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->value('level_term');

      $batch_course_list=DB::table('batch_course_lists')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->where('level_term','!=',$level_term)->where('complete_status','=',0)->get();

      //$trimester_course_list=DB::table('batch_course_lists')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->where('level_term','=',$level_term)->get();

      return view('course_coordinator.assign_regular_courses_to_batch_interchange_course',compact('department_id','batch_id','level_term','current_course_id','trimester_id','batch_course_list'));

    }

    public function assign_regular_course_to_batch_interchange_course_process(Request $request){

      $department_id=$request['department_id'];
      $batch_id=$request['batch_id'];
      $current_level_term=$request['level_term'];
      $current_course_id=$request['current_course_id'];
      $interchange_course_id=$request['interchange_course_id'];

      $interchange_level_term=DB::table('batch_course_lists')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->where('id','=',$request['interchange_course_id'])->value('level_term');

     $update1=DB::table('batch_course_lists')->where('department_id','=',$department_id)->where('batch_id','=',$request['batch_id'])->where('id','=',$request['interchange_course_id'])->update([
          'level_term'=>$current_level_term,
        ]);

     $update2=DB::table('batch_course_lists')->where('department_id','=',$department_id)->where('batch_id','=',$request['batch_id'])->where('id','=',$request['current_course_id'])->update([
             'level_term'=>$interchange_level_term,
           ]);

     if($update1 && $update2){

       $enc_batch_id = Crypt::encryptString($request['batch_id']);
       $enc_trimester_id = Crypt::encryptString($request['trimester_id']);

       Session::flash('course_interchange');
       return redirect('course_coordinator/assign_regular_course_to_batch/first_step_process_2/'.$enc_batch_id.'/'.$enc_trimester_id);

       }

    }

    public function assign_regular_course_to_batch_final_step($enc_batch_id,$enc_trimester_id){

      $ccid=Auth::user()->id;
      $department_id=DB::table('course_coordinators')->where('id','=',$ccid)->value('department_id');

      $batch_id = Crypt::decryptString($enc_batch_id);
      $trimester_id = Crypt::decryptString($enc_trimester_id);

      $level_term=DB::table('level_terms')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->value('level_term');

      $trimester_course_list=DB::table('batch_course_lists')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->where('level_term','=',$level_term)->get();


      $batch_students=DB::table('students')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->get();

      $course_version_id=DB::table('batches')->where('id','=',$batch_id)->where('department_id','=',$department_id)->value('course_version_id');

      foreach ($trimester_course_list as $trimester_course) {
        foreach ($batch_students as $batch_student) {
          DB::table('regular_course_assign_to_students')->insert([
            'batch_course_list_id'=>$trimester_course->id,
            'batch_id'=>$batch_id,
            'student_id'=>$batch_student->id,
            'department_id'=>$department_id,
            'trimester_id'=>$trimester_id,
            'course_version_id'=>$course_version_id,
          ]);
        }

        DB::table('regular_course_assign_to_faculties')->insert([

          'batch_course_list_id'=>$trimester_course->id,
          'batch_id'=>$batch_id,
          'department_id'=>$department_id,
          'trimester_id'=>$trimester_id,
          'course_version_id'=>$course_version_id,
        ]);



        DB::table('batch_course_lists')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->where('level_term','=',$level_term)->where('id','=',$trimester_course->id)->update([
          'complete_status'=>1,
        ]);

      }

      if($level_term=='1-1'){
        DB::table('level_terms')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->update([
          'level_term'=>'1-2',
        ]);
      }
      elseif($level_term=='1-2'){
        DB::table('level_terms')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->update([
          'level_term'=>'1-3',
        ]);
      }
      elseif($level_term=='1-3'){
        DB::table('level_terms')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->update([
          'level_term'=>'2-1',
        ]);
      }
      elseif($level_term=='2-1'){
        DB::table('level_terms')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->update([
          'level_term'=>'2-2',
        ]);
      }
      elseif($level_term=='2-2'){
        DB::table('level_terms')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->update([
          'level_term'=>'2-3',
        ]);
      }
      elseif($level_term=='2-3'){
        DB::table('level_terms')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->update([
          'level_term'=>'3-1',
        ]);
      }
      elseif($level_term=='3-1'){
        DB::table('level_terms')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->update([
          'level_term'=>'3-2',
        ]);
      }
      elseif($level_term=='3-2'){
        DB::table('level_terms')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->update([
          'level_term'=>'3-3',
        ]);
      }
      elseif($level_term=='3-3'){
        DB::table('level_terms')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->update([
          'level_term'=>'4-1',
        ]);
      }
      elseif($level_term=='4-1'){
        DB::table('level_terms')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->update([
          'level_term'=>'4-2',
        ]);
      }
      elseif($level_term=='4-2'){
        DB::table('level_terms')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->update([
          'level_term'=>'4-3',
        ]);
      }
      elseif($level_term=='4-3'){
        DB::table('level_terms')->where('batch_id','=',$batch_id)->where('department_id','=',$department_id)->update([

          'level_term'=>'',
        ]);
      }

      $total_earned_credit=DB::table('batches')->where('id','=',$batch_id)->where('department_id','=',$department_id)->value('earned_credit_hours');


      $this_level_term_total_credit_hours=0;

        foreach($trimester_course_list as $t_courses){
          $this_level_term_total_credit_hours=$this_level_term_total_credit_hours+$t_courses->credit_hours;
        }

      $updated_total_earned_credit=$total_earned_credit+$this_level_term_total_credit_hours;

      DB::table('batches')->where('id','=',$batch_id)->where('department_id','=',$department_id)->update([
        'earned_credit_hours'=>$updated_total_earned_credit,
      ]);

      Session::flash('course_assigned');
      return redirect('course_coordinator/assign_regular_course_to_batch/first_step');

    }



    public function assign_repeat_retake_course_to_student_first_step(){
      $dept_id=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_id');
      $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

      return view('course_coordinator.assign_repeat_retake_course_to_student_first_step',compact('dept_id','trimester_list'));
    }

    public function assign_repeat_retake_course_to_student_first_step_process(Request $request){

      $this->validate($request,[
        'student_id' => ['required', 'string', 'max:100', 'exists:students,uni_id',],
      ],[

      ]);
      //$rules = ['email' => 'exists:staff,email,account_id,1'];
      //$request['student_id'];
      $student_database_id=DB::table('students')->where('department_id','=',$request['dept_id'])->where('uni_id','=',$request['student_id'])->value('id');

      $trimester_id=$request['trimester_id'];

      $enc_student_database_id = Crypt::encryptString($student_database_id);
      $enc_trimester_id = Crypt::encryptString($trimester_id);

      return redirect('course_coordinator/assign/repeat_retake_course/student/final_step/'.$enc_student_database_id.'/'.$enc_trimester_id);


/*
    $dept_id=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_id');

    $student_database_id=DB::table('students')->where('department_id','=',$dept_id)->where('uni_id','=',$request->id)->value('id');
    $student_assigned_courses=DB::table('regular_course_assign_to_students')->where('department_id','=',$dept_id)->where('student_id','=',$student_database_id)->where('faculty_final_submit_status','=',1)->where('result_publish_status','=',1)->get();
    //$data=DB::table('students')->where('id','=',$request->stu_id)->first();

    //$ggg=DB::table('students')->get();
    //return response()->json($ggg);

        return $student_assigned_courses;


*/
  }

    public function assign_repeat_retake_course_to_student_final_step($enc_student_database_id,$enc_trimester_id){

      $student_database_id = Crypt::decryptString($enc_student_database_id);

      $trimester_id = Crypt::decryptString($enc_trimester_id);

      $dept_id=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_id');
      $student_assigned_courses=DB::table('regular_course_assign_to_students')->where('department_id','=',$dept_id)->where('student_id','=',$student_database_id)->where('faculty_final_submit_status','=',1)->where('result_publish_status','=',1)->get();

      return view('course_coordinator.assign_repeat_retake_course_to_student_final_step',compact('student_database_id','trimester_id','dept_id','student_assigned_courses'));

    }


    public function assign_repeat_retake_course_to_student_final_step_process(Request $request){

    //  $repeat_course_with_batch=DB::('repeat_retake_course_assign_to_student_with_batches')->where('batch_course_list_id','=',$request['batch_course_list_id'])->where('student_id','=',$request['student_database_id'])->where('trimester_id','=',$request['trimester_id'])->get();
    $repeat_course_with_batch=DB::table('repeat_retake_course_assign_to_student_with_batches')->where('trimester_id','=',$request['trimester_id'])->get();

    foreach($repeat_course_with_batch as $repeat_course){
      if($repeat_course->batch_course_list_id==$request['batch_course_list_id'] && $repeat_course->trimester_id==$request['trimester_id'] && $repeat_course->student_id==$request['student_database_id']){
        $enc_student_database_id = Crypt::encryptString($request['student_database_id']);
        $enc_trimester_id = Crypt::encryptString($request['trimester_id']);

        Session::flash('course_already_assigned');

        return redirect('course_coordinator/assign/repeat_retake_course/student/final_step/'.$enc_student_database_id.'/'.$enc_trimester_id);
      }
    }

    $repeat_course_without_batch=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('trimester_id','=',$request['trimester_id'])->get();

    foreach($repeat_course_without_batch as $repeat_course){
      if($repeat_course->batch_course_list_id==$request['batch_course_list_id'] && $repeat_course->trimester_id==$request['trimester_id'] && $repeat_course->student_id==$request['student_database_id']){

        $enc_student_database_id = Crypt::encryptString($request['student_database_id']);
        $enc_trimester_id = Crypt::encryptString($request['trimester_id']);
        $enc_batch_course_list_id = Crypt::encryptString($request['batch_course_list_id']);

        Session::flash('course_already_assigned');
        return redirect('course_coordinator/assign/repeat_retake_course/student/final_step/'.$enc_student_database_id.'/'.$enc_trimester_id);
      }
    }

      if ($request['type']==1) {

        $course_title_student=DB::table('batch_course_lists')->where('id','=',$request['batch_course_list_id'])->value('course_title');

        $faculty_asigned_course_list=DB::table('regular_course_assign_to_faculties')->where('department_id','=',$request['department_id'])->where('trimester_id','=',$request['trimester_id'])->get();

        $batch_list = array();

        foreach ($faculty_asigned_course_list as $faculty_asigned_course) {
          $course_title_faculty=DB::table('batch_course_lists')->where('id','=',$faculty_asigned_course->batch_course_list_id)->value('course_title');

        if ($course_title_student==$course_title_faculty) {
          $batch_list[]=$faculty_asigned_course->batch_id;
        }
/*
          if ($course_title_student==$course_title_faculty) {
            $assign=DB::table('repeat_retake_course_assign_to_student_with_batches')->insert([
              'batch_course_list_id'=>$request['batch_course_list_id'],
              'student_id'=>$request['student_database_id'],
              'batch_id'=>$faculty_asigned_course->batch_id,
              'department_id'=>$request['department_id'],
              'trimester_id'=>$request['trimester_id'],
            ]);

            if($assign){
              Session::flash('course_assigned_with_batch');
              return redirect('course_coordinator/assign/repeat_retake_course/student/first_step');
            }
          }*/
        }

        //echo $batch_list;
      if($batch_list!=NULL){
         //print_r($batch_list);

         $enc_student_database_id = Crypt::encryptString($request['student_database_id']);
         $enc_trimester_id = Crypt::encryptString($request['trimester_id']);
         $enc_batch_course_list_id = Crypt::encryptString($request['batch_course_list_id']);

         return redirect('course_coordinator/assign/repeat_retake_course/student/final_step_select_batch/'.$enc_student_database_id.'/'.$enc_trimester_id.'/'.$enc_batch_course_list_id);
      }
      else{

         $enc_student_database_id = Crypt::encryptString($request['student_database_id']);
         $enc_trimester_id = Crypt::encryptString($request['trimester_id']);

         Session::flash('no_batch_available');
         return redirect('course_coordinator/assign/repeat_retake_course/student/final_step/'.$enc_student_database_id.'/'.$enc_trimester_id);
         //return redirect('course_coordinator/assign/repeat_retake_course/student/first_step');
      }

      }
      elseif ($request['type']==2) {
        $assign=DB::table('repeat_retake_course_assign_to_student_without_batches')->insert([
          'batch_course_list_id'=>$request['batch_course_list_id'],
          'student_id'=>$request['student_database_id'],
          'department_id'=>$request['department_id'],
          'trimester_id'=>$request['trimester_id'],
        ]);

        if($assign){
          Session::flash('course_assigned_without_batch');
          return redirect('course_coordinator/assign/repeat_retake_course/student/first_step');
        }
      }


    }

    public function assign_repeat_retake_course_to_student_final_step_select_batch($enc_student_database_id,$enc_trimester_id,$enc_batch_course_list_id){

      $dept_id=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_id');

      $student_database_id = Crypt::decryptString($enc_student_database_id);
      $trimester_id = Crypt::decryptString($enc_trimester_id);
      $batch_course_list_id = Crypt::decryptString($enc_batch_course_list_id);

      $course_title_student=DB::table('batch_course_lists')->where('id','=',$batch_course_list_id)->value('course_title');

      $faculty_asigned_course_list_details = DB::table('regular_course_assign_to_faculties')->where('department_id','=',$dept_id)->where('trimester_id','=',$trimester_id)->get();

      $faculty_asigned_course_list = array();

      foreach ($faculty_asigned_course_list_details as $faculty_asigned_course) {
        $course_title_faculty=DB::table('batch_course_lists')->where('id','=',$faculty_asigned_course->batch_course_list_id)->value('course_title');

      if ($course_title_student==$course_title_faculty) {
        $faculty_asigned_course_list[] = $faculty_asigned_course->id;
      }
    }
    //print_r($faculty_asigned_course_list);
      return view('course_coordinator.assign_repeat_retake_course_to_student_final_step_select_batch',compact('student_database_id','trimester_id','dept_id','batch_course_list_id','faculty_asigned_course_list'));
    }

    public function assign_repeat_retake_course_to_student_final_step_select_batch_process(Request $request){

      $faculty_asigned_course_list_id = $request['faculty_asigned_course_list_id'];
      $faculty_asigned_course_list_id_details = DB::table('regular_course_assign_to_faculties')->where('id','=',$faculty_asigned_course_list_id)->first();

      $assign=DB::table('repeat_retake_course_assign_to_student_with_batches')->insert([
        'batch_course_list_id'=>$faculty_asigned_course_list_id_details->batch_course_list_id,
        'student_id'=>$request['student_database_id'],
        'batch_id'=>$faculty_asigned_course_list_id_details->batch_id,
        'department_id'=>$request['department_id'],
        'trimester_id'=>$request['trimester_id'],
      ]);

      if($assign){
        Session::flash('course_assigned_with_batch');
        return redirect('course_coordinator/assign/repeat_retake_course/student/first_step');
      }
    }

    public function assign_supplementary_exam_first_step(){

      $dept_id=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_id');
      $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

      return view('course_coordinator.assign_supplementary_exam_first_step',compact('dept_id','trimester_list'));
    }

    public function assign_supplementary_exam_first_step_process(Request $request){

      $this->validate($request,[
        'student_id' => ['required', 'string', 'max:100', 'exists:students,uni_id',],
      ],[

      ]);
      //$rules = ['email' => 'exists:staff,email,account_id,1'];
      //$request['student_id'];
      $student_database_id=DB::table('students')->where('department_id','=',$request['dept_id'])->where('uni_id','=',$request['student_id'])->value('id');

      $trimester_id=$request['trimester_id'];

      $enc_student_database_id = Crypt::encryptString($student_database_id);
      $enc_trimester_id = Crypt::encryptString($trimester_id);

     return redirect('/course_coordinator/assign/supplemetary_exam/final_step/'.$enc_student_database_id.'/'.$enc_trimester_id);
    }

    public function assign_supplementary_exam_final_step($enc_student_database_id,$enc_trimester_id){

        $student_database_id = Crypt::decryptString($enc_student_database_id);

        $trimester_id = Crypt::decryptString($enc_trimester_id);

        $dept_id=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_id');
        $student_assigned_courses=DB::table('regular_course_assign_to_students')->where('department_id','=',$dept_id)->where('student_id','=',$student_database_id)->where('faculty_final_submit_status','=',1)->where('result_publish_status','=',1)->get();

      return view('course_coordinator.assign_supplementary_exam_final_step',compact('student_database_id','trimester_id','dept_id','student_assigned_courses'));

    }

    public function assign_supplementary_exam_final_step_process(Request $request){

      $supplementary_course=DB::table('assign_supplementary_exams')->where('trimester_id','=',$request['trimester_id'])->get();

      foreach($supplementary_course as $repeat_course){
        if($repeat_course->batch_course_list_id==$request['batch_course_list_id'] && $repeat_course->trimester_id==$request['trimester_id'] && $repeat_course->student_id==$request['student_database_id']){
          $enc_student_database_id = Crypt::encryptString($request['student_database_id']);
          $enc_trimester_id = Crypt::encryptString($request['trimester_id']);

          Session::flash('course_already_assigned');
          return redirect('course_coordinator/assign/supplemetary_exam/final_step/'.$enc_student_database_id.'/'.$enc_trimester_id);
        }
      }

      $assign=DB::table('assign_supplementary_exams')->insert([
        'batch_course_list_id'=>$request['batch_course_list_id'],
        'student_id'=>$request['student_database_id'],
        'department_id'=>$request['department_id'],
        'trimester_id'=>$request['trimester_id'],
      ]);

      if($assign){
        Session::flash('assign_supplementary_exam');
        return redirect('course_coordinator/assign/supplemetary_exam/first_step');
      }


    }
// regular
    public function view_regular_assign_courses_only_select_trimester(){
      $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

        return view('course_coordinator.view_regular_assign_courses_only_select_trimester',compact('trimester_list'));
    }
//
    public function view_regular_assign_courses_only_select_trimester_process(Request $request){

      $enc_trimester_id = Crypt::encryptString($request['trimester_id']);

      return redirect('/course_coordinator/view_regular_assign_courses/with_select_trimester/'.$enc_trimester_id);
    }
//

    public function view_regular_assign_courses_with_select_trimester($enc_trimester_id){
      $dept_id=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_id');
      $selected_trimester_id = Crypt::decryptString($enc_trimester_id);
      $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

      $assigned_courses=DB::table('regular_course_assign_to_faculties')->where('department_id','=',$dept_id)->where('trimester_id','=',$selected_trimester_id)->get();


      return view('course_coordinator.view_regular_assign_courses_with_select_trimester',compact('dept_id','selected_trimester_id','trimester_list','assigned_courses'));
    }
/*
    public function view_regular_assign_courses_type($enc_trimester_id,$enc_courses_type){
      $dept_id=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_id');
      $selected_trimester_id = Crypt::decryptString($enc_trimester_id);
      $courses_type = Crypt::decryptString($enc_courses_type);
      $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

      $assigned_courses=DB::table('regular_course_assign_to_faculties')->where('department_id','=',$dept_id)->where('trimester_id','=',$selected_trimester_id)->get();


      return view('course_coordinator.view_regular_assign_courses_with_select_trimester',compact('dept_id','selected_trimester_id','trimester_list','assigned_courses','courses_type'));
    }
*/
//

    public function assign_faculty_to_regular_course($enc_trimester_id,$enc_faculty_assign_id){
      $dept_id=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_id');
      $trimester_id = Crypt::decryptString($enc_trimester_id);
      $faculty_assign_id = Crypt::decryptString($enc_faculty_assign_id);


      $faculty_assign_course_details=DB::table('regular_course_assign_to_faculties')->where('id','=',$faculty_assign_id)->where('trimester_id','=',$trimester_id)->first();
      $course_type=DB::table('batch_course_lists')->where('id','=',$faculty_assign_course_details->batch_course_list_id)->value('departmental_course_status');

      if ($course_type==1) {
          $faculty_list=DB::table('faculties')->where('department_id','=',$dept_id)->get();
      }
      elseif ($course_type==0) {
          $faculty_list=DB::table('faculties')->get();
      }

      return view('course_coordinator.assign_faculty_to_regular_course',compact('trimester_id','faculty_assign_id','faculty_assign_course_details','faculty_list'));

    }
//
    public function assign_faculty_to_regular_course_process(Request $request){

      $dept_id=DB::table('faculties')->where('id','=',$request['faculty_id'])->value('department_id');
      $maximum_credit_hours=DB::table('maximum_credit_hours_assign_to_faculties')->where('department_id','=',$dept_id)->value('maximum_credit_hours');

      $assigned_courses=DB::table('regular_course_assign_to_faculties')->where('faculty_id','=',$request['faculty_id'])->where('trimester_id','=',$request['trimester_id'])->get();

      $faculty_assign_course_details=DB::table('regular_course_assign_to_faculties')->where('id','=',$request['faculty_assign_id'])->first();
      $total_assigned_credit_hours=DB::table('batch_course_lists')->where('id','=',$faculty_assign_course_details->batch_course_list_id)->value('credit_hours');

      foreach($assigned_courses as $assigned_course){
          $assigned_credit_hours=DB::table('batch_course_lists')->where('id','=',$assigned_course->batch_course_list_id)->value('credit_hours');
          $total_assigned_credit_hours=$total_assigned_credit_hours+$assigned_credit_hours;
      }

      if($total_assigned_credit_hours<=$maximum_credit_hours){

      $assign=DB::table('regular_course_assign_to_faculties')->where('id','=',$request['faculty_assign_id'])->update([
        'faculty_id'=>$request['faculty_id'],
      ]);


        Session::flash('assign_faculty');

        $enc_trimester_id = Crypt::encryptString($request['trimester_id']);
        return redirect('/course_coordinator/view_regular_assign_courses/with_select_trimester/'.$enc_trimester_id);


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

      return view('course_coordinator.permission_for_allow_assign_more_regular_course_to_faculties',compact('faculty_assign_id','faculty_id','trimester_id','insert_id'));

    }

  }

    public function permission_for_allow_assign_more_regular_course_to_faculties(Request $request){

      if($request['permisssion']==1){
         $assign=DB::table('regular_course_assign_to_faculties')->where('id','=',$request['faculty_assign_id'])->update([
          'faculty_id'=>$request['faculty_id'],
        ]);

        $request['faculty_assign_id'];
        $request['faculty_id'];

          Session::flash('assign_faculty');

          $enc_trimester_id = Crypt::encryptString($request['trimester_id']);
          return redirect('/course_coordinator/view_regular_assign_courses/with_select_trimester/'.$enc_trimester_id);

      }
      elseif($request['permisssion']==0){
          $enc_trimester_id = Crypt::encryptString($request['trimester_id']);
          return redirect('/course_coordinator/view_regular_assign_courses/with_select_trimester/'.$enc_trimester_id);
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
        return redirect('/course_coordinator/view_regular_assign_courses/with_select_trimester/'.$enc_trimester_id);
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
        return redirect('/course_coordinator/view_regular_assign_courses/with_select_trimester/'.$enc_trimester_id);
      }

    }

    public function view_repeat_retake_assign_courses_only_select_trimester(){
      $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

        return view('course_coordinator.view_repeat_retake_assign_courses_only_select_trimester',compact('trimester_list'));
    }

    public function view_repeat_retake_assign_courses_only_select_trimester_process(Request $request){

      $enc_trimester_id = Crypt::encryptString($request['trimester_id']);

      return redirect('/course_coordinator/view_repeat_retake_assign_courses/with_select_trimester/'.$enc_trimester_id);
    }
//
    public function view_repeat_retake_assign_courses_with_select_trimester($enc_trimester_id){
      $dept_id=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_id');
      $selected_trimester_id = Crypt::decryptString($enc_trimester_id);
      $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

      $assigned_courses=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('department_id','=',$dept_id)->where('trimester_id','=',$selected_trimester_id)->get();


      return view('course_coordinator.view_repeat_retake_assign_courses_with_select_trimester',compact('dept_id','selected_trimester_id','trimester_list','assigned_courses'));
    }
//
    public function assign_faculty_to_repeat_retake_course($enc_trimester_id,$enc_faculty_assign_id){
      $dept_id=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_id');
      $trimester_id = Crypt::decryptString($enc_trimester_id);
      $faculty_assign_id = Crypt::decryptString($enc_faculty_assign_id);


      $faculty_assign_course_details=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$faculty_assign_id)->where('trimester_id','=',$trimester_id)->first();
      $course_type=DB::table('batch_course_lists')->where('id','=',$faculty_assign_course_details->batch_course_list_id)->value('departmental_course_status');

      if ($course_type==1) {
          $faculty_list=DB::table('faculties')->where('department_id','=',$dept_id)->get();
      }
      elseif ($course_type==0) {
          $faculty_list=DB::table('faculties')->get();
      }

      return view('course_coordinator.assign_faculty_to_repeat_retake_course',compact('trimester_id','faculty_assign_id','faculty_assign_course_details','faculty_list'));

    }
//
    public function assign_faculty_to_repeat_retake_course_process(Request $request){

      $dept_id=DB::table('faculties')->where('id','=',$request['faculty_id'])->value('department_id');

      $faculty_assign_course_details=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$request['faculty_assign_id'])->first();

      $assign=DB::table('repeat_retake_course_assign_to_student_without_batches')->where('id','=',$request['faculty_assign_id'])->update([
        'faculty_id'=>$request['faculty_id'],
      ]);


        Session::flash('assign_faculty');

        $enc_trimester_id = Crypt::encryptString($request['trimester_id']);
        return redirect('/course_coordinator/view_repeat_retake_assign_courses/with_select_trimester/'.$enc_trimester_id);

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
        return redirect('/course_coordinator/view_repeat_retake_assign_courses/with_select_trimester/'.$enc_trimester_id);
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
        return redirect('/course_coordinator/view_repeat_retake_assign_courses/with_select_trimester/'.$enc_trimester_id);
      }

    }
//
    public function view_supplementary_assign_courses_only_select_trimester(){
      $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

        return view('course_coordinator.view_supplementary_assign_courses_only_select_trimester',compact('trimester_list'));
    }

    public function view_supplementary_assign_courses_only_select_trimester_process(Request $request){

      $enc_trimester_id = Crypt::encryptString($request['trimester_id']);

      return redirect('/course_coordinator/view_supplementary_assign_courses/with_select_trimester/'.$enc_trimester_id);
    }

    public function view_supplementary_assign_courses_with_select_trimester($enc_trimester_id){
      $dept_id=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_id');
      $selected_trimester_id = Crypt::decryptString($enc_trimester_id);
      $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

      $assigned_courses=DB::table('assign_supplementary_exams')->where('department_id','=',$dept_id)->where('trimester_id','=',$selected_trimester_id)->get();


      return view('course_coordinator.view_supplementary_assign_courses_with_select_trimester',compact('dept_id','selected_trimester_id','trimester_list','assigned_courses'));
    }

    public function assign_faculty_to_supplementary_course($enc_trimester_id,$enc_faculty_assign_id){
      $dept_id=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_id');
      $trimester_id = Crypt::decryptString($enc_trimester_id);
      $faculty_assign_id = Crypt::decryptString($enc_faculty_assign_id);


      $faculty_assign_course_details=DB::table('assign_supplementary_exams')->where('id','=',$faculty_assign_id)->where('trimester_id','=',$trimester_id)->first();
      $course_type=DB::table('batch_course_lists')->where('id','=',$faculty_assign_course_details->batch_course_list_id)->value('departmental_course_status');

      if ($course_type==1) {
          $faculty_list=DB::table('faculties')->where('department_id','=',$dept_id)->get();
      }
      elseif ($course_type==0) {
          $faculty_list=DB::table('faculties')->get();
      }

      return view('course_coordinator.assign_faculty_to_supplementary_course',compact('trimester_id','faculty_assign_id','faculty_assign_course_details','faculty_list'));

    }

    public function assign_faculty_to_supplementary_course_process(Request $request){

      $dept_id=DB::table('faculties')->where('id','=',$request['faculty_id'])->value('department_id');

      $faculty_assign_course_details=DB::table('assign_supplementary_exams')->where('id','=',$request['faculty_assign_id'])->first();

      $assign=DB::table('assign_supplementary_exams')->where('id','=',$request['faculty_assign_id'])->update([
        'faculty_id'=>$request['faculty_id'],
      ]);


        Session::flash('assign_faculty');

        $enc_trimester_id = Crypt::encryptString($request['trimester_id']);
        return redirect('/course_coordinator/view_supplementary_assign_courses/with_select_trimester/'.$enc_trimester_id);

    }

    public function assign_faculty_finally_to_supplementary_course($enc_trimester_id,$enc_faculty_assign_id){

      $trimester_id = Crypt::decryptString($enc_trimester_id);
      $faculty_assign_id = Crypt::decryptString($enc_faculty_assign_id);

      $assign=DB::table('assign_supplementary_exams')->where('id','=',$faculty_assign_id)->update([
        'faculty_finally_assign_status'=>1,
      ]);

      if($assign){
        Session::flash('assign_faculty_finally');

        $enc_trimester_id = Crypt::encryptString($trimester_id);
        return redirect('/course_coordinator/view_supplementary_assign_courses/with_select_trimester/'.$enc_trimester_id);
      }

    }

    public function send_to_registrar_for_assigning_faculty_to_supplementary_course($enc_trimester_id,$enc_faculty_assign_id){

      $trimester_id = Crypt::decryptString($enc_trimester_id);
      $faculty_assign_id = Crypt::decryptString($enc_faculty_assign_id);

      $assign=DB::table('assign_supplementary_exams')->where('id','=',$faculty_assign_id)->update([
        'registrar_assign_request_status'=>1,
      ]);

      if($assign){
        Session::flash('send_to_registrar');

        $enc_trimester_id = Crypt::encryptString($trimester_id);
        return redirect('/course_coordinator/view_supplementary_assign_courses/with_select_trimester/'.$enc_trimester_id);
      }

    }
//
public function assign_single_course_with_batch_first_step(){

  $dept_id=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_id');
  $trimester_list=DB::table('trimesters')->where('active_status','=',1)->get();

  return view('course_coordinator.assign_single_course_with_batch_first_step',compact('dept_id','trimester_list'));
}

public function assign_single_course_with_batch_first_step_process(Request $request){

  $this->validate($request,[
    'student_id' => ['required', 'string', 'max:100', 'exists:students,uni_id',],
  ],[

  ]);
  //$rules = ['email' => 'exists:staff,email,account_id,1'];
  //$request['student_id'];
  $student_database_id=DB::table('students')->where('department_id','=',$request['dept_id'])->where('uni_id','=',$request['student_id'])->value('id');

  $trimester_id=$request['trimester_id'];

  $enc_student_database_id = Crypt::encryptString($student_database_id);
  $enc_trimester_id = Crypt::encryptString($trimester_id);

 return redirect('/course_coordinator/assign/single_course_with_batch/final_step/'.$enc_student_database_id.'/'.$enc_trimester_id);
}

public function assign_single_course_with_batch_final_step($enc_student_database_id,$enc_trimester_id){

    $student_database_id = Crypt::decryptString($enc_student_database_id);

    $trimester_id = Crypt::decryptString($enc_trimester_id);

    $dept_id=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_id');
    $student_assigned_courses=DB::table('regular_course_assign_to_faculties')->where('department_id','=',$dept_id)->where('trimester_id','=',$trimester_id)->get();


  return view('course_coordinator.assign_single_course_with_batch_final_step',compact('student_database_id','trimester_id','dept_id','student_assigned_courses'));

}

public function assign_single_course_with_batch_final_step_process(Request $request){


  $regular_course=DB::table('regular_course_assign_to_students')->where('trimester_id','=',$request['trimester_id'])->get();

  foreach($regular_course as $repeat_course){
    if($repeat_course->batch_course_list_id==$request['batch_course_list_id'] && $repeat_course->trimester_id==$request['trimester_id'] && $repeat_course->student_id==$request['student_database_id']){
      $enc_student_database_id = Crypt::encryptString($request['student_database_id']);
      $enc_trimester_id = Crypt::encryptString($request['trimester_id']);

      Session::flash('course_already_assigned');
      return redirect('course_coordinator/assign/single_course_with_batch/final_step/'.$enc_student_database_id.'/'.$enc_trimester_id);
    }
  }


  $enc_student_database_id = Crypt::encryptString($request['student_database_id']);
  $enc_trimester_id = Crypt::encryptString($request['trimester_id']);
  $enc_batch_course_list_id = Crypt::encryptString($request['batch_course_list_id']);

  return redirect('course_coordinator/assign/single_course_with_batch/final_step_select_batch/'.$enc_student_database_id.'/'.$enc_trimester_id.'/'.$enc_batch_course_list_id);

/*
  $course_title_student=DB::table('batch_course_lists')->where('department_id','=',$request['department_id'])->where('id','=',$request['batch_course_list_id'])->value('course_title');

  $faculty_asigned_course_list=DB::table('regular_course_assign_to_faculties')->where('department_id','=',$request['department_id'])->where('trimester_id','=',$request['trimester_id'])->get();




  foreach ($faculty_asigned_course_list as $faculty_asigned_course) {
    //$course_title_faculty=DB::table('batch_course_lists')->where('department_id','=',$faculty_asigned_course->department_id)->where('id','=',$faculty_asigned_course->batch_course_list_id)->value('course_title');

    // if ($course_title_student==$course_title_faculty) {
      $course_version_id=DB::table('batches')->where('id','=',$faculty_asigned_course->batch_id)->where('department_id','=',$request['department_id'])->value('course_version_id');

      $assign=DB::table('regular_course_assign_to_students')->insert([
        'batch_course_list_id'=>$request['batch_course_list_id'],
        'student_id'=>$request['student_database_id'],
        'batch_id'=>$faculty_asigned_course->batch_id,
        'department_id'=>$request['department_id'],
        'trimester_id'=>$request['trimester_id'],
        'course_version_id'=>$course_version_id,
      ]);

      if($assign){
        Session::flash('course_assigned_with_batch');
        return redirect('course_coordinator/assign/single_course_with_batch/first_step');
      }
    //}
}
*/
}

public function assign_single_course_with_batch_to_student_final_step_select_batch($enc_student_database_id,$enc_trimester_id,$enc_batch_course_list_id){

  $dept_id=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_id');

  $student_database_id = Crypt::decryptString($enc_student_database_id);
  $trimester_id = Crypt::decryptString($enc_trimester_id);
  $batch_course_list_id = Crypt::decryptString($enc_batch_course_list_id);

  $course_title_student=DB::table('batch_course_lists')->where('id','=',$batch_course_list_id)->value('course_title');

  $faculty_asigned_course_list_details = DB::table('regular_course_assign_to_faculties')->where('department_id','=',$dept_id)->where('trimester_id','=',$trimester_id)->get();

  $faculty_asigned_course_list = array();

  foreach ($faculty_asigned_course_list_details as $faculty_asigned_course) {
    $course_title_faculty=DB::table('batch_course_lists')->where('id','=',$faculty_asigned_course->batch_course_list_id)->value('course_title');

  if ($course_title_student==$course_title_faculty) {
    $faculty_asigned_course_list[] = $faculty_asigned_course->id;
  }
  }
  //print_r($faculty_asigned_course_list);

  return view('course_coordinator.assign_single_course_to_student_final_step_select_batch',compact('student_database_id','trimester_id','dept_id','batch_course_list_id','faculty_asigned_course_list'));

}

public function assign_single_course_with_batch_to_student_final_step_select_batch_process(Request $request){

    $faculty_asigned_course_list_id = $request['faculty_asigned_course_list_id'];
    $faculty_asigned_course_list_id_details = DB::table('regular_course_assign_to_faculties')->where('id','=',$faculty_asigned_course_list_id)->first();

    $course_version_id=DB::table('batches')->where('id','=',$faculty_asigned_course_list_id_details->batch_id)->where('department_id','=',$request['department_id'])->value('course_version_id');

    $assign=DB::table('regular_course_assign_to_students')->insert([
      'batch_course_list_id'=>$faculty_asigned_course_list_id_details->batch_course_list_id,
      'student_id'=>$request['student_database_id'],
      'batch_id'=>$faculty_asigned_course_list_id_details->batch_id,
      'department_id'=>$request['department_id'],
      'trimester_id'=>$request['trimester_id'],
      'course_version_id'=>$course_version_id,
    ]);

    if($assign){
      Session::flash('course_assigned_with_batch');
      return redirect('course_coordinator/assign/single_course_with_batch/first_step');
    }

}

public function see_maximum_credit_hours_for_faculty(){

  $dept_id=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->value('department_id');
  $dept_maximum_credit_hours=DB::table('maximum_credit_hours_assign_to_faculties')->where('department_id','=',$dept_id)->value('maximum_credit_hours');

  return view('course_coordinator.see_maximum_credit_hours_for_faculty',compact('dept_id','dept_maximum_credit_hours'));
}

public function see_and_update_maximum_credit_hours_for_faculty_process(Request $request){


  //$rules = ['email' => 'exists:staff,email,account_id,1'];
  //$request['student_id'];


  $update=DB::table('maximum_credit_hours_assign_to_faculties')->where('department_id','=',$request['dept_id'])->update([
    'maximum_credit_hours'=>$request['dept_maximum_credit_hours'],

  ]);


    Session::flash('update_the_maximum_credit_hours');
    return redirect('/course_coordinator/see_maximum_credit_hours_for_faculty/first_step');



}


}
