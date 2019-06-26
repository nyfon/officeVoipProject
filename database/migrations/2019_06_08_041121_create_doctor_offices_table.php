<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_offices', function (Blueprint $table) {
            $table->increments('id');

            $table->string('office_name' , 45);
            $table->text('office_picture')->nullable();
            $table->string('mobile_tel' , 15)->nullable();
            $table->string('address1' , 250)->nullable();
            $table->string('address2' , 250)->nullable();
            $table->tinyInteger('office_type');
            $table->tinyInteger('tel_type');

            // general doctors id
            $table->unsignedInteger('doctor_id');
            //$table->foreign('doctor_id')->references('id')->on('general_doctors');

            $table->unsignedInteger('virtual_numbers_id');

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
        Schema::dropIfExists('doctor_offices');
    }
}
