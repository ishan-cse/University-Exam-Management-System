<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporaryRegularCourseAssignToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporary_regular_course_assign_to_students', function (Blueprint $table) {
          $table->id()->unique();
          $table->string('course_title',150);
          $table->string('batch_id',100);
          $table->string('student_id');
          $table->string('department_id',150);
          $table->string('trimester_name',150);
          $table->string('edition_no',100);
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temporary_regular_course_assign_to_students');
    }
}
