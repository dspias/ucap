<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('faculty_id')->comment('');
            $table->foreign('faculty_id')->references('id')->on('faculties');

            $table->string('name');
            $table->string('short_name');
            $table->string('level');
            $table->string('pid')->unique();


            $table->text('program_overview')->nullable();
            $table->text('career_path')->nullable();

            // fee's
            $table->double('yearly_fee', 10, 2)->nullable();
            $table->double('application_fee', 10, 2)->nullable();
            $table->double('credit_fee', 10, 2)->nullable();
            $table->double('lab_fee', 10, 2)->nullable();
            $table->double('retake_fee', 10, 2)->nullable();
            $table->double('extra_fee', 10, 2)->nullable();

            $table->integer('program_duration')->nullable();   // like 24 months or 18 months
            $table->integer('program_semester')->nullable();   // like 4 semester or 3 semester
            $table->integer('semester_duration')->nullable();   // like 3 months or 4 months

            $table->string('internship')->nullable();
            $table->string('scholarship')->nullable();
            $table->string('attendance_type')->nullable();
            $table->double('total_credit', 10, 1)->nullable();   // like 36
            $table->string('website')->nullable();

            $table->boolean('status')->default(false);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
        Schema::table("programs", function ($table) {
            $table->dropSoftDeletes();
        });
    }
}
