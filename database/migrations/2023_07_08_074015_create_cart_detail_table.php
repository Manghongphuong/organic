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
        Schema::create('cart_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cart');
            $table->unsignedBigInteger('id_product');
            $table->unsignedBigInteger('quantity')->default(1);
            $table->timestamps();
            $table->foreign('id_cart')->references('id')->on('cart')->cascadeOnDelete();
            $table->foreign('id_product')->references('id')->on('product')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_detail');
    }
};
