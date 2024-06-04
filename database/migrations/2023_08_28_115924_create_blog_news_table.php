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
        Schema::create('blog_news', function (Blueprint $table) {
            $table->id();
            $table->string('blognews_id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->string('title')->nullable();
            $table->text('news_content')->nullable();
            $table->string('button_title')->nullable();
            $table->string('cloudinary_image_id')->nullable();
            $table->text('image_path')->nullable();
            $table->string('external_link')->nullable();
            $table->boolean('slideFeatured')->nullable()->default(false);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('blog_news_categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_news');
    }
};
