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
        Schema::create('provided_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('payment_condition_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('payment_condition_id')->references('id')->on('payment_conditions')->onDelete('cascade');
            $table->unique(['service_id', 'payment_condition_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provided_services');
    }
};
