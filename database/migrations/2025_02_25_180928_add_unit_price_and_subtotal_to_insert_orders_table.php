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
        Schema::table('insert_orders', function (Blueprint $table) {
            $table->decimal('unit_price', 10, 2)->nullable();  // Add unit price field
            $table->decimal('subtotal', 10, 2)->nullable();   // Add subtotal field
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('insert_orders', function (Blueprint $table) {
            $table->dropColumn(['unit_price', 'subtotal']); 
        });
    }
};




