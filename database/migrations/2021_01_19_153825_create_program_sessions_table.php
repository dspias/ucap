<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_sessions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('program_id');
            $table->foreign('program_id')->references('id')->on('programs');

            $table->string('name');
            $table->date('session_start');
            $table->date('application_deadline');
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
        Schema::dropIfExists('program_sessions');
    }
}
