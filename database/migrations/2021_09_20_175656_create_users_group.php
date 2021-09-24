<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_group', function (Blueprint $table) {
            $table -> bigIncrements('group_id');
            $table -> bigInteger('user_group_role_id');
            $table -> timestamps();

           // $table -> foreign('user_group_role_id') -> references('user_role_id') -> on('users_role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_group');
    }
}
