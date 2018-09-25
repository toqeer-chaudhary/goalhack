<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStrategiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strategies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vision_id');
            $table->unsignedInteger('user_id');
            $table->string('name');
            $table->string('description');
//            $table->bigInteger('target');
//            $table->enum('status', ['Not Started Yet','In Progress', 'Accomplished', 'Unaccomplished'])->default("Not Started Yet");
//            $table->enum('is_assigned', ['Assigned', 'UnAssigned'])->default("UnAssigned");
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('vision_id')->references('id')->on('visions')->onDelete('cascade');
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('strategies');
    }
}
