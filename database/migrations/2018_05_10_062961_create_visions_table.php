Spa<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable();
            $table->string('name');
            $table->bigInteger('target');
            $table->string('description');
//            $table->enum('status', ['Not Started Yet','In Progress', 'Accomplished', 'Unaccomplished'])->default("Not Started Yet");
//            $table->enum('is_assigned', ['Assigned', 'UnAssigned'])->default("UnAssigned");
            $table->date('start_date');
            $table->date('end_date');
            $table->softDeletes();
            $table->timestamps();
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visions');
    }
}
