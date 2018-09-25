<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelResourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_resource', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('level_id');
            $table->integer('resource_id');
            $table->string('node_id');  // this id is for js tree selected node i.e index, store etc
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
        Schema::dropIfExists('level_resource');
    }
}
