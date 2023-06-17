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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->index('user_id', 'user_comments_idx');
            $table->foreign('user_id', 'user_comments_fk')->on('users')->references('id');

            $table->unsignedBigInteger('post_id');
            $table->index('post_id', 'post_comments_idx');
            $table->foreign('post_id', 'post_comments_fk')->on('posts')->references('id');

            $table->text('message');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
