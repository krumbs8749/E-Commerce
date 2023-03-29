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
        Schema::create('ab_user', function (Blueprint $table) {
            $table->id();
            $table->string('ab_name', 80)->nullable(false)->unique();
            $table->string('ab_password', 200)->nullable(false);
            $table->string('ab_mail', 200)->nullable(false)->unique();
        });
        Schema::create('ab_article', function (Blueprint $table) {
            $table->id();
            $table->string('ab_name', 80)->nullable(false);
            $table->integer('ab_price')->nullable(false);
            $table->string('ab_description', 1000)->nullable(false);
            $table->unsignedBigInteger('ab_creator_id')->nullable(false);
            $table->timestamp('ab_createDate')->nullable(false);

            $table->foreign('ab_creator_id')->references('id')->on('ab_user');
        });
        Schema::create('ab_articlecategory', function (Blueprint $table) {
            $table->id();
            $table->string('ab_name', 100)->nullable(false)->unique();
            $table->string('ab_description', 1000)->nullable();
            $table->unsignedBigInteger('ab_parent')->nullable();

            $table->foreign('ab_parent')->references('id')->on('ab_articlecategory');
        });
        Schema::create('ab_article_has_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ab_articlecategory_id')->nullable(false);
            $table->unsignedBigInteger('ab_article_id')->nullable(false);

            $table->foreign('ab_articlecategory_id')->references('id')->on('ab_articlecategory');
            $table->foreign('ab_article_id')->references('id')->on('ab_article');
            $table->unique(['ab_articlecategory_id', 'ab_article_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ab_user');
        Schema::dropIfExists('ab_article');
        Schema::dropIfExists('ab_articlecategory');
        Schema::dropIfExists('ab_article_has_category');
    }
};
