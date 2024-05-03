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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('street');
            $table->string('house_number')->nullable();;
            $table->string('zipcode')->nullable();;
            $table->string('city')->nullable();;
            $table->string('phonenumber')->nullable();;
            //$table->string('country_code', 6)->nullable();
            $table->dateTime('bkr_checked_at')->nullable();;
            $table->boolean('bkr_checked')->default(false);

            $table->timestamps();
            $table->integer('contact_id')->references('id')->on('users')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
