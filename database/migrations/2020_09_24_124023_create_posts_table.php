<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->enum('gallery', \App\Models\Post::GALLERIES);
            $table->string('loc');
            $table->string('type');
            $table->string('post_url');
            $table->integer('likes');
            $table->integer('comments');
            $table->integer('views')->nullable();
            $table->text('image_url');
            $table->text('video_url')->nullable();
            $table->text('caption');

            $table->integer('iran_year');
            $table->string('iran_month');
            $table->string('iran_weekday');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
