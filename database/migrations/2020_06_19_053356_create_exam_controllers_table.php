<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamControllersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_controllers', function (Blueprint $table) {
          $table->id()->unique();
          $table->string('uni_id')->unique()->nullable();
          $table->string('name')->nullable();
          $table->string('email')->unique();
          $table->string('role_name',50);
          $table->string('password');
          $table->string('image_name')->nullable();
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
        Schema::dropIfExists('exam_controllers');
    }
}
