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
        Schema::create('insert_orders', function (Blueprint $table) {
            $table->id();
            $table->date('to')->nullable();
            $table->string('vendor_name');
            $table->integer('Article_number' )->nullable(); 
            $table->string('Article_name')->nullable();
            $table->integer('quantity')->nullable(); 
            $table->date('delivery_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insert_orders');
    }
};
