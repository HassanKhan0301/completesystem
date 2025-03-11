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
        Schema::create('buyings', function (Blueprint $table) {
            $table->id();
            $table->string('orderId')->nullable();
            $table->string('material')->nullable(); // Store individual materials
            $table->string('quantity')->nullable();
            $table->string('unit')->nullable();
            $table->string('price')->nullable();
            $table->string('total_amount')->nullable();
            $table->date('date')->nullable(); // Store the date of the buying
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buyings');
    }
};


