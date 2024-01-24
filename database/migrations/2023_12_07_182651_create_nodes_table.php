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
        Schema::create('nodes', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable()->unique();
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->string('category_name')->nullable();

            $table->foreignId('subcategory_id')
                ->nullable()
                ->constrained('sub_categories')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->string('subcategory_name')->nullable();

            $table->foreignId('type_id')
                ->nullable()
                ->constrained('types')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->string('type_name')->nullable();

            $table->string('path')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nodes');
    }
};
