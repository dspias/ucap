<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUcapInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ucap_infos', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique();
            $table->string('type');
            $table->json('json_data')->nullable();
            $table->string('string_data')->nullable();
            $table->longText('text_data')->nullable();
            $table->integer('integer_data')->nullable();
            $table->double('double_data', 8, 2)->nullable();
            $table->binary('avatar')->nullable();

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
        Schema::dropIfExists('ucap_infos');
        Schema::table("ucap_infos", function ($table) {
            $table->dropSoftDeletes();
        });
    }
}
