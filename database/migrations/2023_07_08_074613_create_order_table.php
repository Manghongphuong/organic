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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->decimal('total', 10,0)->default(0);
            $table->decimal('discount', 10,0)->default(0);
            $table->decimal('price' ,10,0)->default(0);
            $table->text('note')->nullable();
            $table->string('coupon', 255)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('ho_va_ten',255);
            $table->string('phone',255)->nullable();
            $table->string('email',255)->nullable();
            $table->string('dia_chi',255)->nullable();
            $table->tinyInteger('payment_method')->default(0);
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
