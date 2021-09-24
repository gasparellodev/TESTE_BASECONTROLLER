<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {

            $table -> bigIncrements('client_id');
            $table -> string('external_id', 100) -> nullable();
            $table -> integer('integration_id') -> nullable();
            $table -> integer('headquarters');
            $table -> enum('type', ['corporation', 'person']) -> nullable();
            $table -> string('name') -> unique();
            $table -> string('tradename') -> unique();
            $table -> string('cnpj') -> unique();
            $table -> string('adress')-> nullable();
            $table -> string('adress_number')-> nullable();
            $table -> string('adress_complement')-> nullable();
            $table -> string('district')-> nullable();
            $table -> string('city')-> nullable();
            $table -> string('state')-> nullable();
            $table -> string('country', 128)-> nullable();
            $table -> string('zip_code')-> nullable();
            $table -> double('latitude', 20, 10)-> nullable();
            $table -> double('longitude', 20, 10)-> nullable();
            $table -> string('landmarks',1024)-> nullable();
            $table -> string('contact_name')-> nullable();
            $table -> string('phone1', 32)-> nullable();
            $table -> string('phone2', 32)-> nullable();
            $table -> string('email1', 128)-> nullable();
            $table -> string('email2', 128)-> nullable();
            $table -> string('info')-> nullable();
            $table -> string('working_days', 128)-> nullable();
            $table -> string('contract', 1024)-> nullable();
            $table -> bigInteger('user_group_id') -> unsigned();
            $table -> timestamps();

           //$table -> foreign('user_group_id') -> references('group_id') -> on('users_group');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
