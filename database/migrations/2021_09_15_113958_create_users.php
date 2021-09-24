<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table -> bigIncrements('users_id');
            $table -> integer('user_group_id') -> unsigned();
            $table -> integer('user_role_id') -> unsigned() -> nullable();
            $table -> string('username');
            $table -> string('password');
            $table -> tinyInteger('app_online') -> nullable();
            $table -> tinyInteger('app_full') -> nullable();
            $table -> string('type') -> nulable();
            $table -> timestamps();

             //$table -> foreign('user_group_id') -> references('user_group_id') -> on('users_group');
             //$table -> foreign('user_role_id') -> references('user_role_id') -> on('users_role');
        });

        // Schema::table('users', function (Blueprint $table) {
        //     $table -> foreign('user_role_id') -> references('group_id') -> on('users_group');
        // });
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
