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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('sku');
            $table->string('item_name');
            $table->string('slug')->nullable()->unique();
            $table->string('pattern')->nullable();

            $table->string('item_height')->nullable();
            $table->string('item_height_unit')->nullable();
            $table->string('item_width')->nullable();
            $table->string('item_width_unit')->nullable();
            $table->string('item_length')->nullable();
            $table->string('item_length_unit')->nullable();
            $table->string('item_weight')->nullable();
            $table->string('item_weight_unit')->nullable();

            $table->string('package_weight')->nullable();
            $table->string('package_weight_unit')->nullable();
            $table->string('package_length')->nullable();
            $table->string('package_length_unit')->nullable();
            $table->string('package_width')->nullable();
            $table->string('package_width_unit')->nullable();
            $table->string('package_height')->nullable();
            $table->string('package_height_unit')->nullable();

            $table->text('bullet_1')->nullable();
            $table->text('bullet_2')->nullable();
            $table->text('bullet_3')->nullable();
            $table->text('bullet_4')->nullable();
            $table->text('bullet_5')->nullable();
            $table->text('bullet_6')->nullable();
            $table->text('bullet_7')->nullable();
            $table->text('bullet_8')->nullable();
            $table->text('bullet_9')->nullable();
            $table->text('bullet_10')->nullable();

            $table->string('keyword')->nullable();

            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('image_4')->nullable();
            $table->string('image_5')->nullable();
            $table->string('image_6')->nullable();

            $table->double('selling_price', 10,2)->nullable();
            $table->double('mrp', 10,2)->nullable();
            $table->longText('description')->nullable();
            $table->enum('is_featured', ['Yes', 'No'])->default('No')->nullable();

            $table->string('brand')->nullable();
            $table->string('material')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('model')->nullable();

            $table->foreignId('node_id')
                ->nullable()
                ->constrained('nodes')
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
        Schema::dropIfExists('items');
    }
};
