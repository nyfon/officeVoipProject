<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserActiveServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_active_services', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('is_active')->comment('1:inactive 2:active ');
            $table->timestamp('expiration_date')->useCurrent();
            $table->unsignedInteger('purchase_id');
            $table->unsignedInteger('services_id');

            $table->string('service_name' , 200);
            $table->string('mobile_tel' , 15);
            
            $table->unsignedInteger('virtual_numbers_id');
            $table->string('virtual_number');

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
        Schema::dropIfExists('user_active_services');
    }
}
