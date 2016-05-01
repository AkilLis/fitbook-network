<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserNetworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('UserNetwork', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('parentId');
            $table->string('userId',20);
            $table->string('fName',75);
            $table->string('lName',75);
            $table->string('registryNo',75);
            $table->string('address',500)->nullable();
            $table->string('email',100);
            $table->string('phone',100)->nullable();
            $table->string('accountId',100)->nullable();
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
        Schema::drop('UserNetwork');
    }
}
