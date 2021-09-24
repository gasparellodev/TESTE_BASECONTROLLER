<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('task_id');
            $table -> integer('task_type_id') -> nullable();
            $table -> integer('item_type_id') -> nullable();
            $table -> enum('task_type', ['item', 'local', 'order', 'service', 'survey']);
            $table -> string('name');
            $table -> string('info');
            $table -> time('estimated_time') -> nullable();
            $table -> enum('mandatory', ['Y', 'N']) -> nullable();
            $table -> enum('editable', ['Y', 'N']) -> nullable();
            $table -> enum('multipliable', ['Y', 'N']) -> nullable();
            $table -> enum('prioriry', ['Y', 'N'])-> nullable();
            $table -> enum('has_feedback', ['Y', 'N'])-> nullable();

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
        Schema::dropIfExists('tasks');
    }
}
