<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_programs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('application_id')->comment('');
            $table->foreign('application_id')->references('id')->on('applications');

            $table->foreignId('program_id')->comment('');
            $table->foreign('program_id')->references('id')->on('programs');

            $table->foreignId('session_id')->comment('');
            $table->foreign('session_id')->references('id')->on('program_sessions');

            $table->foreignId('university_id')->comment('');
            $table->foreign('university_id')->references('id')->on('users');

            $table->foreignId('representative_id')->nullable();
            $table->foreign('representative_id')->references('id')->on('users');

            $table->double('rep_earn')->default(0.00);
            $table->boolean('paid_rep')->default(false);
            $table->double('system_earn')->default(0.00);

            $table->double('original_fee');
            $table->double('discount_fee');

            $table->tinyInteger('status')->default(0);

            $table->text('note')->nullable();

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
        Schema::dropIfExists('application_programs');
        Schema::table("application_programs", function ($table) {
            $table->dropSoftDeletes();
        });
    }
}
