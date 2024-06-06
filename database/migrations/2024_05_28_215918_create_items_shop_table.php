<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items_shop', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('person_id')->unsigned();
            $table->bigInteger('employee_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('shopping_id')->unsigned();
            $table->bigInteger('manager_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('promotion_id')->unsigned();
            $table->foreign('person_id')->references('id')->on('persons');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('shopping_id')->references('id')->on('shopping');
            $table->foreign('manager_id')->references('id')->on('managers');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('promotion_id')->references('id')->on('promotions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items_shop');
    }
};
