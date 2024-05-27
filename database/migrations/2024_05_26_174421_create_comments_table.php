<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('comment');

            $table->unsignedBigInteger('id_user')->nullable();
            $table->index('id_user', 'comment_user_idx');
            $table->foreign('id_user', 'comment_user_fk')->on('users')->references('id');

            $table->unsignedBigInteger('id_post')->nullable();
            $table->index('id_post', 'comment_post_idx');
            $table->foreign('id_post', 'comment_post_fk')->on('posts')->references('id');
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
        Schema::dropIfExists('comments');
    }
}
