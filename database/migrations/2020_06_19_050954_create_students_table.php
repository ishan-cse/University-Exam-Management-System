<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
          $table->id()->unique();
          $table->string('uni_id')->unique()->nullable();
          $table->string('name')->nullable();
          $table->string('email')->unique();
          $table->string('role_name',50);
          $table->string('department_id',150);
          $table->string('batch_id',100)->nullable();
          $table->integer('student_type',1);
          $table->double('credit_transfer_student_graduation_credit_hours')->nullable();
          $table->string('password');
          $table->string('image_name')->nullable();
          $table->string('admission_trimester');
          $table->string('nid')->nullable();
          $table->string('birth_certificate_no')->nullable();
          $table->string('phone')->nullable();
          $table->text('address')->nullable();
          $table->string('psc_result')->nullable();
          $table->string('jsc_result')->nullable();
          $table->string('ssc_result')->nullable();
          $table->string('hsc_result')->nullable();
          $table->integer('trimesters_after_admission',11)->default(1);
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
        Schema::dropIfExists('students');
    }
}
