<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_post', function (Blueprint $table) {
            $table->increments('id');
            $table->string('use');
            $table->integer('order')->unsigned();
            $table->timestamps();
            $table->integer('photos_id')->unsigned();
            $table->integer('posts_id')->unsigned();
            
            //LLaves Foráneas
            $table->foreign("photos_id")
                ->references("id")
                ->on("photos")
                ->onDelete("RESTRICT");
            $table->foreign("posts_id")
                ->references("id")
                ->on("posts")
                ->onDelete("RESTRICT"); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photo_post');
    }
}
