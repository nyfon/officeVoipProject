<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVirtualNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virtual_numbers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('virtual_number' ,15);
            $table->tinyInteger('is_active')->nullable();
            $table->timestamp('active_date')->useCurrent();
            $table->timestamp('deactive_date')->useCurrent();
            //$table->string('virtual_number' , 15);

            // general_doctors id
            $table->unsignedInteger('general_doctors_id');
            //$table->foreign('general_doctors_id')->references('id')->on('general_doctors');

            // reserved_virtual_numbers id
            $table->unsignedInteger('reserved_numbers_id');
            //$table->foreign('reserved_numbers_id')->references('id')->on('reserved_virtual_numbers');

            // voip_services id
            $table->unsignedInteger('service_id');
            //$table->foreign('service_id')->references('id')->on('voip_services');

            // voip_services id
            $table->unsignedInteger('purchases_id');
            //$table->foreign('purchases_id')->references('id')->on('voip_services');

            $table->timestamp('expiration_date')->nullable();
            $table->tinyInteger('status')->comment('1:Not assigned 2:Expired 3:Deactivated 4:In service')->nullable();

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
        Schema::dropIfExists('virtual_numbers');
    }
}
