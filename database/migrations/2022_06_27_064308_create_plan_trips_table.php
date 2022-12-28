<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_trips', function (Blueprint $table) {
            $table->id();
            $table->string('travel_with')->nullable();
            $table->unsignedInteger('no_of_adult')->nullable();
            $table->unsignedInteger('no_of_children')->nullable();
            $table->string('travel_when')->nullable();
            $table->date('arrival_date')->nullable();
            $table->date('departure_date')->nullable();
            $table->string('month_approx')->nullable();
            $table->string('accomodation')->nullable();
            $table->string('min_budget')->nullable();
            $table->string('max_budget')->nullable();
            $table->string('is_budget_flexible')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('contact_no_alternate')->nullable();
            $table->string('email')->nullable();
            $table->string('nationality')->nullable();
            $table->string('method_of_contact')->nullable();
            $table->string('desired_trip')->nullable();
            $table->string('trip_planning')->nullable();
            $table->text('message')->nullable();
            $table->string('country')->nullable();
            $table->enum('is_policy_read',['No','Yes'])->default('No');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_trips');
    }
}
