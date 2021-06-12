<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->foreignId('role_id')->default(5)->comment('1 for SuperAdmin, 2 for Centre, 3 for University, 4 for Representative, 5 for Student');
            $table->foreign('role_id')->references('id')->on('roles');

            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('lang')->default('en');

            $table->rememberToken();
            $table->timestamp('approved_at')->nullable();
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
        Schema::dropIfExists('users');
        Schema::table("users", function ($table) {
            $table->dropSoftDeletes();
        });
    }
}
