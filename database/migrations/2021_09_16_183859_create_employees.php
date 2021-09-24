<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {

            $table->bigIncrements('employee_id');
            $table->bigInteger('user_id') -> unsigned();
            $table->integer('user_group_id') -> unsigned();
            $table->string('name') -> nullable();
            $table->char('rg', 24) -> nullable();
            $table->char('cpf', 24) -> nullable();
            $table->string('phone', 32) -> nullable();
            $table->string('email', 128) -> nullable();
            $table->string('info') -> nullable();
            $table->string('image_key') -> nullable();
            $table->string('external_id') -> nullable();
            $table->string('integration_id') -> nullable();
            $table->timestamps();

            $table -> foreign('user_id') -> references ('users_id') -> on('users');
           // $table -> foreign('user_group_id') -> references ('user_group_id') -> on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
