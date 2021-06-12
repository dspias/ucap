<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')->comment('user');
            $table->foreign('student_id')->references('id')->on('users');

            $table->string('level');
            $table->string('field');
            $table->string('major_subject')->nullable();
            $table->string('institute')->nullable();
            $table->string('address')->nullable();
            $table->year('start_year');
            $table->year('end_year')->nullable();
            $table->string('score', 10)->nullable();
            $table->boolean('running')->default(false);
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
        Schema::dropIfExists('education');
    }
}
