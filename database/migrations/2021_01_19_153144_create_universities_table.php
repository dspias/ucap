<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->comment('');
            $table->foreign('user_id')->references('id')->on('users');

            $table->foreignId('city_id')->comment('');
            $table->foreign('city_id')->references('id')->on('cities');

            $table->string('email');
            $table->string('phone');
            $table->string('post_code');
            $table->text('address');
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('whatsapp')->nullable();

            //university information
            $table->text('about')->nullable();
            $table->boolean('is_scholarship')->nullable();
            $table->boolean('is_transport')->nullable();
            $table->integer('student_number')->nullable();

            $table->string('weather')->nullable();
            $table->integer('living_cost')->nullable();

            //update it later
            $table->string('living_cost_campus')->nullable();
            $table->string('living_cost_residance')->nullable();
            $table->string('meal_cost_campus')->nullable();
            $table->string('meal_cost_residance')->nullable();
            $table->string('weather_summer')->nullable();
            $table->string('weather_winter')->nullable();
            $table->integer('wrold_rank')->nullable();
            $table->integer('national_rank')->nullable();
            $table->integer('international_student')->nullable();
            $table->integer('local_student')->nullable();


            $table->string('admin_name');
            $table->string('gender');
            $table->string('admin_email');
            $table->string('admin_mobile');
            $table->string('admin_whatsapp')->nullable();
            $table->string('admin_telegram')->nullable();
            $table->string('admin_facebook')->nullable();

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
        Schema::dropIfExists('universities');
        Schema::table("universities", function ($table) {
            $table->dropSoftDeletes();
        });
    }
}
