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
            $table->string('name');
            $table->string('slug')->nullable()->unique();
            $table->string('thumbnail')->nullable();
            $table->string('dimension')->nullable();
            $table->double('mrp', 10,2)->nullable();
            $table->double('selling_price', 10,2)->nullable();
            $table->longText('description')->nullable();
            $table->longText('seo_keywords')->nullable();
            $table->longText('seo_description')->nullable();
            $table->enum('is_featured', ['Yes', 'No'])->default('No');

            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreignId('sub_category_id')
                ->nullable()
                ->constrained('sub_categories')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreignId('material_id')
                ->nullable()
                ->constrained('materials')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreignId('design_id')
                ->nullable()
                ->constrained('designs')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreignId('brand_id')
                ->nullable()
                ->constrained('brands')
                ->onDelete('set null')
                ->onUpdate('cascade');
            
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
