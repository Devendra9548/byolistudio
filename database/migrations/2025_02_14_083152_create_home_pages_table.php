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
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->string('slide1')->nullable();
            $table->string('slide2')->nullable();
            $table->string('slide3')->nullable();
            $table->string('slide4')->nullable();
            $table->string('slide5')->nullable();
            $table->string('slide6')->nullable();
            $table->string('slide7')->nullable();
            $table->string('mbslide1')->nullable();
            $table->string('mbslide2')->nullable();
            $table->string('mbslide3')->nullable();
            $table->string('mbslide4')->nullable();
            $table->string('mbslide5')->nullable();
            $table->string('mbslide6')->nullable();
            $table->string('mbslide7')->nullable();
            $table->string('video')->nullable();
            $table->integer('selecthero')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_pages');
    }
};
