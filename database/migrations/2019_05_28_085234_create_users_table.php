<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_users', function (Blueprint $table) {

            $table->increments('id');
            $table->string('username' , 45);
            $table->string('password' , 45);
            $table->string('phone_number' , 15);
            $table->string('description' , 250)->nullable();
            $table->enum('isActive' , ['active' , 'inactive']);
            $table->text('acl');

            // grope id
            $table->unsignedInteger('user_group_id');
            $table->foreign('user_group_id')->references('id')->on('user_group');

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
