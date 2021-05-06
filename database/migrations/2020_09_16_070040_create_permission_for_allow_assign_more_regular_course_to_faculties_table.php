<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionForAllowAssignMoreRegularCourseToFacultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_for_allow_assign_more_regular_course_to_faculties', function (Blueprint $table) {
            $table->id();
            $table->string('faculty_assign_id');
            $table->string('faculty_id');
            $table->string('trimester_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_for_allow_assign_more_regular_course_to_faculties');
    }
}
