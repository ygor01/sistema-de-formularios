<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableForms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        
        
        Schema::create('forms', function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->string('author');
            $table->date('initial_date');
            $table->date('final_date');
            $table->integer('qnt_recept');
            $table->tinyInteger('status');
            $table->string('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
