<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserVisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_vision', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id'); // to who manager assign vision
            $table->integer('vision_id');
//           only in case of vision manager_id
//          is nullable because this person is not managed by anyone
            $table->integer('manager_id')->nullable(); // manager who assign vision to user
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
        Schema::dropIfExists('user_vision');
    }
}
