<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegularCourseAssignToFacultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regular_course_assign_to_faculties', function (Blueprint $table) {
          $table->id()->unique();
          $table->string('batch_course_list_id',150);
          $table->string('batch_id',100);
          $table->string('faculty_id')->nullable();
          $table->string('department_id',150);
          $table->string('trimester_id',150);
          $table->string('course_version_id',100);
          $table->integer('registrar_assign_request_status')->default(0);
          $table->integer('faculty_finally_assign_status')->default(0);
          $table->integer('faculty_final_submit_status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regular_course_assign_to_faculties');
    }
}
