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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cate');
            $table->string('name_pr', 255)->nullable();
            $table->text('img')->nullable();
            $table->json('thumbnail')->nullable();
            $table->integer('number')->nullable();
            $table->decimal('price',10,0)->nullable();
            $table->decimal('promotional_price',10,0)->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('hot')->default(0);
            $table->integer('rate')->nullable();
            $table->integer('view')->nullable()->default(0);
            $table->text('slug')->nullable();
            $table->timestamps();
            $table->foreign('id_cate')->references('id')->on('category')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
