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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('person_id')->unsigned();
            $table->bigInteger('manager_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->string('name_promotion');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('descount_offer');
            $table->string('aplicable_product');
            $table->foreign('person_id')->references('id')->on('persons');
            $table->foreign('manager_id')->references('id')->on('managers');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
