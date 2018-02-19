<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('autor_id')->unsigned();
            $table->text('comment');
            $table->timestamps();
            $table->integer('posts_id')->unsigned();
            
            $table->foreign("posts_id")->references("id")->on("posts")->onDelete("RESTRICT");
            $table->foreign("autor_id")->references("id")->on("users")->onDelete("RESTRICT");
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
