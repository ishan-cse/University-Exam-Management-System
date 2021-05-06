<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Session;
use Image;
use Auth;

class Common_partController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function dashboard(){

    if(Auth::user()->role_name=='Student'){
        $data=DB::table('students')->where('id','=',Auth::user()->id)->first();
        return view('homepage.profile',compact('data'));
    }
    elseif(Auth::user()->role_name=='Course Coordinator'){
        $data=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->first();
        return view('homepage.profile',compact('data'));
    }
    elseif(Auth::user()->role_name=='Faculty'){
        $data=DB::table('faculties')->where('id','=',Auth::user()->id)->first();
        return view('homepage.profile',compact('data'));
    }
    elseif(Auth::user()->role_name=='Registrar'){
        $data=DB::table('registrars')->where('id','=',Auth::user()->id)->first();
        return view('homepage.profile',compact('data'));
    }
    elseif(Auth::user()->role_name=='Exam Controller'){
        $data=DB::table('exam_controllers')->where('id','=',Auth::user()->id)->first();
        return view('homepage.profile',compact('data'));
    }

  }

  public function update_profile(){

    if(Auth::user()->role_name=='Student'){
        $data=DB::table('students')->where('id','=',Auth::user()->id)->first();
        return view('homepage.update_profile',compact('data'));
    }
    elseif(Auth::user()->role_name=='Course Coordinator'){
        $data=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->first();
        return view('homepage.update_profile',compact('data'));
    }
    elseif(Auth::user()->role_name=='Faculty'){
        $data=DB::table('faculties')->where('id','=',Auth::user()->id)->first();
        return view('homepage.update_profile',compact('data'));
    }
    elseif(Auth::user()->role_name=='Registrar'){
        $data=DB::table('registrars')->where('id','=',Auth::user()->id)->first();
        return view('homepage.update_profile',compact('data'));
    }
    elseif(Auth::user()->role_name=='Exam Controller'){
        $data=DB::table('exam_controllers')->where('id','=',Auth::user()->id)->first();
        return view('homepage.update_profile',compact('data'));
    }
  }

  public function process_update_profile(Request $request){

    $this->validate($request,[
    //  'name' => ['required', 'string', 'max:255'],
    //  'id' => ['required', 'string', 'max:20', 'unique:users'],
    //  'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //  'password' => ['required', 'string', 'min:8', 'confirmed'],
    ],[

    ]);


    DB::table('users')->where('id','=',$request['id'])->update([
      'name'=>$request['name'],
    ]);

    if(Auth::user()->role_name=='Student') {
      $update=DB::table('students')->where('id','=',$request['id'])->update([
        'name'=>$request['name'],
        'phone'=>$request['phone'],
        'address'=>$request['address'],
        'nid'=>$request['nid'],
        'birth_certificate_no'=>$request['birth_certificate_no'],
        'psc_result'=>$request['psc_result'],
        'jsc_result'=>$request['jsc_result'],
        'ssc_result'=>$request['ssc_result'],
        'hsc_result'=>$request['hsc_result'],
        'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
      ]);
    }
    elseif(Auth::user()->role_name=='Faculty') {
      $update=DB::table('faculties')->where('id','=',$request['id'])->update([
        'name'=>$request['name'],
        'phone'=>$request['phone'],
        'address'=>$request['address'],
        'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
      ]);
    }
    elseif(Auth::user()->role_name=='Course Coordinator') {
      $update=DB::table('course_coordinators')->where('id','=',$request['id'])->update([
        'name'=>$request['name'],
        'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
      ]);
    }
    elseif(Auth::user()->role_name=='Registrar') {
      $update=DB::table('registrars')->where('id','=',$request['id'])->update([
        'name'=>$request['name'],
        'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
      ]);
    }
    elseif($request['role_name']=='Exam Controller') {
      $update=DB::table('exam_controllers')->where('id','=',$request['id'])->update([
        'name'=>$request['name'],
        'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
      ]);
    }


    if($update){
        Session::flash('success');
        return redirect('update/profile');
    }
  }


  public function change_profile_password(){

        if(Auth::user()->role_name=='Student'){
            $data=DB::table('students')->where('id','=',Auth::user()->id)->first();
            return view('homepage.change_password',compact('data'));
        }
        elseif(Auth::user()->role_name=='Course Coordinator'){
            $data=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->first();
            return view('homepage.change_password',compact('data'));
        }
        elseif(Auth::user()->role_name=='Faculty'){
            $data=DB::table('faculties')->where('id','=',Auth::user()->id)->first();
            return view('homepage.change_password',compact('data'));
        }
        elseif(Auth::user()->role_name=='Registrar'){
            $data=DB::table('registrars')->where('id','=',Auth::user()->id)->first();
            return view('homepage.change_password',compact('data'));
        }
        elseif(Auth::user()->role_name=='Exam Controller'){
            $data=DB::table('exam_controllers')->where('id','=',Auth::user()->id)->first();
            return view('homepage.change_password',compact('data'));
        }
  }

  public function process_profile_password(Request $request){

        $this->validate($request,[
          'password' => ['required', 'string', 'min:8', 'confirmed'],
          'current_password' => ['required'],
        ],[

        ]);

        $pass=DB::table('users')->where('id','=',$request['id'])->value('password');

        $current_password=Hash::make($request['current_password']);
//Hash::check() has two parameters first one is plane password and another is hashed password.
//If password matched with hash it will return true
        if(Hash::check($request['current_password'],$pass)==1){

            DB::table('users')->where('id','=',$request['id'])->update([
              'password'=>Hash::make($request['password']),
              'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
            ]);
           }
       else {
            Session::flash('wrong');
            return redirect('update/profile/password');
       }

        if(Auth::user()->role_name=='Student') {

          $pass1=DB::table('students')->where('id','=',$request['id'])->value('password');

        if(Hash::check($request['current_password'],$pass1)==1){
          $update=DB::table('students')->where('id','=',$request['id'])->update([
            'password'=>Hash::make($request['password']),
            'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
          ]);

            if($update){
                Session::flash('success');
                return redirect('update/profile/password');
            }
           }

        else {
             Session::flash('wrong');
             return redirect('update/profile/password');
             }
        }

        elseif(Auth::user()->role_name=='Faculty') {

        $pass2=DB::table('faculties')->where('id','=',$request['id'])->value('password');

          if(Hash::check($request['current_password'],$pass2)==1){

          $update=DB::table('faculties')->where('id','=',$request['id'])->update([
            'password'=>Hash::make($request['password']),
            'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
          ]);

              if($update){
                  Session::flash('success');
                  return redirect('update/profile/password');
              }

            }
          else {
               Session::flash('wrong');
               return redirect('update/profile/password');
               }
        }

        elseif(Auth::user()->role_name=='Course Coordinator') {

        $pass3=DB::table('course_coordinators')->where('id','=',$request['id'])->value('password');

        if(Hash::check($request['current_password'],$pass3)==1){

          $update=DB::table('course_coordinators')->where('id','=',$request['id'])->update([
            'password'=>Hash::make($request['password']),
            'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
          ]);

          if($update){
              Session::flash('success');
              return redirect('update/profile/password');
          }

        }
        else {
             Session::flash('wrong');
             return redirect('update/profile/password');
             }
        }

        elseif($request['role_name']=='Registrar') {

        $pass4=DB::table('registrars')->where('id','=',$request['id'])->value('password');

        if(Hash::check($request['current_password'],$pass4)==1){

          $update=DB::table('registrars')->where('id','=',$request['id'])->update([
            'password'=>Hash::make($request['password']),
            'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
          ]);

          if($update){
              Session::flash('success');
              return redirect('update/profile/password');
          }

        }
        else {
             Session::flash('wrong');
             return redirect('update/profile/password');
             }
        }

        elseif($request['role_name']=='Exam Controller') {

          $pass5=DB::table('exam_controllers')->where('id','=',$request['id'])->value('password');

          if(Hash::check($request['current_password'],$pass5)==1){

          $update=DB::table('exam_controllers')->where('id','=',$request['id'])->update([
            'password'=>Hash::make($request['password']),
            'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
          ]);

          if($update){
              Session::flash('success');
              return redirect('update/profile/password');
          }

        }
        else {
             Session::flash('wrong');
             return redirect('update/profile/password');
             }
        }

  }

  public function change_profile_photo(){

        if(Auth::user()->role_name=='Student'){
            $data=DB::table('students')->where('id','=',Auth::user()->id)->first();
            return view('homepage.upload_photo',compact('data'));
        }
        elseif(Auth::user()->role_name=='Course Coordinator'){
            $data=DB::table('course_coordinators')->where('id','=',Auth::user()->id)->first();
            return view('homepage.upload_photo',compact('data'));
        }
        elseif(Auth::user()->role_name=='Faculty'){
            $data=DB::table('faculties')->where('id','=',Auth::user()->id)->first();
            return view('homepage.upload_photo',compact('data'));
        }
        elseif(Auth::user()->role_name=='Registrar'){
            $data=DB::table('registrars')->where('id','=',Auth::user()->id)->first();
            return view('homepage.upload_photo',compact('data'));
        }
        elseif(Auth::user()->role_name=='Exam Controller'){
            $data=DB::table('exam_controllers')->where('id','=',Auth::user()->id)->first();
            return view('homepage.upload_photo',compact('data'));
        }
  }

  public function process_profile_photo(Request $request){

            if(Auth::user()->role_name=='Student') {

              if($request->hasFile('image_name')){
                $image=$request->file('image_name');
                $imageName='student-'.$request['id'].'-'.time().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(85,85)->save('uploads/Student/'.$imageName);
              }
              else {
                $imageName='';
              }

              DB::table('users')->where('id','=',$request['id'])->update([
                'image_name'=>$imageName,
                'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
              ]);

              $update=DB::table('students')->where('id','=',$request['id'])->update([
                'image_name'=>$imageName,
                'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
              ]);
            }

            elseif(Auth::user()->role_name=='Faculty') {

              if($request->hasFile('image_name')){
                $image=$request->file('image_name');
                $imageName='faculty-'.$request['id'].'-'.time().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(85,85)->save('uploads/Faculty/'.$imageName);
              }
              else {
                $imageName='';
              }

              DB::table('users')->where('id','=',$request['id'])->update([
                'image_name'=>$imageName,
                'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
              ]);

              $update=DB::table('faculties')->where('id','=',$request['id'])->update([
                'image_name'=>$imageName,
                'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
              ]);
            }

            elseif(Auth::user()->role_name=='Course Coordinator') {

              if($request->hasFile('image_name')){
                $image=$request->file('image_name');
                $imageName='course_coordinator-'.$request['id'].'-'.time().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(85,85)->save('uploads/Course Coordinator/'.$imageName);
              }
              else {
                $imageName='';
              }

              DB::table('users')->where('id','=',$request['id'])->update([
                'image_name'=>$imageName,
                'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
              ]);

              $update=DB::table('course_coordinators')->where('id','=',$request['id'])->update([
                'image_name'=>$imageName,
                'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
              ]);
            }

            elseif(Auth::user()->role_name=='Registrar') {

              if($request->hasFile('image_name')){
                $image=$request->file('image_name');
                $imageName='registrar-'.$request['id'].'-'.time().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(85,85)->save('uploads/Registrar/'.$imageName);
              }
              else {
                $imageName='';
              }

              DB::table('users')->where('id','=',$request['id'])->update([
                'image_name'=>$imageName,
                'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
              ]);

              $update=DB::table('registrars')->where('id','=',$request['id'])->update([
                'image_name'=>$imageName,
                'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
              ]);
            }

            elseif($request['role_name']=='Exam Controller') {

              if($request->hasFile('image_name')){
                $image=$request->file('image_name');
                $imageName='exam_controller-'.$request['id'].'-'.time().'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(85,85)->save('uploads/Exam Controller/'.$imageName);
              }
              else {
                $imageName='';
              }

              DB::table('users')->where('id','=',$request['id'])->update([
                'image_name'=>$imageName,
                'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
              ]);

              $update=DB::table('exam_controllers')->where('id','=',$request['id'])->update([
                'image_name'=>$imageName,
                'updated_at'=>Carbon::now('Asia/Dhaka')->toDateTimeString(),
              ]);
            }


            if($update){
                Session::flash('success');
                return redirect('update/profile/photo');
            }
        }
}
