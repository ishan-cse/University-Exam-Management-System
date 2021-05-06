<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaximumCreditHoursAssignToFacultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maximum_credit_hours_assign_to_faculties', function (Blueprint $table) {
            $table->id();
            $table->string('department_id',150);
            $table->double('maximum_credit_hours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maximum_credit_hours_assign_to_faculties');
    }
}
