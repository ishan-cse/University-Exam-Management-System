<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrimesterGeneratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trimester_generators', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('trimester_name_format',10);
            $table->integer('year')->nullable();
            $table->integer('active_trimester_status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trimester_generators');
    }
}
