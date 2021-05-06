<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
  //  return view('welcome');
  //  return view('homepage.index');
     return redirect('ems');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ems', 'HomepageController@ems')->name('');
Route::get('/permission', 'HomepageController@permission')->name('');
Route::get('/dashboard', 'Common_partController@dashboard')->name('');
Route::get('/update/profile', 'Common_partController@update_profile')->name('');
Route::post('/process/update/profile', 'Common_partController@process_update_profile')->name('');
Route::get('/update/profile/password', 'Common_partController@change_profile_password')->name('');
Route::post('/process/profile/password', 'Common_partController@process_profile_password')->name('');
Route::get('/update/profile/photo', 'Common_partController@change_profile_photo')->name('');
Route::post('/process/profile/photo', 'Common_partController@process_profile_photo')->name('');
Route::get('/registrar/all-user', 'RegistrarController@all_user')->name('');
Route::get('/registrar/view-user/{id}', 'RegistrarController@view_user')->name('');
Route::get('/registrar/create/department', 'RegistrarController@create_department')->name('');
Route::post('/registrar/create_process/department', 'RegistrarController@create_process_department')->name('');
Route::get('/registrar/all_department', 'RegistrarController@all_department')->name('');
Route::get('/registrar/update_department/{department_id}', 'RegistrarController@update_department')->name('');
Route::post('/registrar/update_department_process', 'RegistrarController@update_department_process')->name('');
Route::get('/registrar/all_batch', 'RegistrarController@all_batch')->name('');
Route::get('/registrar/update_batch/{batch_id}', 'RegistrarController@update_batch')->name('');

Route::post('/registrar/update_batch_process', 'RegistrarController@update_batch_process')->name('');

Route::get('/registrar/add/{role}', 'RegistrarController@add')->name('');
Route::post('/registrar/create_process/user', 'RegistrarController@create_process_user')->name('');
//Route::get('/registrar/create/student', 'RegistrarController@create_student')->name('');
Route::get('/registrar/create/batch', 'RegistrarController@create_batch')->name('');
Route::post('/registrar/create_process/batch', 'RegistrarController@create_process_batch')->name('');
Route::get('/registrar/create/trimester', 'RegistrarController@create_trimester')->name('');
Route::get('/registrar/process/trimester', 'RegistrarController@process_create_trimester')->name('');
Route::get('/registrar/view_all_student', 'RegistrarController@view_all_student')->name('');
Route::get('/registrar/update_student_information/{student_database_id}', 'RegistrarController@single_student_information_update')->name('');

Route::post('/registrar/update_student_information_process', 'RegistrarController@single_student_information_update_process')->name('');
Route::get('/registrar/view_all_faculty', 'RegistrarController@view_all_faculty')->name('');
Route::get('/registrar/update_faculty_information/{faculty_database_id}', 'RegistrarController@single_faculty_information_update')->name('');
Route::post('/registrar/update_faculty_information_process', 'RegistrarController@single_faculty_information_update_process')->name('');

// assign all request faculty by registrar_assign_request_status


Route::get('/registrar/view_regular_assign_courses/only_select_trimester', 'RegistrarController@view_regular_assign_courses_only_select_trimester')->name('');
Route::post('/registrar/view_regular_assign_courses/only_select_trimester_process', 'RegistrarController@view_regular_assign_courses_only_select_trimester_process')->name('');
Route::get('/registrar/view_regular_assign_courses/with_select_trimester/{trimester_id}', 'RegistrarController@view_regular_assign_courses_with_select_trimester')->name('');
Route::get('/registrar/assign_faculty_to_regular_course/{trimester_id}/{faculty_assign_id}', 'RegistrarController@assign_faculty_to_regular_course')->name('');
Route::post('/registrar/assign_faculty_to_regular_course_process', 'RegistrarController@assign_faculty_to_regular_course_process')->name('');
Route::get('/registrar/assign_faculty_finally_to_regular_course/{trimester_id}/{faculty_assign_id}', 'RegistrarController@assign_faculty_finally_to_regular_course')->name('');
Route::get('/registrar/send_to_registrar_for_assigning_faculty_to_regular_course/{trimester_id}/{faculty_assign_id}', 'RegistrarController@send_to_registrar_for_assigning_faculty_to_regular_course')->name('');
Route::post('/registrar/permission_for_allow_assign_more_regular_course_to_faculties', 'RegistrarController@permission_for_allow_assign_more_regular_course_to_faculties')->name('');

Route::get('/registrar/view_repeat_retake_assign_courses/only_select_trimester', 'RegistrarController@view_repeat_retake_assign_courses_only_select_trimester')->name('');
Route::post('/registrar/view_repeat_retake_assign_courses/only_select_trimester_process', 'RegistrarController@view_repeat_retake_assign_courses_only_select_trimester_process')->name('');
Route::get('/registrar/view_repeat_retake_assign_courses/with_select_trimester/{trimester_id}', 'RegistrarController@view_repeat_retake_assign_courses_with_select_trimester')->name('');
Route::get('/registrar/assign_faculty_to_repeat_retake_course/{trimester_id}/{faculty_assign_id}', 'RegistrarController@assign_faculty_to_repeat_retake_course')->name('');
Route::post('/registrar/assign_faculty_to_repeat_retake_course_process', 'RegistrarController@assign_faculty_to_repeat_retake_course_process')->name('');
Route::get('/registrar/send_to_registrar_for_assigning_faculty_to_repeat_retake_course/{trimester_id}/{faculty_assign_id}', 'RegistrarController@send_to_registrar_for_assigning_faculty_to_repeat_retake_course')->name('');
Route::get('/registrar/assign_faculty_finally_to_repeat_retake_course/{trimester_id}/{faculty_assign_id}', 'RegistrarController@assign_faculty_finally_to_repeat_retake_course')->name('');

Route::get('/registrar/view_supplementary_assign_courses/only_select_trimester', 'RegistrarController@view_supplementary_assign_courses_only_select_trimester')->name('');
Route::post('/registrar/view_supplementary_assign_courses/only_select_trimester_process', 'RegistrarController@view_supplementary_assign_courses_only_select_trimester_process')->name('');
Route::get('/registrar/view_supplementary_assign_courses/with_select_trimester/{trimester_id}', 'RegistrarController@view_supplementary_assign_courses_with_select_trimester')->name('');
Route::get('/registrar/assign_faculty_to_supplementary_course/{trimester_id}/{faculty_assign_id}', 'RegistrarController@assign_faculty_to_supplementary_course')->name('');
Route::post('/registrar/assign_faculty_to_supplementary_course_process', 'RegistrarController@assign_faculty_to_supplementary_course_process')->name('');
Route::get('/registrar/send_to_registrar_for_assigning_faculty_to_supplementary_course/{trimester_id}/{faculty_assign_id}', 'RegistrarController@send_to_registrar_for_assigning_faculty_to_supplementary_course')->name('');
Route::get('/registrar/assign_faculty_finally_to_supplementary_course/{trimester_id}/{faculty_assign_id}', 'RegistrarController@assign_faculty_finally_to_supplementary_course')->name('');



// Course Co Ordinator
Route::get('/course_coordinator/assign_regular_course_to_batch/first_step', 'Course_coordinatorController@assign_regular_course_to_batch_first_step')->name('');
Route::post('/course_coordinator/assign_regular_course_to_batch/first_step_process', 'Course_coordinatorController@assign_regular_course_to_batch_first_step_process')->name('');
Route::get('/course_coordinator/assign_regular_course_to_batch/first_step_process_2/{batch_id}/{trimester_id}', 'Course_coordinatorController@assign_regular_course_to_batch_first_step_process_2')->name('');
Route::get('/course_coordinator/assign_regular_course_to_batch/add_course/{batch_id}/{trimester_id}', 'Course_coordinatorController@assign_regular_course_to_batch_add_course')->name('');
Route::post('/course_coordinator/assign_regular_course_to_batch/add_course_process', 'Course_coordinatorController@assign_regular_course_to_batch_add_course_process')->name('');
Route::get('/course_coordinator/assign_regular_course_to_batch/remove_course/{batch_id}/{trimester_id}/{course_id}', 'Course_coordinatorController@assign_regular_course_to_batch_remove_course')->name('');
Route::post('/course_coordinator/assign_regular_course_to_batch/remove_course_process', 'Course_coordinatorController@assign_regular_course_to_batch_remove_course_process')->name('');

Route::get('/course_coordinator/assign_regular_course_to_batch/interchange_course/{batch_id}/{trimester_id}/{course_id}', 'Course_coordinatorController@assign_regular_course_to_batch_interchange_course')->name('');
Route::post('/course_coordinator/assign_regular_course_to_batch/interchange_course_process', 'Course_coordinatorController@assign_regular_course_to_batch_interchange_course_process')->name('');

Route::get('/course_coordinator/assign_regular_course_to_batch/final_step/{batch_id}/{trimester_id}', 'Course_coordinatorController@assign_regular_course_to_batch_final_step')->name('');

Route::get('/course_coordinator/assign/repeat_retake_course/student/first_step', 'Course_coordinatorController@assign_repeat_retake_course_to_student_first_step')->name('');
Route::post('course_coordinator/assign/repeat_retake_course/student/first_step_process', 'Course_coordinatorController@assign_repeat_retake_course_to_student_first_step_process')->name('');
Route::get('/course_coordinator/assign/repeat_retake_course/student/final_step/{student_database_id}/{trimester_id}', 'Course_coordinatorController@assign_repeat_retake_course_to_student_final_step')->name('');
Route::post('/course_coordinator/assign/repeat_retake_course/student/final_step_process', 'Course_coordinatorController@assign_repeat_retake_course_to_student_final_step_process')->name('');
Route::get('/course_coordinator/assign/repeat_retake_course/student/final_step_select_batch/{student_database_id}/{trimester_id}/{course_id}', 'Course_coordinatorController@assign_repeat_retake_course_to_student_final_step_select_batch')->name('');
Route::post('/course_coordinator/assign/repeat_retake_course/student/final_step_select_batch_process', 'Course_coordinatorController@assign_repeat_retake_course_to_student_final_step_select_batch_process')->name('');

Route::get('/course_coordinator/assign/supplemetary_exam/first_step', 'Course_coordinatorController@assign_supplementary_exam_first_step')->name('');
Route::post('/course_coordinator/assign/supplementary_exam/first_step_process', 'Course_coordinatorController@assign_supplementary_exam_first_step_process')->name('');
Route::get('/course_coordinator/assign/supplemetary_exam/final_step/{student_database_id}/{trimester_id}', 'Course_coordinatorController@assign_supplementary_exam_final_step')->name('');
Route::post('/course_coordinator/assign/supplemetary_exam/final_step_process', 'Course_coordinatorController@assign_supplementary_exam_final_step_process')->name('');


//Route::get('/course_coordinator/view_regular_assign_courses_type/{trimester_id}/{course_type}', 'Course_coordinatorController@view_regular_assign_courses_type')->name('');
Route::get('/course_coordinator/view_regular_assign_courses/only_select_trimester', 'Course_coordinatorController@view_regular_assign_courses_only_select_trimester')->name('');
Route::post('/course_coordinator/view_regular_assign_courses/only_select_trimester_process', 'Course_coordinatorController@view_regular_assign_courses_only_select_trimester_process')->name('');
Route::get('/course_coordinator/view_regular_assign_courses/with_select_trimester/{trimester_id}', 'Course_coordinatorController@view_regular_assign_courses_with_select_trimester')->name('');
Route::get('/course_coordinator/assign_faculty_to_regular_course/{trimester_id}/{faculty_assign_id}', 'Course_coordinatorController@assign_faculty_to_regular_course')->name('');
Route::post('/course_coordinator/assign_faculty_to_regular_course_process', 'Course_coordinatorController@assign_faculty_to_regular_course_process')->name('');
Route::get('/course_coordinator/assign_faculty_finally_to_regular_course/{trimester_id}/{faculty_assign_id}', 'Course_coordinatorController@assign_faculty_finally_to_regular_course')->name('');
Route::get('/course_coordinator/send_to_registrar_for_assigning_faculty_to_regular_course/{trimester_id}/{faculty_assign_id}', 'Course_coordinatorController@send_to_registrar_for_assigning_faculty_to_regular_course')->name('');
Route::post('/course_coordinator/permission_for_allow_assign_more_regular_course_to_faculties', 'Course_coordinatorController@permission_for_allow_assign_more_regular_course_to_faculties')->name('');

Route::get('/course_coordinator/view_repeat_retake_assign_courses/only_select_trimester', 'Course_coordinatorController@view_repeat_retake_assign_courses_only_select_trimester')->name('');
Route::post('/course_coordinator/view_repeat_retake_assign_courses/only_select_trimester_process', 'Course_coordinatorController@view_repeat_retake_assign_courses_only_select_trimester_process')->name('');
Route::get('/course_coordinator/view_repeat_retake_assign_courses/with_select_trimester/{trimester_id}', 'Course_coordinatorController@view_repeat_retake_assign_courses_with_select_trimester')->name('');
Route::get('/course_coordinator/assign_faculty_to_repeat_retake_course/{trimester_id}/{faculty_assign_id}', 'Course_coordinatorController@assign_faculty_to_repeat_retake_course')->name('');
Route::post('/course_coordinator/assign_faculty_to_repeat_retake_course_process', 'Course_coordinatorController@assign_faculty_to_repeat_retake_course_process')->name('');
Route::get('/course_coordinator/send_to_registrar_for_assigning_faculty_to_repeat_retake_course/{trimester_id}/{faculty_assign_id}', 'Course_coordinatorController@send_to_registrar_for_assigning_faculty_to_repeat_retake_course')->name('');
Route::get('/course_coordinator/assign_faculty_finally_to_repeat_retake_course/{trimester_id}/{faculty_assign_id}', 'Course_coordinatorController@assign_faculty_finally_to_repeat_retake_course')->name('');

Route::get('/course_coordinator/view_supplementary_assign_courses/only_select_trimester', 'Course_coordinatorController@view_supplementary_assign_courses_only_select_trimester')->name('');
Route::post('/course_coordinator/view_supplementary_assign_courses/only_select_trimester_process', 'Course_coordinatorController@view_supplementary_assign_courses_only_select_trimester_process')->name('');
Route::get('/course_coordinator/view_supplementary_assign_courses/with_select_trimester/{trimester_id}', 'Course_coordinatorController@view_supplementary_assign_courses_with_select_trimester')->name('');
Route::get('/course_coordinator/assign_faculty_to_supplementary_course/{trimester_id}/{faculty_assign_id}', 'Course_coordinatorController@assign_faculty_to_supplementary_course')->name('');
Route::post('/course_coordinator/assign_faculty_to_supplementary_course_process', 'Course_coordinatorController@assign_faculty_to_supplementary_course_process')->name('');
Route::get('/course_coordinator/send_to_registrar_for_assigning_faculty_to_supplementary_course/{trimester_id}/{faculty_assign_id}', 'Course_coordinatorController@send_to_registrar_for_assigning_faculty_to_supplementary_course')->name('');
Route::get('/course_coordinator/assign_faculty_finally_to_supplementary_course/{trimester_id}/{faculty_assign_id}', 'Course_coordinatorController@assign_faculty_finally_to_supplementary_course')->name('');


Route::get('/course_coordinator/assign/regular_course/faculty/first_step', 'Course_coordinatorController@assign_regular_departmental_course_to_faculty')->name('');
Route::post('/course_coordinator/assign/regular_course/faculty/first_step_process', 'Course_coordinatorController@assign_regular_course_to_faculty_first_step_process')->name('');
Route::get('/course_coordinator/assign/regular_course/faculty/final_step/{faculty_department}/{course_edition}', 'Course_coordinatorController@assign_regular_course_to_faculty_final_step')->name('');
Route::post('/course_coordinator/assign/regular_course/faculty/final_step_process', 'Course_coordinatorController@assign_regular_course_to_faculty_final_step_process')->name('');

Route::get('/course_coordinator/assign/regular_course/student/first_step', 'Course_coordinatorController@assign_regular_course_to_student_first_step')->name('');
Route::post('/course_coordinator/assign/regular_course/student/first_step_process', 'Course_coordinatorController@assign_regular_course_to_student_first_step_process')->name('');
Route::get('/course_coordinator/assign/regular_course/student/final_step/{course_edition}', 'Course_coordinatorController@assign_regular_course_to_student_final_step')->name('');
Route::post('/course_coordinator/assign/regular_course/student/final_step_process', 'Course_coordinatorController@assign_regular_course_to_student_final_step_process')->name('');
Route::post('/course_coordinator/assign/regular_course/student/final_step_temporary', 'Course_coordinatorController@temp_assign_regular_course_to_student_final_step')->name('');



Route::get('/course_coordinator/assign/single_course_with_batch/first_step', 'Course_coordinatorController@assign_single_course_with_batch_first_step')->name('');
Route::post('/course_coordinator/assign/single_course_with_batch/first_step_process', 'Course_coordinatorController@assign_single_course_with_batch_first_step_process')->name('');
Route::get('/course_coordinator/assign/single_course_with_batch/final_step/{student_database_id}/{trimester_id}', 'Course_coordinatorController@assign_single_course_with_batch_final_step')->name('');
Route::post('/course_coordinator/assign/single_course_with_batch/final_step_process', 'Course_coordinatorController@assign_single_course_with_batch_final_step_process')->name('');
Route::get('/course_coordinator/assign/single_course_with_batch/final_step_select_batch/{student_database_id}/{trimester_id}/{course_id}', 'Course_coordinatorController@assign_single_course_with_batch_to_student_final_step_select_batch')->name('');
Route::post('/course_coordinator/assign/single_course_with_batch/final_step_select_batch_process', 'Course_coordinatorController@assign_single_course_with_batch_to_student_final_step_select_batch_process')->name('');

Route::get('/course_coordinator/see_maximum_credit_hours_for_faculty/first_step', 'Course_coordinatorController@see_maximum_credit_hours_for_faculty')->name('');
Route::post('/course_coordinator/assign/see_and_update_maximum_credit_hours_for_faculty_process', 'Course_coordinatorController@see_and_update_maximum_credit_hours_for_faculty_process')->name('');


//faculty

//regular

Route::get('/faculty/view_regular_assign_courses/only_select_trimester', 'FacultyController@view_regular_assign_courses_only_select_trimester')->name('');
Route::post('/faculty/view_regular_assign_courses/only_select_trimester_process', 'FacultyController@view_regular_assign_courses_only_select_trimester_process')->name('');
Route::get('/faculty/view_regular_assign_courses/with_select_trimester/{trimester_id}', 'FacultyController@view_regular_assign_courses_with_select_trimester')->name('');
Route::get('/faculty/view_regular_assigned_course_marks_sheet/{batch_course_list_id}/{batch_id}/{trimester_id}', 'FacultyController@faculty_see_regular_assigned_course_marks_sheet')->name('');
Route::get('/faculty/view_single_student_regular_course_mark_sheet/{course_assigned_id}/{type}', 'FacultyController@faculty_view_single_student_regular_course_mark_sheet')->name('');

Route::post('/faculty/update_single_student_regular_course_mark_sheet', 'FacultyController@faculty_update_single_student_regular_course_mark_sheet')->name('');
Route::get('/faculty/final_submit_regular_assigned_course_marks_sheet/{batch_course_list_id}/{batch_id}/{trimester_id}', 'FacultyController@faculty_final_submit_regular_assigned_course_marks_sheet')->name('');

// repeat

Route::get('/faculty/view_repeat_retake_assign_courses/only_select_trimester', 'FacultyController@view_repeat_retake_assign_courses_only_select_trimester')->name('');
Route::post('/faculty/view_repeat_retake_assign_courses/only_select_trimester_process', 'FacultyController@view_repeat_retake_assign_courses_only_select_trimester_process')->name('');
Route::get('/faculty/view_repeat_retake_assign_courses/with_select_trimester/{trimester_id}', 'FacultyController@view_repeat_retake_assign_courses_with_select_trimester')->name('');

Route::get('/faculty/view_repeat_retake_assigned_course_marks_sheet/{faculty_assign_id}', 'FacultyController@faculty_see_repeat_retake_assigned_course_marks_sheet')->name('');
Route::get('/faculty/view_single_student_repeat_retake_course_mark_sheet/{course_assigned_id}/{faculty_assign_id}', 'FacultyController@faculty_view_single_student_repeat_retake_course_mark_sheet')->name('');
Route::post('/faculty/update_single_student_repeat_retake_course_mark_sheet', 'FacultyController@faculty_update_single_student_repeat_retake_course_mark_sheet')->name('');
Route::get('/faculty/final_submit_repeat_retake_assigned_course_marks_sheet/{faculty_assign_id}', 'FacultyController@faculty_final_submit_repeat_retake_assigned_course_marks_sheet')->name('');

// supplementary

Route::get('/faculty/view_supplementary_assign_courses/only_select_trimester', 'FacultyController@view_supplementary_assign_courses_only_select_trimester')->name('');
Route::post('/faculty/view_supplementary_assign_courses/only_select_trimester_process', 'FacultyController@view_supplementary_assign_courses_only_select_trimester_process')->name('');
Route::get('/faculty/view_supplementary_assign_courses/with_select_trimester/{trimester_id}', 'FacultyController@view_supplementary_assign_courses_with_select_trimester')->name('');
Route::get('/faculty/view_supplementary_assigned_course_marks_sheet/{faculty_assign_id}', 'FacultyController@faculty_see_supplementary_assigned_course_marks_sheet')->name('');
Route::get('/faculty/view_single_student_supplementary_course_mark_sheet/{course_assigned_id}/{faculty_assign_id}', 'FacultyController@faculty_view_single_student_supplementary_course_mark_sheet')->name('');
Route::post('/faculty/update_single_student_supplementary_course_mark_sheet', 'FacultyController@faculty_update_single_student_supplementary_course_mark_sheet')->name('');
Route::get('/faculty/final_submit_supplementary_assigned_course_marks_sheet/{faculty_assign_id}', 'FacultyController@faculty_final_submit_supplementary_assigned_course_marks_sheet')->name('');

//
Route::get('/faculty/see/assigned_course', 'FacultyController@faculty_see_assigned_course')->name('');
Route::get('/faculty/see/course_marks_sheet/{course_assigned_id}', 'FacultyController@faculty_see_course_marks_sheet')->name('');
Route::get('/faculty/see/single_course_marks_sheet/{single_course_assigned_id}/{type}/{course_assigned_id}', 'FacultyController@faculty_see_single_course_marks_sheet')->name('');
Route::post('/faculty/see/single_course_marks_sheet_process', 'FacultyController@faculty_see_single_course_marks_sheet_process')->name('');
Route::get('/faculty/final_submission/course_marks_sheet/{course_assigned_id}', 'FacultyController@faculty_final_submission_course_marks_sheet')->name('');

//send mark update information to faculty
Route::get('/faculty/mark_updated_by_exam_controller_information', 'FacultyController@mark_updated_by_exam_controller_information')->name('');


// Exam Controller
// Regular

Route::get('/exam_controller/view_regular_assign_courses/only_select_trimester', 'Exam_controllerController@view_regular_assign_courses_only_select_trimester')->name('');
Route::post('/exam_controller/view_regular_assign_courses/only_select_trimester_process', 'Exam_controllerController@view_regular_assign_courses_only_select_trimester_process')->name('');
Route::get('/exam_controller/view_regular_assign_courses/with_select_trimester/{trimester_id}', 'Exam_controllerController@view_regular_assign_courses_with_select_trimester')->name('');
Route::get('/exam_controller/view_regular_assigned_course_marks_sheet/{batch_id}/{trimester_id}', 'Exam_controllerController@exam_controller_see_regular_assigned_course_marks_sheet')->name('');
Route::get('/exam_controller/view_single_student_regular_course_mark_sheet/{course_assigned_id}/{type}', 'Exam_controllerController@exam_controller_view_single_student_regular_course_mark_sheet')->name('');
Route::post('/exam_controller/update_single_student_regular_course_mark_sheet', 'Exam_controllerController@exam_controller_update_single_student_regular_course_mark_sheet')->name('');

// Repeat

Route::get('/exam_controller/view_repeat_retake_assign_courses/only_select_trimester', 'Exam_controllerController@view_repeat_retake_assign_courses_only_select_trimester')->name('');
Route::post('/exam_controller/view_repeat_retake_assign_courses/only_select_trimester_process', 'Exam_controllerController@view_repeat_retake_assign_courses_only_select_trimester_process')->name('');
Route::get('/exam_controller/view_repeat_retake_assign_courses/with_select_trimester/{trimester_id}', 'Exam_controllerController@view_repeat_retake_assign_courses_with_select_trimester')->name('');
Route::get('/exam_controller/view_repeat_retake_assigned_course_marks_sheet/{faculty_assign_id}', 'Exam_controllerController@exam_controller_see_repeat_retake_assigned_course_marks_sheet')->name('');
Route::get('/exam_controller/view_single_student_repeat_retake_course_mark_sheet/{course_assigned_id}/{faculty_assign_id}', 'Exam_controllerController@exam_controller_view_single_student_repeat_retake_course_mark_sheet')->name('');
Route::post('/exam_controller/update_single_student_repeat_retake_course_mark_sheet', 'Exam_controllerController@exam_controller_update_single_student_repeat_retake_course_mark_sheet')->name('');

// Supplementary

Route::get('/exam_controller/view_supplementary_assign_courses/only_select_trimester', 'Exam_controllerController@view_supplementary_assign_courses_only_select_trimester')->name('');
Route::post('/exam_controller/view_supplementary_assign_courses/only_select_trimester_process', 'Exam_controllerController@view_supplementary_assign_courses_only_select_trimester_process')->name('');
Route::get('/exam_controller/view_supplementary_assign_courses/with_select_trimester/{trimester_id}', 'Exam_controllerController@view_supplementary_assign_courses_with_select_trimester')->name('');
Route::get('/exam_controller/view_supplementary_assigned_course_marks_sheet/{faculty_assign_id}', 'Exam_controllerController@exam_controller_see_supplementary_assigned_course_marks_sheet')->name('');
Route::get('/exam_controller/view_single_student_supplementary_course_mark_sheet/{course_assigned_id}/{faculty_assign_id}', 'Exam_controllerController@exam_controller_view_single_student_supplementary_course_mark_sheet')->name('');
Route::post('/exam_controller/update_single_student_supplementary_course_mark_sheet', 'Exam_controllerController@exam_controller_update_single_student_supplementary_course_mark_sheet')->name('');

// Publish result

Route::get('/exam_controller/view_trimester_for_publish_result', 'Exam_controllerController@view_trimester_for_publish_result')->name('');
Route::post('/exam_controller/publish_trimester_result', 'Exam_controllerController@publish_trimester_result')->name('');

// See unsubmit marksheet

Route::get('/exam_controller/view_unsubmit_marksheets/only_select_trimester', 'Exam_controllerController@view_unsubmit_marksheets_only_select_trimester')->name('');
Route::post('/exam_controller/view_unsubmit_marksheets/only_select_trimester_process', 'Exam_controllerController@view_unsubmit_marksheets_only_select_trimester_process')->name('');
Route::get('/exam_controller/view_unsubmit_marksheets/with_select_trimester/{trimester_id}', 'Exam_controllerController@view_unsubmit_marksheets_with_select_trimester')->name('');

// Student

Route::get('/student/view_trimester_result/only_select_trimester', 'StudentController@view_trimester_result_only_select_trimester')->name('');
Route::post('/student/view_trimester_result/only_select_trimester_process', 'StudentController@view_trimester_result_only_select_trimester_process')->name('');

Route::get('/student/view_trimester_result/with_select_trimester/{trimester_id}', 'StudentController@view_trimester_result_with_select_trimester')->name('');
Route::get('/student/view_all_the_completed_trimester_result', 'StudentController@view_all_the_completed_trimester_result')->name('');
Route::get('/student/view_total_remaining_credit_hours', 'StudentController@view_total_remaining_credit_hours')->name('');


Route::get('data', 'RegistrarController@data')->name('');
