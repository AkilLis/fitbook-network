<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserNetwork extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('userblockmap', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->bigInteger('userId');
            $table->bigInteger('parentId');
            $table->string('sortedOrder');
            $table->bigInteger('blockId');
            $table->integer('fCount');
            $table->integer('mCount');
            $table->integer('rankId');
            $table->timestamps();   
            $table->integer('viewOrder');     
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
        Schema::drop('UserBlockMap');
    }
}
