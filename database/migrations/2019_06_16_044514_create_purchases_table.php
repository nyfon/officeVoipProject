<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('time');
            $table->integer('total');
            $table->tinyInteger('state')->comment('1:addToCart 2:draft 3:paying 4:paymentSuccessful 5:paymentUnsuccessful 6:revokedByAdmin');
            $table->tinyInteger('type')->comment('1:service 2:virtualNumber');
            // voip_services id
            $table->unsignedInteger('virtual_numbers_id')->nullable();
            //$table->foreign('purchases_id')->references('id')->on('voip_services');
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
        Schema::dropIfExists('purchases');
    }
}
