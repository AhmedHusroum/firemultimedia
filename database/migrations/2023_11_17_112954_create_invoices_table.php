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
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lease_type_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('finance_id');
            $table->decimal('monthly_costs');
            $table->date('start_date');
            $table->date('end_date');

            $table->timestamps();

            $table->foreign('customer_id')
                ->references('id')
                ->on('users');


            $table->foreign('finance_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
