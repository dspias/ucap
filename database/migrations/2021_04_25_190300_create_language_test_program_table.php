<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageTestProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_test_program', function (Blueprint $table) {
            $table->id();


            $table->foreignId('language_test_id');
            $table->foreign('language_test_id')->references('id')->on('language_tests');


            $table->foreignId('program_id');
            $table->foreign('program_id')->references('id')->on('programs');

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
        Schema::dropIfExists('language_tests_programs');
    }
}
