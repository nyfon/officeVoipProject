<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficeScheduleConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_schedule_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('is-active')->comment('1:active 2:inactive')->nullable();

            $table->tinyInteger('paitients-per-day')->comment('Number of patients per day');
            $table->tinyInteger('minutes-per-patient')->comment('Duration of each patient');

            // voip_services id
            $table->unsignedInteger('office_id');

            // voip_services id
            $table->unsignedInteger('doctor_id');

            //saturday
            $table->tinyInteger('sat')->comment('1:active 2:inactive');
            $table->timestamp('sat-start-time')->nullable();
            $table->timestamp('sat-finish-time')->nullable();

            //sunday
            $table->tinyInteger('sun')->comment('1:active 2:inactive');
            $table->timestamp('sun-start-time')->nullable();
            $table->timestamp('sun-finish-time')->nullable();

            //monday
            $table->tinyInteger('mon')->comment('1:active 2:inactive');
            $table->timestamp('mon-start-time')->nullable();
            $table->timestamp('mon-finish-time')->nullable();

            //tuesday
            $table->tinyInteger('tues')->comment('1:active 2:inactive');
            $table->timestamp('tues-start-time')->nullable();
            $table->timestamp('tues-finish-time')->nullable();

            //wednesday
            $table->tinyInteger('wed')->comment('1:active 2:inactive');
            $table->timestamp('wed-start-time')->nullable();
            $table->timestamp('wed-finish-time')->nullable();

            //thursday
            $table->tinyInteger('thurs')->comment('1:active 2:inactive');
            $table->timestamp('thurs-start-time')->nullable();
            $table->timestamp('thurs-finish-time')->nullable();

            //friday
            $table->tinyInteger('fri')->comment('1:active 2:inactive');
            $table->timestamp('fri-start-time')->nullable();
            $table->timestamp('fri-finish-time')->nullable();

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
        Schema::dropIfExists('office_schedule_configs');
    }
}
