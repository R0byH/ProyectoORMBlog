<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('autor_id')->unsigned();
            $table->integer('publishes_id')->unsigned();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            //LLaves Foráneas
            $table->foreign("publishes_id")
                ->references("id")
                ->on("publishes")
                ->onDelete("RESTRICT");
            $table->foreign("autor_id")
                ->references("id")
                ->on("users")
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
        Schema::dropIfExists('posts');
    }
}
