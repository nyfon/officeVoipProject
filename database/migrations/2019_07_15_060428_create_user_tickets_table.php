<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedInteger('category_ticket_id');
            $table->unsignedInteger('answer_id')->nullable();
            $table->string('title', 255)->nullable();
            $table->text('content');
            $table->tinyInteger('status')->comment('1:unread 2:read 3:answered');
            $table->tinyInteger('urgency')->comment('1:nonsignificant 2:medium 3:instantaneous');
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
        Schema::dropIfExists('user_tickets');
    }
}
