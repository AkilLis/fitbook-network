<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserChildsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_childs', function (Blueprint $table) {
            $table->bigInteger('user_id');
            $table->bigInteger('child_id');
            $table->integer('bf_count');
            $table->integer('bm_count');
            $table->integer('cf_count');
            $table->integer('cm_count');
            $table->integer('rank_id');
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
        Schema::drop('user_childs');
    }
}
