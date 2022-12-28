<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->string('name')->nullable();
            $table->string('slug')->unique();
            $table->string('difficulty_level')->nullable();
            $table->unsignedInteger('no_of_days')->nullable();
            $table->unsignedInteger('no_of_nights')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('location')->nullable();
            $table->longText('overview')->nullable();
            $table->longText('summary')->nullable();
            $table->longText('cost_info')->nullable();
            $table->longText('confirmation_policy')->nullable();
            $table->longText('refund_policy')->nullable();
            $table->longText('cancellation_policy')->nullable();
            $table->longText('payment_terms_policy')->nullable();
            $table->double('price',10,0)->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_published')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_trending')->default(0);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
