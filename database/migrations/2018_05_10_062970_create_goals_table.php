<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kpi_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('name');
//            $table->enum('status', ['Not Started Yet','In Progress', 'Accomplished', 'Unaccomplished'])->default("Not Started Yet");
            $table->bigInteger('target');
//            $table->enum('is_assigned', ['Assigned', 'UnAssigned'])->default("UnAssigned");
            $table->enum('goal_data_entry_mode', ['Daily', 'Weekly', 'Monthly'])->default("Weekly");
            $table->string('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('kpi_id')->references('id')->on('kpis')->onDelete('cascade');
           // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goals');
    }
}
