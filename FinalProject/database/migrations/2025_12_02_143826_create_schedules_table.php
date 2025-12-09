<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateSchedulesTable extends Migration
{
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('day'); // e.g., Monday
            $table->time('start_time');
            $table->time('end_time');
            $table->string('course_name')->nullable();
            $table->string('instructor_name')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
