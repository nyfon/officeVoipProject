<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoicesOfServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voices_of_services', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('active_services_id');
            $table->unsignedInteger('voice_files_id');
            $table->tinyInteger('is_active')->comment('1:inactive 2:active');

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
        Schema::dropIfExists('voices_of_services');
    }
}
