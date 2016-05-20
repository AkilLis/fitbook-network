<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupRankConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('grouprankconfig', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('rankId')->nullable();
            $table->bigInteger('groupId')->nullable();
            $table->bigInteger('zeroAmount')->nullable();
            $table->bigInteger('oneAmount')->nullable();
            $table->bigInteger('twoAmount')->nullable();
            $table->bigInteger('isCapAmount')->nullable();
            $table->bigInteger('capUpperAmount')->nullable();
            $table->bigInteger('UpperAmount')->nullable();
            $table->integer('firstLevel')->nullable();
            $table->integer('secondLevel')->nullable();
            $table->integer('thirdLevel')->nullable();
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
        Schema::drop('GroupRankConfig');
    }
}
