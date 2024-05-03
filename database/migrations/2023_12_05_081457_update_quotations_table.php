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
        Schema::table('quotations', function($table) {
            $table->dropColumn('content');
            $table->string('companyname');
            $table->string('street');
            $table->string('number');
            $table->string('postalcode');
            $table->string('city');
            $table->string('phonenumber');
            $table->string('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quotations', function($table) {
            $table->dropColumn('companyname');
            $table->dropColumn('street');
            $table->dropColumn('number');
            $table->dropColumn('postalcode');
            $table->dropColumn('city');
            $table->dropColumn('phonenumber');
            $table->dropColumn('email');
            $table->string('content');
        });
    }
};
