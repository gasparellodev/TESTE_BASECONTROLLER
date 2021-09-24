<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->bigIncrements('activity_id');
            $table->bigInteger('task_id') -> unsigned();
            $table->string('title') -> nullable();
            $table->enum('type', ['select', 'multiselect', 'radio', 'checkbox', 'text', 'textarea', 'photo', 'signature', 'signature_employee', 'numeric', 'barcode', 'formula', 'mask', 'rating', 'employee_signature', 'date_time', 'gps_datetime', 'device_datetime', 'geolocation', 'select_with_search']) -> nullable();
            $table->string('default_value') -> nullable();
            $table->decimal('min_value', 20, 8) -> nullable();
            $table->decimal('max_value', 20, 8 ) -> nullable();
            $table->string('value_format') -> nullable();
            $table->enum('has_obs', ['Y', 'N']) -> nullable();
            $table->enum('mandatory', ['Y', 'N']) -> nullable();
            $table->string('unit') -> nullable();
            $table->enum('fill', ['app','web']) -> nullable();
            $table->string('info') -> nullable();
            $table->string('image_url') -> nullable();
            $table->tinyInteger('photo_gallery') -> nullable();
            $table->integer('fill_order') -> nullable();
            $table->timestamps();

            $table -> foreign('task_id') -> references('task_id') -> on('tasks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
