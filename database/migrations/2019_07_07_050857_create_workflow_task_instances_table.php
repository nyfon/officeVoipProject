<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkflowTaskInstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workflow_task_instances', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('start_time')->useCurrent();
            $table->timestamp('finish_time')->useCurrent();
            $table->tinyInteger('is_deleted')->nullable()->comment('1:false 2:true');
            // workflow_processes id
            $table->unsignedInteger('process_instances_id');
            //$table->foreign('processes_id')->references('id')->on('workflow_processes');
            // workflow_processes id
            $table->unsignedInteger('user_id');
            //$table->foreign('processes_id')->references('id')->on('workflow_processes');
            // workflow_processes id
            $table->unsignedInteger('tasks_id');
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
        Schema::dropIfExists('workflow_task_instances');
    }
}
