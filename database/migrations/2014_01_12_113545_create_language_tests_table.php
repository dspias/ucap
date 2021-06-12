<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_tests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('score', 6, 2);
            $table->text('desrciption')->nullable();
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
        Schema::dropIfExists('language_tests');
        Schema::table("language_tests", function ($table) {
            $table->dropSoftDeletes();
        });
    }
}
