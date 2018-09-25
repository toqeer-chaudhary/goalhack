<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('strategy_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('name');
            $table->string('description');
            $table->bigInteger('target');
//            $table->enum('status', ['Not Started Yet','In Progress', 'Accomplished', 'Unaccomplished'])->default("Not Started Yet");
//            $table->enum('is_assigned', ['Assigned', 'UnAssigned'])->default("UnAssigned");
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('strategy_id')->references('id')->on('strategies')->onDelete('cascade');
            /*$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kpis');
    }
}
