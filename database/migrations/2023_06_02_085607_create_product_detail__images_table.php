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
        Schema::create('product_detail__images', function (Blueprint $table) {
            $table->id();
            $table->string('img1', 50);
            $table->string('img2', 50);
            $table->string('img3', 50);
            $table->string('img4', 50);
            $table->string('img5', 50);

            // F - K
            $table->unsignedBigInteger('product_detail_id')->unique();
            
            $table->foreign('product_detail_id')->references('id')->on('product_details')
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
        Schema::dropIfExists('product_detail__images');
    }
};
