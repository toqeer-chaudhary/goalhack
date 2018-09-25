<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('level_id')->nullable();
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->string('password')->nullable();
            $table->string('designation');
            $table->string('contact');
            $table->string('country');
            $table->string('province');
            $table->string('city');
            $table->string('address');
            $table->string('image')->nullable();
            $table->string('verify_token')->nullable();
            $table->boolean('status')->default(0);
//            if this column has value it means that the user is blocked regardless of the value
//            the value that will be stored in it is of the manager id
            $table->text('is_blocked')->nullable();
            $table->rememberToken()->nullable();
            $table->timestamps();
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //$table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
//            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
