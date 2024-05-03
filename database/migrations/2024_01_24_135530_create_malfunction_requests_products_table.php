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
        Schema::create('malfunction_requests_products', function (Blueprint $table) {
            $table->id();
            $table->integer('malfunction_request_id')->references('id')->on('malfunction_requests');
            $table->integer('product_id')->references('id')->on('custom_products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('malfunction_requests_products');
    }
};
