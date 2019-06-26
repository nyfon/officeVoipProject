<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_patients', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name' , 45)->nullable();
            $table->string('family' , 45)->nullable();
            $table->string('address1' , 255)->nullable();
            $table->string('address2' , 255)->nullable();

            $table->string('national_number' , 10)->comment('کد ملی')->nullable();

            // grope id
            $table->unsignedInteger('user_id');
            //$table->foreign('user_id')->references('id')->on('general_users');

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
        Schema::dropIfExists('general_patients');
    }
}
