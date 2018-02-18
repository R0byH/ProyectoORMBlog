<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('posts_id')->unsigned();
            $table->integer('languages_id')->unsigned();
            $table->string('title');
            $table->string('slug');          
            $table->text('content');

            //LLaves Foráneas
            $table->foreign("posts_id")
                ->references("id")
                ->on("posts")
                ->onDelete("RESTRICT");
            $table->foreign("languages_id")
                ->references("id")
                ->on("languages")
                ->onDelete("RESTRICT");    
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_post');
    }
}
