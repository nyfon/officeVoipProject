<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservedVirtualNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserved_virtual_numbers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number' , 15);
            $table->integer('last_owner_id')->nullable()->default(null);
            $table->tinyInteger('is_active');
            $table->integer('parent-id')->nullable()->default(null);
            $table->tinyInteger('is_vip_number');
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
        Schema::dropIfExists('reserved_virtual_numbers');
    }
}
