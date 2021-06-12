<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')->comment('');
            $table->foreign('student_id')->references('id')->on('users');
            $table->string('native_lang');

            $table->string('aid')->unique();
            $table->string('payment_status');
            $table->string('payment_id');
            $table->double('amount', 9, 2);
            $table->double('discount', 9, 2)->default(0.00);
            $table->double('tax', 9, 2)->default(0.00);
            $table->tinyInteger('total_program');

            $table->tinyInteger('status')->default(0);

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
        Schema::dropIfExists('applications');
        Schema::table("applications", function ($table) {
            $table->dropSoftDeletes();
        });
    }
}
