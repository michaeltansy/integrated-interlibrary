<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function(Blueprint $table){
            $table->increments('transaction_id');
            $table->integer('user_id',false,false);
            $table->integer('book_id', false,false);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('library_name');
            $table->integer('charge_fee', false,false);
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
        Schema::drop('transaction');
    }
}
