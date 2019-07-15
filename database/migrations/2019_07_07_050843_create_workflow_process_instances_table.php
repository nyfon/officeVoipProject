<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkflowProcessInstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workflow_process_instances', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('start_time')->useCurrent();
            $table->timestamp('finish_time')->useCurrent();
            $table->tinyInteger('is_deleted')->nullable()->comment('1:false 2:true');
            // workflow_processes id
            $table->unsignedInteger('processes_id');
            //$table->foreign('processes_id')->references('id')->on('workflow_processes');
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
        Schema::dropIfExists('workflow_process_instances');
    }
}
