<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_references', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id');
            $table->foreign('student_id')->references('id')->on('users');

            $table->string('first_name');
            $table->string('last_name');
            $table->string('professional_designation');
            $table->string('company_institution');
            $table->string('email');
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('student_references');
    }
}
