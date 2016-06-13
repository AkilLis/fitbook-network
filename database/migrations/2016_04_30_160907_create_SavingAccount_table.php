<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSavingAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('savingaccount', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('accountId',20);
            $table->string('nameL',100);
            $table->string('nameF',100);
            $table->decimal('endAmount',24,6);
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
        Schema::drop('SavingAccount');
    }
}
