<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_language', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categories_id')->unsigned();
            $table->integer('languages_id')->unsigned();
            
            $table->string('label');
            $table->string('slug');
            $table->text('description');
            //$table->timestamps();

            //LLaves Foráneas
            $table->foreign("categories_id")
                ->references("id")
                ->on("categories")
                ->onDelete("RESTRICT");
            $table->foreign("languages_id")
                ->references("id")
                ->on("languages")
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
        Schema::dropIfExists('category_language');
    }
}
