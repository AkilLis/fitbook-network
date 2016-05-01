<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('roleId',18,0);
            $table->string('nameL',75);
            $table->string('nameF',75)->nullable();
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
        Schema::drop('Roles');
        //
    }
}
