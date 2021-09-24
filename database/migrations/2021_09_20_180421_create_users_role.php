<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_role', function (Blueprint $table) {
            $table -> bigIncrements('user_role_id');
            $table -> string('role');
            $table -> string('name');
            $table -> enum('user_type', ['system', 'employee', 'client']);
            $table -> integer('system_limit');
            $table -> integer('group_limit');
            $table -> enum('device', ['Y', 'N']);
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
        Schema::dropIfExists('users_role');
    }
}
