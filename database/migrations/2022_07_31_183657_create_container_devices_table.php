<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContainerDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('container_devices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('device_id');
            $table->unsignedBigInteger('container_id');
            $table->double('consu_time')->comment('horas e minutos');
            $table->unsignedTinyInteger('consu_days');
            $table->unsignedTinyInteger('quantity');

            $table->foreign('device_id')->on('devices')->references('id');
            $table->foreign('container_id')->on('containers')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('container_devices', function (Blueprint $table) {
            //
        });
    }
}
