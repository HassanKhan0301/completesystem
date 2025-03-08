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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('orderId');
            $table->string('Raw_Material');
            $table->string('cutting_type');
            $table->decimal('cutting_price');
            $table->integer('cutting_quantity');
            $table->string('printing_type');
            $table->decimal('printing_price');
            $table->integer('printing_quantity');
            $table->string('stitching_type');
            $table->decimal('stitching_price');
            $table->integer('quantity_stitching');
            $table->string('cropping_type');
            $table->decimal('cropping_price');
            $table->integer('quantity_cropping');
            $table->string('packing_type');
            $table->decimal('packing_price');
            $table->string('Delivery_type');
            $table->decimal('Delevery_price');
            $table->integer('quantyty_delevery');
            $table->enum('status', [
                "Buying",
                "Cutting",
                "Printing",
                "Stitching",
                "Cropping",
                "Packing",
                "Delivery"
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
