<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanTripDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_trip_destinations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trip_plan_id')->nullable();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->timestamps();
            $table->foreign('trip_plan_id')->references('id')->on('plan_trips')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_trip_destinations');
    }
}
