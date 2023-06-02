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
            $table->string('title', 50);
            $table->string('short_des', 100);
            $table->string('price', 10);
            $table->boolean('discount');
            $table->string('discount_price', 10);
            $table->string('image', 50);
            $table->boolean('stock');
            $table->double('start');
            $table->enum('remark', ['hot', 'popular']);

            // F - K
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');

            // Relationship
            $table->foreign('category_id')->references('id')->on('categories')
            ->restrictOnDelete()
            ->cascadeOnUpdate();
            $table->foreign('brand_id')->references('id')->on('brands')
            ->restrictOnDelete()
            ->cascadeOnUpdate();

            $table->timestamp('create_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
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
