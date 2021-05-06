<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignSupplementaryExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_supplementary_exams', function (Blueprint $table) {
          $table->id()->unique();
          $table->string('batch_course_list_id',150);
          $table->string('student_id');
          $table->string('faculty_id',150)->nullable();
          $table->string('department_id',150);
          $table->string('trimester_id',150);
          $table->double('seventy_percentage_marks')->nullable();
          $table->integer('seventy_percentage_marks_attend_status')->default(0);
          $table->integer('registrar_assign_request_status')->default(0);
          $table->integer('faculty_finally_assign_status')->default(0);
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
        Schema::dropIfExists('assign_supplementary_exams');
    }
}
