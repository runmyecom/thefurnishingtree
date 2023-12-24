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
        Schema::create('productmodels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();

            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories')
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
        Schema::dropIfExists('productmodels');
    }
};
