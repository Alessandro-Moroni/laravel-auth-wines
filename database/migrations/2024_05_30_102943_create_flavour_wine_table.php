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
        Schema::create('flavour_wine', function (Blueprint $table) {
            $table->unsignedBigInteger('flavour_id');
            $table->foreign('flavour_id')
                ->references('id')
                ->on('flavours')
                ->cascadeOnDelete();

            $table->unsignedBigInteger('wine_id');
            $table->foreign('wine_id')
                ->references('id')
                ->on('wines')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flavour_wine');
    }
};
