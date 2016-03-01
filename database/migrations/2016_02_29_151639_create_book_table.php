<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function(Blueprint $table){
            $table->increments('book_id');
            $table->string('isbn', 13);
            $table->string('book_title' , 255);
            $table->string('publisher', 255);
            $table->string('filepath', 255);
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
        Schema::drop('book');
    }
}
