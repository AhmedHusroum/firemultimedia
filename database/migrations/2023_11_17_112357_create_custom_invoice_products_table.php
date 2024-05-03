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
        Schema::create('custom_invoice_products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('subtotal');
            $table->integer('custom_invoice_id')->references('id')->on('custom_invoices');
            $table->integer('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_invoice_products');
    }
};
