<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providedServices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('paymentCondition_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('paymentCondition_id')->references('id')->on('paymentConditions')->onDelete('cascade');
            $table->unique(['service_id', 'paymentCondition_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providedServices');
    }
};
