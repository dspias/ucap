<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();

            $table->foreignId('university_id')->comment('');
            $table->foreign('university_id')->references('id')->on('users');

            $table->foreignId('program_id')->nullable()->comment('');
            $table->foreign('program_id')->references('id')->on('programs');


            $table->boolean('status')->default(true);

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
        Schema::dropIfExists('scholarships');
        Schema::table("scholarships", function ($table) {
            $table->dropSoftDeletes();
        });
    }
}
