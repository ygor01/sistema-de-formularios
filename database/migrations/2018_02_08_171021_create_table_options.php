<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        
        Schema::create('options', function(Blueprint $table){
            $table->increments('id');
            $table->string('title', 45);
            $table->integer('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('questions');
            //$table->integer('form_id')->unsigned();
            //$table->foreign('form_id')->references('id')->on('forms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
    }
}
