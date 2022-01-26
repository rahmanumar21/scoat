<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('location_id');
            $table->timestamps();
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');

        });

        // Schema::create('attendances', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('lecturer_name');
        //     $table->string('student_name');
        //     $table->string('course');
        //     $table->string('course_url_link');
        //     $table->string('latitude');
        //     $table->string('longtitude');
        //     $table->string('addressline');
        //     $table->string('time_start');
        //     $table->string('time_end');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
