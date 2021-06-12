<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentLanguageTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_language_tests', function (Blueprint $table) {
            $table->id();

            $table->foreignId('language_id');
            $table->foreign('language_id')->references('id')->on('language_tests');


            $table->foreignId('student_id');
            $table->foreign('student_id')->references('id')->on('users');

            $table->double('band', 5, 2);
            $table->boolean('individual')->default(false);
            $table->text('details')->nullable();

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
        Schema::dropIfExists('student_language_tests');
    }
}
