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
        Schema::create('stitches', function (Blueprint $table) {
            $table->id();
            $table->string('orderId')->nullable();
            $table->string('stitching_type')->nullable();
            $table->string('stitching_price')->nullable();
            $table->string('stitching_quantity')->nullable();
            $table->string('total_amount')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stitches');
    }
};



