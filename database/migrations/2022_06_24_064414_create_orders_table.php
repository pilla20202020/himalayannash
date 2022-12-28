<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('package_id');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->unsignedInteger('nof_adults')->default(0);
            $table->unsignedInteger('nof_children')->default(0);
            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_num_first')->nullable();
            $table->string('contact_num_second')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->double('package_price')->default(0.0);
            $table->double('package_total_price')->default(0.0);
            $table->double('discount_price')->default(0.0);
            $table->double('paid_amount')->default(0.0);
            $table->string('payment_mode')->nullable();
            $table->dateTime('payment_date')->nullable();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
