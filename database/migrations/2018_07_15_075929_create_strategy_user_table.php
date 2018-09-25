<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStrategyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strategy_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id'); // to who manager assign strategy
            $table->integer('strategy_id');
            $table->integer('manager_id'); // manager who assign strategy to user
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
        Schema::dropIfExists('strategy_user');
    }
}
