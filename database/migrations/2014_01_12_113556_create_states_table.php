<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();

            $table->foreignId('country_id')->default(5)->comment('');
            $table->foreign('country_id')->references('id')->on('countries');

            $table->string('name');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('states');
        Schema::table("states", function ($table) {
            $table->dropSoftDeletes();
        });
    }
}
