<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchCourseListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch_course_lists', function (Blueprint $table) {
            $table->id();
            $table->string('course_code',150);
            $table->string('course_title',150);
            $table->double('credit_hours');
            $table->string('course_version_id',100);
            $table->string('level_term',150)->nullable();
            $table->string('batch_id',150);
            $table->string('department_id',150);
            $table->integer('departmental_course_status',1);
            $table->integer('complete_status')->default(0);
            $table->string('prerequisite_course_code_1',150)->nullable();
            $table->string('prerequisite_course_code_2',150)->nullable();
            $table->string('prerequisite_course_code_3',150)->nullable();
            $table->string('prerequisite_course_code_4',150)->nullable();
            $table->string('prerequisite_course_code_5',150)->nullable();
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
        Schema::dropIfExists('batch_course_lists');
    }
}
