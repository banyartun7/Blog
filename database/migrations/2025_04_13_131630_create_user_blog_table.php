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
        Schema::create('user_blog', function (Blueprint $table) {
            $table->primary(['user_id', 'blog_id']);
            $table->foreignId('user_id');
            $table->foreignId('blog_id');
            $table->timestamps();
        });

        //user_id blog_id
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_blog');
    }
};
