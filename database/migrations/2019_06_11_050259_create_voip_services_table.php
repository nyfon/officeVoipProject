<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoipServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voip_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('service_name', 200);
            $table->tinyInteger('is_active');
            $table->tinyInteger('duration')->comment('in months')->nullable();
            $table->timestamp(  'active_date')->nullable();
            $table->timestamp(  'deactive_date')->nullable();
            $table->integer(  'cost')->comment('قیمت');
            $table->integer(  'parent_id')->comment('نگدارنده کلید قبلی');
            $table->tinyInteger(  'type')->comment('1: virtual_number | 2: voip_services');
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
        Schema::dropIfExists('voip_services');
    }
}
