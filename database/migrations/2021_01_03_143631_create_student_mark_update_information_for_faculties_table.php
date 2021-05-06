<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentMarkUpdateInformationForFacultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_mark_update_information_for_faculties', function (Blueprint $table) {
            $table->id();
            $table->string('faculty_id');
            $table->string('student_id');
            $table->string('batch_course_list_id');
            $table->string('course_type');
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
        Schema::dropIfExists('student_mark_update_information_for_faculties');
    }
}
