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
        Schema::create('ab_shopping_cart', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ab_creator_id', false)->nullable(false);
            $table->timestamp('ab_createdate', 200)->nullable(false);

            $table->foreign('ab_creator_id')->references('id')->on('ab_user')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ab_shopping_cart');
    }
};
