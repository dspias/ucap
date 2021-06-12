<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('payment_id');
            $table->foreign('payment_id')->references('id')->on('payments');

            $table->foreignId('application_id');
            $table->foreign('application_id')->references('id')->on('applications');


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
        Schema::dropIfExists('payment_items');
        Schema::table("payment_items", function ($table) {
            $table->dropSoftDeletes();
        });
    }
}
