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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('firstName', 20);
            $table->string('lastName', 20);
            $table->string('mobile', 15);
            $table->string('city', 100);
            $table->string('shoppingAdress', 100);

            // F - K
            $table->string('email')->unique();

            // Relationship
            $table->foreign('email')->references('email')->on('users')
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
        Schema::dropIfExists('profiles');
    }
};
