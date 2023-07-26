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
        Schema::create('order_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_order');
            $table->unsignedBigInteger('id_product');
            $table->decimal('price', 10,0);
            $table->integer('number');
            $table->decimal('total', 10,0)->default(0);            
            $table->timestamps();
            $table->foreign('id_order')->references('id')->on('order')->cascadeOnDelete();
            $table->foreign('id_product')->references('id')->on('product')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_detail');
    }
};
