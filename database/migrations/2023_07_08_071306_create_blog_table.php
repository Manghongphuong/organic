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
        Schema::create('blog', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_blog');
            $table->text('title')->nullable();
            $table->text('summary')->nullable();
            $table->text('content')->nullable();
            $table->decimal('views', 10, 0)->nullable();
            $table->string('img')->nullable();
            $table->timestamps();
            $table->foreign('id_blog')->references('id')->on('cateblog')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
