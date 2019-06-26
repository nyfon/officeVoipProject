<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_rows', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('start_date_time')->useCurrent();
            $table->timestamp('expire_time_stamp')->useCurrent();

            // voip_services id
            $table->unsignedInteger('voip_services_id');
            //$table->foreign('voip_services_id')->references('id')->on('voip_services');

            // voip_services id
            $table->unsignedInteger('purchases_id');
            //$table->foreign('purchases_id')->references('id')->on('purchases');

            // virtual_numbers_id id
            $table->integer('virtual_numbers_id')->nullable();
            //$table->foreign('virtual-numbers_id')->references('id')->on('voip_services');

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
        Schema::dropIfExists('purchase_rows');
    }
}
