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
        Schema::create('upcomings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_category_id');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('SET NULL');

            $table->string('slug')->unique();
            $table->string('name');
            $table->longText('description');
            $table->string('show_name');
            $table->string('show_date');
            $table->string('show_time');
            $table->string('venue');
            $table->integer('sale_percent')->nullable()->default(0);
            $table->bigInteger('price');
            $table->integer('quantity');
            $table->string('image');
            $table->tinyInteger('trending')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upcomings');
    }
};
