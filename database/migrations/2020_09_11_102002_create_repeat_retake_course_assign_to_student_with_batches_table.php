<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepeatRetakeCourseAssignToStudentWithBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repeat_retake_course_assign_to_student_with_batches', function (Blueprint $table) {
          $table->id()->unique();
          $table->string('batch_course_list_id',150);
          $table->string('student_id');
          $table->string('batch_id',150);
          $table->string('department_id',150);
          $table->string('trimester_id',150);
          $table->double('attendance_marks')->nullable();
          $table->integer('attendance_marks_attend_status')->default(0);
          $table->double('assignment_and_presentation_marks')->nullable();
          $table->integer('assignment_and_presentation_marks_attend_status')->default(0);
          $table->double('quiz_marks')->nullable();
          $table->integer('quiz_marks_attend_status')->default(0);
          $table->double('mid_term_marks')->nullable();
          $table->integer('mid_term_marks_attend_status')->default(0);
          $table->double('final_marks')->nullable();
          $table->integer('final_marks_attend_status')->default(0);
          $table->double('total_marks')->nullable();
          $table->double('gpa')->nullable();
          $table->string('grade')->nullable();
          $table->integer('faculty_final_submit_status')->default(0);
          $table->integer('result_publish_status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repeat_retake_course_assign_to_student_with_batches');
    }
}
