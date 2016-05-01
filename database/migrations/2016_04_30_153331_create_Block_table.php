<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Block', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('parentId');
            $table->bigInteger('groupId');
            $table->integer('userCount');
            $table->bigInteger('U1')->nullable();
            $table->bigInteger('U2')->nullable();
            $table->bigInteger('U3')->nullable();
            $table->bigInteger('U4')->nullable();
            $table->bigInteger('U5')->nullable();
            $table->bigInteger('U6')->nullable();
            $table->bigInteger('U7')->nullable();
            $table->bigInteger('B1')->nullable();
            $table->bigInteger('B2')->nullable();
            $table->bigInteger('B3')->nullable();
            $table->bigInteger('B4')->nullable();
            $table->bigInteger('B5')->nullable();
            $table->bigInteger('B6')->nullable();
            $table->bigInteger('B7')->nullable();
            $table->bigInteger('B8')->nullable();
            $table->char('isActive', 1);
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
        Schema::drop('Block');
    }
}
