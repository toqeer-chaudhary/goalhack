<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKpiUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id'); // to who manager assign kpi
            $table->integer('kpi_id');
            $table->integer('manager_id'); // manager who assign kpi to user
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
        Schema::dropIfExists('kpi_user');
    }
}
