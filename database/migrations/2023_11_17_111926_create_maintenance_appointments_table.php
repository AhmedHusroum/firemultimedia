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
        Schema::create('maintenance_appointments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->timestamp('start_date');
            $table->timestamp('end_date');
            $table->integer('company_id')->references('id')->on('companies');
            $table->longText('remark');
            $table->dateTime('date_added');
            $table->integer('product_category_id')->references('id')->on('product_categories');
            $table->enum('maintenance_type', ['storingsaanvragen', 'routinematige_bezoeken']);
            $table->integer('assigned')->references('id')->on('users');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_appointments');
    }
};
