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
        Schema::create('prints', function (Blueprint $table) {
            $table->id();
            $table->string('orderId')->nullable();
            $table->string('printing_type')->nullable();
            $table->string('printing_price')->nullable();
            $table->string('printing_quantity')->nullable();
            $table->string('total_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prints');
    }
};
