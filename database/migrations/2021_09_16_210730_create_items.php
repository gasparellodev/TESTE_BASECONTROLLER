<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('item_id');
            $table->integer('root_id') -> nullable();
            $table->bigInteger('client_id') -> unsigned();
            $table->integer('type_id') -> nullable();
            $table->string('name', 256) -> nullable();
            $table->string('tag', 128) -> nullable();
            $table->string('initial_month', 128) -> nullable();
            $table->longText('info', 2048) -> nullable();
            $table->string('workday', 256) -> nullable();
            $table->tinyInteger('public_qr') -> nullable();
            $table->string('qrcode', 128) -> nullable();
            $table->string('image_url', 255) -> nullable();
            $table->integer('integration_id') -> nullable();
            $table->string('external_id', 128) -> nullable();
            $table->integer('origin') -> nullable();
            $table->date('validity') -> nullable();
            $table->timestamps();

            $table -> foreign('client_id') -> references('client_id') -> on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
