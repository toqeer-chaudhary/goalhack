<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goal_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('goal_id')->nullable;
            $table->unsignedInteger('user_id')->nullable;
            $table->bigInteger('actual_data')->nullable;
            $table->string('comment')->nullable;
            //$table->enum('status', ['Assigned', 'Un Assigned'])->default("Assigned");
//            $table->timestamp('rem_time');
            $table->date('data_entry_date');
            $table->integer('is_approved')->default(0); // 0 => pending 1 => approved 2 => rejeceted
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('goal_id')->references('id')->on('goals')->onDelete('cascade');
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
        Schema::dropIfExists('goal_datas');
    }
}
