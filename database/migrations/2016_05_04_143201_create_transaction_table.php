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
        //
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('inUserId');
            $table->bigInteger('outUserId');
            $table->string('invDate', 23);
            $table->string('invType', 30);
            $table->string('invDescription', 100);
            $table->integer('inAccountId');
            $table->integer('outAccountId');
            $table->decimal('inAmt', 24, 6);
            $table->decimal('outAmt', 24, 6);
            $table->decimal('endAmt', 24, 6);
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
        //
        Schema::drop('transactions');
    }
}
